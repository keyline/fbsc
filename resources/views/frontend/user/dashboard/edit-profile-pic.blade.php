@extends('frontend.user.dashboard.user-master')
@section('section')
    <div class="dashboard-form-wrapper">
        <h2 class="title">{{__('Edit Profile Pic')}}</h2>
        <div class="col-sm-6 clearfix mb-2">
            <div class="user-profile">
                @php
                    $profile_img = $user_details->profile_pic;
                    @endphp
                    @if (!empty($profile_img))
                        <img width="100" style="border-radius: 20px" class="avatar user-thumb" src="{{ asset($profile_img) }}" alt="{{$user_details->name}}">
             @endif
            </div>
        </div>
        <form action="{{route('user.home.profile.pic.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="name">{{__('Profile Pic')}}</label>
                <input type="file" class="form-control" id="profile_pic" name="profile_pic" value="{{$user_details->profile_pic}}">
                <input type="hidden" class="form-control item" name="cropped_profile" id="cropped_profile">
            </div>

   <!-- Image preview -->
            <div class="col-6">
                <div class="form-group">
                    <label>Preview</label>
                    <img id="profile_pic_preview" alt="Preview"
                        style="max-width: 200px; max-height: 200px;">
                </div>
                
            </div>
            <div class="col-12 text-center" id="crop-and-save-container">
                <button type="button" class="btn btn-primary" id="crop-and-save2">Crop & Save</button>
            </div>
            
            <div class="col-12 text-center" id="loader" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
            
            <div id="upload-success-message" style="display: none;">Image Cropped successfully.</div>


            <button type="submit" class="submit-btn dash-btn width-200">{{__('Save changes')}}</button>
        </form>
    </div>
@endsection