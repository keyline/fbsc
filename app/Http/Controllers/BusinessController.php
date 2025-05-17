<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Business;
use App\User;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    // Create a new business
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    
    public function create_business(Request $request)
    {
        // Validate the form data here
        $rules = $request->validate([
            'business_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'search_keywords' => 'required|array', 
            'industry' => 'required', 
            'mobile_number' => 'required', 
            'email' => 'required', 
            'business_description' => 'required|string',

        ]);
        $rules['business_logo'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        $rules['website'] = 'nullable|url'; 
        $rules['facebook'] = 'nullable|url'; 
        $rules['instagram'] = 'nullable|url'; 
        $rules['linkedin'] = 'nullable|url'; 
        $rules['twitter'] = 'nullable|url'; 

        // Handle business logo upload
    if ($request->hasFile('business_logo')) {
        $user = auth()->user();
        $userId = $user->id;
        $fileName = 'business_logo_' . $userId . '_' . time() . '.' . $request->file('business_logo')->getClientOriginalExtension();
       
        $paths = 'uploads/business_logos/' . $fileName;
        $request->file('business_logo')->move(public_path('uploads/business_logos'), $paths);
        $validatedData['business_logo'] = $paths;
    }

        $validatedData = $request->validate($rules);
        // Create a new business using the validated data
        $business = new Business($validatedData);
        $business->user_id = auth()->user()->id; // Associate the business with the logged-in user
        $business->search_keywords = $request->input('search_keywords');
        $business->save();

        return redirect()->back()->with(['msg' => __('Business Added Success'), 'type' => 'success']);
    }

    // Business::create([
    //     'user_id' => auth()->user()->id,
    //     'business_name' => $request->business_name,
    //     'designation' => $request->designation,
    //     'business_logo' => $paths,
    //     'industry' => $request->industry,
    //     'mobile_number' => $request->mobile_number,
    //     'email' => $request->email,
    //     'website' => $request->website,
    //     'facebook' => $request->facebook,
    //     'instagram' => $request->instagram,
    //     'linkedin' => $request->linkedin,
    //     'business_description' => $request->business_description,
    //     'search_keywords' => $searchKeywords,
    // ]);
}
