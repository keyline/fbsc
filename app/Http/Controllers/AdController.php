<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Ad;
use App\User;

class AdController extends Controller
{
    const BASE_PATH = 'frontend.user.dashboard.';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = auth()->user();
        $userId = $user->id;

        $ads = Ad::where('user_id', $userId)->get();
        return view(self::BASE_PATH . 'index-ads')->with(['all_ads'=>$ads,'user_details' => $this->logged_user_details()]);
    }

    public function create()
    {
        return view(self::BASE_PATH . 'create-ads')->with(['user_details' => $this->logged_user_details()]);
    }

    public function edit(Request $request, $id)
    {
         // Find the business by ID
        $ad = Ad::find($id);
        return view(self::BASE_PATH . 'edit-ads')->with(['ads'=>$ad,'user_details' => $this->logged_user_details()]);
    }


    public function store(Request $request)
    {
        // Validate the form data here
        $user = auth()->user();
        $userId = $user->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'required|string',
            'banner' => 'required|image|dimensions:max_width=548,max_height=960', // Dimensions rule
        ]);


        // Handle file upload and storage (e.g., storing the banner image)
        if ($request->hasFile('banner')) {

            // Generate a unique filename for the uploaded image
            $fileName = 'adds_banner_' . $userId . '_' . time() . '.' . $request->file('banner')->getClientOriginalExtension();
            $paths = 'uploads/adds_banner/' . $fileName;
            $request->file('banner')->move(public_path('uploads/adds_banner'), $paths);
        } 

        // Create a new ad in the database
        $ad = new Ad();
        $ad->user_id = $userId;
        $ad->name = $request->input('name');
        $ad->category = $request->input('category');
        $ad->short_description = $request->input('short_description');
        $ad->created_by  = 'user';
        $ad->banner = $paths;
        $ad->save();

        return redirect()->route('all-ads')->with(['msg' => __('Ad Created Success'), 'type' => 'success']);
    }

    public function update_ads(Request $request)
    {
        // Validate the form data here
        $user = auth()->user();
        $userId = $user->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'required|string',
            'banner' => 'required|image|dimensions:min_width=548,min_height=960', // Dimensions rule
        ]);
       


        // Find the business by ID
        $ad = Ad::find($request->id);

        // Create a new ad in the database
        $ad->user_id = $userId;
        $ad->name = $request->input('name');
        $ad->category = $request->input('category');
        $ad->short_description = $request->input('short_description');
        $ad->created_by  = 'user';
        if ($request->hasFile('banner')) {
           
            $fileName = 'adds_banner_' . $userId . '_' . time() . '.' . $request->file('banner')->getClientOriginalExtension();

            $newLogoPath = 'uploads/adds_banner/' . $fileName;
            $request->file('banner')->move(public_path('uploads/adds_banner'), $newLogoPath);

            // Delete the old logo only if it exists
            if (!empty($ad->banner)) {
                $oldLogoPath = public_path($ad->banner);
                if (file_exists($oldLogoPath)) {
                    unlink($oldLogoPath);
                }
            }

            // Update the business logo field
            $ad->banner = $newLogoPath;
        }
        $ad->save();
      
        return redirect()->route('all-ads')->with(['msg' => __('Ad Updated Success'), 'type' => 'success']);
    }

    public function deleteAds($id)
    {
        try {
            $ad = Ad::findOrFail($id);
            $ad->delete();

            return response()->json(['type' => 'success', 'message' => 'Advertisement deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['type' => 'error', 'message' => 'Error deleting Advertisement']);
        }
    }

    public function logged_user_details()
    {
        $old_details = '';
        if (empty($old_details)) {
            $old_details = User::findOrFail(Auth::guard('web')->user()->id);
        }
        return $old_details;
    }

}
