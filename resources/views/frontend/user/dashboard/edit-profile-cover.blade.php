@extends('frontend.user.dashboard.user-master')
@section('section')
    <div class="dashboard-form-wrapper">
        <h2 class="title">{{__('Edit Profile Cover Pic')}}</h2>
        <div class="col-sm-6 clearfix mb-2">
            <div class="user-profile">
                @php
                    $profile_img = $user_details->profile_cover_pic;
                    @endphp
                    @if (!empty($profile_img))
                        <img width="500" height="200" style="border-radius: 20px" class="avatar user-thumb" src="{{ asset($profile_img) }}" alt="{{$user_details->name}}">
             @endif
            </div>
        </div>
        <form action="{{route('user.home.profile.cover.pic.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="name">{{__('Profile Cover Pic')}}</label>
                <input type="file" class="form-control" id="profile_cover_pic" name="profile_cover_pic" value="{{$user_details->profile_cover_pic}}">
            </div>

            <button type="submit" class="submit-btn dash-btn width-200">{{__('Save changes')}}</button>
        </form>
    </div>
@endsection