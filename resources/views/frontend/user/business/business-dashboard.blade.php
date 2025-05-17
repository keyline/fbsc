@extends('frontend.user-business-dashboard')
@section('page-title')
    {{ __('User Dashboard') }}
@endsection
@section('content')
<style>
    .user-name {
    white-space: nowrap; 
    overflow: hidden;  
    text-overflow: ellipsis; 
    max-width: 100%; 
    display: inline-block; 
    vertical-align: middle; 
}
</style>
    <section class="login-page-wrapper">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-lg-9">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-12">
                            <!-- Cover Photo -->
                            <div class="cover-photo">
                                @if ($user_details->profile_cover_pic)
                                    <img src="{{ asset($user_details->profile_cover_pic) }}" alt="Cover Photo">
                                @else
                                    <img src="{{ asset('assets/frontend/banner/image-not-found-coverpic.png') }}"
                                        alt="Cover Photo">
                                @endif
                                <!-- Profile Picture -->
                                {{-- <div class="profile-section">
                            <div class="profile-picture">
                                <img src="{{ asset($user_details->profile_pic) }}" alt="Profile Picture">
                            </div>
                            <!-- User Information -->
                            <div class="user-info">
                                <h1>{{ $user_details->name }}</h1>
                                
                            </div>
                        </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row d-flex justify-content-center align-items-center p-3"
                                style="margin-top: -120px;">
                                <div class="col-lg-2 col-md-2 col-sm-2 justify-content-center align-items-center">
                                    <div class="profile-picture ">
                                        {{-- <img src="{{ asset($user_details->profile_pic) }}"alt="Profile Picture"> --}}
                                        @if ($user_details->profile_pic)
                                            <img src="{{ asset($user_details->profile_pic) }}" alt="Cover Photo">
                                        @else
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                alt="Cover Photo">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 justify-content-center align-items-center">
                                    <div class="justify-content-center align-items-center detail-box"
                                        style="border-radius: 15px;position: relative;">
                                        <div class="card-body py-4">
                                            <h3 class="mb-3 font-weight-bold flex">
                                                <span class="mr-2">{{ $user_details->name }}</span>
                                                <span class="bg-warning b-name user-name h4" title="{{ $user_details->profession }}">
                                                   
                                                    @php
                                                        $professionWords = explode(' ', $user_details->profession);
                                                    @endphp
                                            
                                                    @if (count($professionWords) > 2)
                                                        <small> Business | {{ $user_details->profession }}</small>
                                                    @else
                                                    Business | {{ $user_details->profession }}
                                                    @endif
                                                </span>
                                            </h3>
                                            <p class="small mb-0"><i class="far fa-star fa-lg" style="color: #FFC000"></i> <span
                                                    class="mx-2">|</span>
                                                <strong>{{ $user_details->about }}</strong>
                                            </p>
                                        </div>
                                        <div class="dropdown dropleft"
                                            style="position: absolute;top:25px; right: 0px;transform-origin: top right;width:inherit">

                                            <i class="fas fa-ellipsis-v fa-lg text-dark" data-toggle="dropdown"></i>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('user.home') }}">{{ __('Profile Setting') }}</a>
                                                {{-- <a class="dropdown-item" href="#">Link 2</a>
                                            <a class="dropdown-item" href="#">Link 3</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="col-lg-11 business-tab">

                            <header class="block">
                                <ul class="nav nav-tabs header-menu horizontal-list">
                                    <li>
                                        <a class="header-menu-tab active" data-toggle="tab" href="#home"><span
                                                class="fa fa-user mr-1"></span>About</a>
                                    </li>
                                    <li>
                                        <a class="header-menu-tab" data-toggle="tab" href="#menu1"><span
                                                class="fa fa-envelope mr-1"></span>Messages</a>
                                        @if ($total_count > 0)
                                            <a class="header-menu-number" href="#4">{{ $total_count }}</a>
                                        @endif
                                    </li>
                                    <li>
                                        <a class="header-menu-tab" data-toggle="tab" href="#menu2">Add Business / Manage Business</a>
                                    </li>
                                </ul>
                            </header>
                        </div>
                        <div class="tab-content col-lg-11 col-md-11 col-sm-12 mb-2">
                            <div class="message-show margin-top-10">
                                <x-flash-msg />
                                <x-error-msg />
                            </div>
                            {{-- about start --}}
                            <div id="home" class="tab-pane  in active col-lg-12">
                                @if (count($users_businesses) > 0)
                                    @foreach ($users_businesses as $business)
                                        <div class="card mb-2 shadow bg-white" style="border-radius: 15px;">
                                            <div class="card-body" style="position: relative;">
                                                <div class="row d-flex justify-content-center align-items-center">
                                                    <div
                                                        class="col-lg-2 col-md-6 col-sm-12 justify-content-center align-items-center">
                                                        @if ($business->business_logo)
                                                            <img class="img rounded" width="150" height="120"
                                                                src="{{ asset($business->business_logo) }}"alt="Business Logo">
                                                        @else
                                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                                alt="Business Logo">
                                                        @endif

                                                    </div>
                                                    <div
                                                        class="col-lg-7 col-md-6 col-sm-12 justify-content-center align-items-center">
                                                        <div class="justify-content-center align-items-center"
                                                            style="border-radius: 15px;">
                                                            <div class="card-body py-4">
                                                                <h3 class="mb-3 font-weight-bold user-name" title="{{ $business->business_name }}">{{ $business->business_name }}</h3>
                                                                <p class="small mb-0 text-dark"><i
                                                                        class="fa fa-trophy fa-lg"
                                                                        style="color:#C4465F;"></i> <span
                                                                        class="mx-2">|</span>
                                                                    <strong>{{ $business->designation }}</strong>
                                                                </p>
                                                               
                                                                <p
                                                                    class="small mb-0 justify-content-center align-items-center text-dark user-name" title=" {{ $business->business_description }}" style="word-wrap: break-word; white-space: normal;">
                                                                    <i class="fa fa-industry fa-lg"
                                                                        style="color:#2e6875;"></i>
                                                                    <span class="mx-2">|</span>
                                                                    @if ($business->business_description)
                                                                        <!--{{ implode(' | ', $business->search_keywords) }}-->
                                                                        {{ $business->business_description }}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-lg-3 col-md-6 col-sm-12 justify-content-center align-items-center">
                                                        <div class="justify-content-center align-items-center">
                                                            <p class="small mb-1 text-dark"><i
                                                                    class="fa fa-phone fa-lg rounded"
                                                                    style="color:#2e6875;"></i> :
                                                                <strong>{{ $business->mobile_number }}</strong>
                                                            </p>
                                                            @if ($business->facebook)
                                                                @php
                                                                    $facebookUrl = $business->facebook;
                                                                    // Check if the URL starts with "http://" or "https://"
                                                                    if (!preg_match('~^(?:f|ht)tps?://~i', $facebookUrl)) {
                                                                        // If not, add "http://" as a prefix
                                                                        $facebookUrl = 'http://' . $facebookUrl;
                                                                    }
                                                                    // Validate the URL using filter_var
                                                                    if (filter_var($facebookUrl, FILTER_VALIDATE_URL)) {
                                                                        $parsedUrl = parse_url($facebookUrl);
                                                                        $path = isset($parsedUrl['path']) ? trim($parsedUrl['path'], '/') : '';
                                                                        $profileName = empty($path) ? $parsedUrl['host'] : $path;
                                                                    }
                                                                @endphp
                                                                <p class="small mb-1 text-dark"><i
                                                                        class="fab fa-facebook-f fa-lg rounded"
                                                                        style="color: #3b5998;"></i> :
                                                                    <strong><a href="{{ $facebookUrl }}"
                                                                            target="_blank">{{ $profileName }}</a></strong>
                                                                </p>
                                                            @endif
                                                            @if ($business->instagram)
                                                                @php
                                                                    $instagramUrl = $business->instagram;
                                                                    if (!preg_match('~^(?:f|ht)tps?://~i', $instagramUrl)) {
                                                                        $instagramUrl = 'http://' . $instagramUrl;
                                                                    }
                                                                    if (filter_var($instagramUrl, FILTER_VALIDATE_URL)) {
                                                                        $parsedUrl = parse_url($instagramUrl);
                                                                        $path = isset($parsedUrl['path']) ? trim($parsedUrl['path'], '/') : '';
                                                                        $profileName = empty($path) ? $parsedUrl['host'] : $path;
                                                                    }
                                                                @endphp
                                                                <p class="small mb-1 text-dark"><i
                                                                        class="fab fa-instagram fa-lg rounded"
                                                                        style="color: #F53F10;"></i> :
                                                                    <strong><a href="{{ $instagramUrl }}"
                                                                            target="_blank">{{ $profileName }}</a></strong>
                                                                </p>
                                                            @endif
                                                            @if ($business->linkedin)
                                                                @php
                                                                    $linkedinUrl = $business->linkedin;
                                                                    if (!preg_match('~^(?:f|ht)tps?://~i', $linkedinUrl)) {
                                                                        $linkedinUrl = 'http://' . $linkedinUrl;
                                                                    }
                                                                    if (filter_var($linkedinUrl, FILTER_VALIDATE_URL)) {
                                                                        $parsedUrl = parse_url($linkedinUrl);
                                                                        $path = isset($parsedUrl['path']) ? trim($parsedUrl['path'], '/') : '';
                                                                        $profileName = empty($path) ? $parsedUrl['host'] : $path;
                                                                    }
                                                                @endphp
                                                                <p class="small mb-1 text-dark"><i
                                                                        class="fab fa-linkedin-square fa-lg rounded"
                                                                        style="color: #55acee;"></i> :
                                                                    <strong><a href="{{ $linkedinUrl }}"
                                                                            target="_blank">{{ $profileName }}</a></strong>
                                                                </p>
                                                            @endif
                                                            @if ($business->twitter)
                                                                @php
                                                                    $twitterUrl = $business->twitter;
                                                                    if (!preg_match('~^(?:f|ht)tps?://~i', $twitterUrl)) {
                                                                        $twitterUrl = 'http://' . $twitterUrl;
                                                                    }
                                                                    if (filter_var($twitterUrl, FILTER_VALIDATE_URL)) {
                                                                        $parsedUrl = parse_url($twitterUrl);
                                                                        $path = isset($parsedUrl['path']) ? trim($parsedUrl['path'], '/') : '';
                                                                        $profileName = empty($path) ? $parsedUrl['host'] : $path;
                                                                    }
                                                                @endphp
                                                                <p class="small mb-1 text-dark"><i
                                                                        class="fab fa-twitter-square fa-lg rounded"
                                                                        style="color: #55acee;"></i> :
                                                                    <strong><a href="{{ $twitterUrl }}"
                                                                            target="_blank">{{ $profileName }}</a></strong>
                                                                </p>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($business->type === 'business')
                                                    <button type="button" class="btn btn-danger"
                                                        style="transform: rotate(270deg);position: absolute;top: 0px; right: 0;transform-origin: top right;width:inherit">{{ $business->industry }}</button>
                                                @else
                                                    <button type="button" class="btn btn-danger"
                                                        style="transform: rotate(270deg);position: absolute;top: 0px; right: 0;transform-origin: top right;width:inherit">{{ $business->profession }}</button>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="card mb-2 shadow bg-white" style="border-radius: 15px;">
                                        <div class="card-body" style="position: relative;">
                                            <h6> No businesses found. </h6>
                                            <ul class="nav nav-tabs header-menu horizontal-list">
                                                <li>
                                                    <a class="header-menu-tab" data-toggle="tab" href="#menu2">Add a new
                                                        business</a>.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                {{-- keyword search start --}}
                                <h3 class="mt-5">Search Business / Members</h3>
                                <div class="card search-forms mb-5 shadow bg-white" style="border-radius: 15px;">
                                    <div class="card-body">
                                        <form id="search-form2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="row no-gutters">
                                                        <div class="col-lg-3 col-md-3 col-sm-12 p-1">
                                                            <select class="form-control form-control-sm"
                                                                    id="industry" name="industry"
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                                    <option value="">Select Industry</option>
                                                                    <option value="Advertising">Advertising</option>
                                                                    <option value="Agriculture">Agriculture</option>
                                                                    <option value="Automotive industry">Automotive industry
                                                                    </option>
                                                                    <option value="Business">Business</option>
                                                                    <option value="Chemical industry">Chemical industry
                                                                    </option>
                                                                    <option value="Construction">Construction</option>
                                                                    <option value="Economy">Economy</option>
                                                                    <option value="Energy industry">Energy industry
                                                                    </option>
                                                                    <option value="Engineering">Engineering</option>
                                                                    <option value="Electronics industry">Electronics
                                                                        industry</option>
                                                                    <option value="Entertainment">Entertainment</option>
                                                                    <option value="E-commerce">E-commerce</option>
                                                                    <option value="Fashion">Fashion</option>
                                                                    <option value="Financial services">Financial services
                                                                    </option>
                                                                    <option value="Finance">Finance</option>
                                                                    <option value="Food and Beverages">Food and Beverages
                                                                    </option>
                                                                    <option value="Hospitality industry">Hospitality
                                                                        industry</option>
                                                                    <option value="IT">IT</option>
                                                                    <option value="Information Technology">Information
                                                                        Technology</option>
                                                                    <option value="Manufacturing">Manufacturing</option>
                                                                    <option value="Mining">Mining</option>
                                                                    <option value="Petroleum industry">Petroleum industry
                                                                    </option>
                                                                    <option value="Retail">Retail</option>
                                                                    <option value="Sports">Sports</option>
                                                                    <option value="Textile industry">Textile industry
                                                                    </option>
                                                                </select>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-12 p-1">
                                                            <select class="form-control form-control-sm"
                                                                id="searchpProfession" name="profession">
                                                                <option value="">Select Profession</option>
                                                                <option value="Accountant">Accountant</option>
                                                                <option value="Actor">Actor</option>
                                                                <option value="Architect">Architect</option>
                                                                <option value="Artist">Artist</option>
                                                                <option value="Chef">Chef</option>
                                                                <option value="Cultural">Cultural</option>
                                                                <option value="Designer">Designer</option>
                                                                <option value="Doctor">Doctor</option>
                                                                <option value="Engineer">Engineer</option>
                                                                <option value="Entrepreneur">Entrepreneur</option>
                                                                <option value="Lawyer">Lawyer</option>
                                                                <option value="Musician">Musician</option>
                                                                <option value="Photographer">Photographer</option>
                                                                <option value="Pilot">Pilot</option>
                                                                <option value="Scientist">Scientist</option>
                                                                <option value="Socialist">Socialist</option>
                                                                <option value="Teacher">Teacher</option>
                                                                <option value="Writer">Writer</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-4 col-md-4 col-sm-12 p-1">
                                                            <input type="text" placeholder="Search by Keywords..."
                                                                class="form-control" id="search2" name="search2">
                                                        </div>
                                                        <input type="hidden" id="url"
                                                            value="{{ route('business.ajaxSearch') }}">
                                                        <div class="col-lg-2 col-md-3 col-sm-12 p-1">
                                                            <button type="submit"
                                                                class="btn btn-primary btn-rounded btn-sm">
                                                                Search
                                                            </button>
                                                        </div>
                                                        <small class="form-text" style="color: #F53F10;">
                                                            Select Industry Or Profession and Related Keywords
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div id="search-business" class="mb-5">
                                    <!-- Results will be displayed here via AJAX -->
                                </div>
                                {{-- keyword search end --}}

                            </div>
                            {{-- about end --}}

                            {{-- chat start --}}
                            <div id="menu1" class="tab-pane fade  in col-lg-12">

                                @include('frontend.user.business.chat')

                            </div>
                            {{-- chat end --}}

                            {{-- add business start --}}
                            <div id="menu2" class="tab-pane fade in col-lg-12">

                                <div class="card mb-5 shadow bg-white border-1"
                                    style="border: 1px solid #9c9c9c;border-radius: 15px;">
                                    <div class="card-body p-3">
                                        <h5 class="mb-2">Add Your Business/Profession : </h5>
                                        <hr>
                                        <form class="needs-validation" method="POST"
                                            action="{{ route('business.store') }}" enctype="multipart/form-data"
                                            novalidate>
                                            @csrf
                                            <div class="row d-flex justify-content-center align-items-top p-1">

                                                <div
                                                    class="col-lg-6 col-md-6 col-sm-12 justify-content-center align-items-center">
                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label
                                                                    for="business_name">{{ __('Business Name:') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="business_name" name="business_name"
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Please Enter a Business Name.
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label
                                                                    for="designation">{{ __('Your Designation:') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="designation" name="designation" required
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                                <div class="invalid-feedback">
                                                                    Please Enter a Designation.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label
                                                                    for="business_logo">{{ __('Business Logo:') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <input type="file" class="form-control form-control-sm"
                                                                    id="business_logo" name="business_logo"
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label for="type">{{ __('Type:') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="type" id="businessType" value="business"
                                                                        required>
                                                                    <label class="form-check-label"
                                                                        for="businessType">Business</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="type" id="professionType"
                                                                        value="profession" required>
                                                                    <label class="form-check-label"
                                                                        for="professionType">Professional</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" id="industryField" style="display: none;">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label for="industry">{{ __('Industry :') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <select class="form-control form-control-sm"
                                                                    id="industry1" name="industry"
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                                    <option value="">Select Industry</option>
                                                                    <option value="Advertising">Advertising</option>
                                                                    <option value="Agriculture">Agriculture</option>
                                                                    <option value="Automotive industry">Automotive industry
                                                                    </option>
                                                                    <option value="Business">Business</option>
                                                                    <option value="Chemical industry">Chemical industry
                                                                    </option>
                                                                    <option value="Construction">Construction</option>
                                                                    <option value="Economy">Economy</option>
                                                                    <option value="Energy industry">Energy industry
                                                                    </option>
                                                                    <option value="Engineering">Engineering</option>
                                                                    <option value="Electronics industry">Electronics
                                                                        industry</option>
                                                                    <option value="Entertainment">Entertainment</option>
                                                                    <option value="E-commerce">E-commerce</option>
                                                                    <option value="Fashion">Fashion</option>
                                                                    <option value="Financial services">Financial services
                                                                    </option>
                                                                    <option value="Finance">Finance</option>
                                                                    <option value="Food and Beverages">Food and Beverages</option>
                                                                    <option value="Hospitality industry">Hospitality
                                                                        industry</option>
                                                                     <option value="IT">IT</option>
                                                                    <option value="Information Technology">Information Technology</option>
                                                                    <option value="Manufacturing">Manufacturing</option>
                                                                    <option value="Mining">Mining</option>
                                                                    <option value="Petroleum industry">Petroleum industry
                                                                    </option>
                                                                    <option value="Retail">Retail</option>
                                                                    <option value="Sports">Sports</option>
                                                                    <option value="Textile industry">Textile industry
                                                                    </option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please choose a Industry.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group" id="professionField" style="display: none;">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label for="profession">{{ __('Profession:') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <select class="form-control form-control-sm"
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;"
                                                                    id="profession" name="profession">
                                                                    <option value="">Select Profession</option>
                                                                    <option value="Accountant">Accountant</option>
                                                                    <option value="Actor">Actor</option>
                                                                    <option value="Architect">Architect</option>
                                                                    <option value="Artist">Artist</option>
                                                                    <option value="Chef">Chef</option>
                                                                    <option value="Cultural">Cultural</option>
                                                                    <option value="Designer">Designer</option>
                                                                    <option value="Doctor">Doctor</option>
                                                                    <option value="Engineer">Engineer</option>
                                                                    <option value="Entrepreneur">Entrepreneur</option>
                                                                    <option value="Lawyer">Lawyer</option>
                                                                    <option value="Musician">Musician</option>
                                                                    <option value="Photographer">Photographer</option>
                                                                    <option value="Pilot">Pilot</option>
                                                                    <option value="Scientist">Scientist</option>
                                                                    <option value="Socialist">Socialist</option>
                                                                    <option value="Teacher">Teacher</option>
                                                                    <option value="Writer">Writer</option>
                                                                </select>
                                                                <div class="invalid-feedback">
                                                                    Please choose a Profession.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label for="mobile_number">{{ __('Mobile No :') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="mobile_number" name="mobile_number" required
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                                <div class="invalid-feedback">
                                                                    Please Enter a Mobile no.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label for="email">{{ __('Email :') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <input type="email" class="form-control form-control-sm"
                                                                    id="email" name="email" required
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                                <div class="invalid-feedback">
                                                                    Please Enter a Email Id.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div
                                                    class="col-lg-6 col-md-6 col-sm-12 justify-content-center align-items-center">

                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label for="website">{{ __('Website :') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <input type="url" class="form-control form-control-sm"
                                                                    id="website" name="website"
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label for="facebook">{{ __('FaceBook :') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <input type="url" class="form-control form-control-sm"
                                                                    id="facebook" name="facebook"
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label for="instagram">{{ __('Instagram :') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <input type="url" class="form-control form-control-sm"
                                                                    id="instagram" name="instagram"
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label for="linkedin">{{ __('Linkedin:') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <input type="url" class="form-control form-control-sm"
                                                                    id="linkedin" name="linkedin"
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-center text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label
                                                                    for="business_description">{{ __('Brief About the Business:') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <textarea class="form-control form-control-sm" id="business_description" name="business_description" required
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;">

                                                                </textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div
                                                            class="row justify-content-center align-items-start text-start no-gutters">
                                                            <div class="col col-lg-4">
                                                                <label
                                                                    for="search_keywords">{{ __('Search Words:') }}</label>
                                                            </div>
                                                            <div class="col col-lg-8 ">
                                                                <input type="text" class="form-control form-control-sm"
                                                                    id="search_keywords" name="search_keywords"
                                                                    style="border: 1px solid #9c9c9c;border-radius: 10px;"
                                                                    required>
                                                                <div class="invalid-feedback">
                                                                    Please Enter a search Keywords.
                                                                </div>
                                                                <small class="form-text" style="color: #F53F10;">Use Comma
                                                                    (,) for multiple
                                                                    search words</small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <button type="submit" class="btn btn-primary btn-rounded btn-md">
                                                    SUBMIT
                                                </button>

                                            </div>
                                        </form>
                                    </div>
                                </div>

                                @if (count($users_businesses) > 0)
                                    <div class="row mb-2 d-flex justify-content-center align-items-center">
                                        @foreach ($users_businesses as $business)
                                            <div
                                                class="col-lg-6 col-md-6 col-sm-12 justify-content-center align-items-center">
                                                <div class="card mb-2 shadow bg-white" style="border-radius: 15px;">
                                                    <div class="card-body">
                                                        <div
                                                            class="row no-gutters justify-content-center align-items-center">
                                                            <div
                                                                class="col-lg-4 col-md-4 col-sm-12 justify-content-center align-items-center">
                                                                @if ($business->business_logo)
                                                                    <img class="img-fluid"
                                                                        style="width: 150px;height:150px; border-radius: 10px;"
                                                                        src="{{ asset($business->business_logo) }}"alt="Business Logo">
                                                                @else
                                                                    <img class="img-fluid"
                                                                        style="width: 150px;height:150px; border-radius: 10px;"
                                                                        src="{{ asset('assets/frontend/banner/image-not-found-coverpic.png') }}"
                                                                        alt="Business Logo">
                                                                @endif
                                                            </div>
                                                            <div
                                                                class="col-lg-8 col-md-8 col-sm-12 justify-content-center align-items-center">
                                                                <div class="justify-content-center align-items-center"
                                                                    style="border-radius: 15px;">
                                                                    <div class="card-body py-2">

                                                                        <h4 class="mb-3">{{ $business->business_name }}
                                                                        </h4>
                                                                        {{-- {{ dd(route('user.getBusinessData',$business->id)) }} --}}
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger update-business-button"
                                                                            data-route="{{ route('user.getBusinessData', $business->id) }}"
                                                                            {{-- data-toggle="modal" data-target="#updateModal" --}}
                                                                            data-id="{{ $business->id }}">{{ __('Update') }}</button>
                                                                        <button type="button"
                                                                            class="btn btn-danger delete-business"
                                                                            data-business-id="{{ $business->id }}">Delete</button>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="card mb-2 shadow bg-white" style="border-radius: 15px;">
                                        <div class="card-body" style="position: relative;">
                                            <h6> No businesses found. </h6>
                                            <ul class="nav nav-tabs header-menu horizontal-list">
                                                <li>
                                                    <a class="header-menu-tab" data-toggle="tab" href="#menu2">Add a new
                                                        business</a>.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            {{-- add business end --}}

                        </div>
                    </div>
                </div>

                {{-- ads start --}}
                <div class="col-lg-3 mt-2">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-10">
                            <div class="card mb-1 text-center" style="background-color:#FFC107;">
                                <h6 class="mt-2"
                                    style="font-family: Georgia, 'Times New Roman', Times, serif;color:#202222">
                                    MEMBER OFFERS</h6>
                            </div>
                            <div class="card mb-4">
                                @if ($member_offer_ads->isEmpty())
                                    <div class="card mb-4 text-center justify-content-center" style="height: 200px;">
                                        <p>No Ads Found</p>
                                    </div>
                                @else
                                    <div class="slider">
                                        @foreach ($member_offer_ads as $offer)
                                      
                                        <a href="{{ route('user.userProfile', $offer->user_id) }}">
                                            <img style="max-height: 360px;width: 100%;" src="{{ asset($offer->banner) }}">
                                        </a>
                                      
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="card mb-1 text-center" style="background-color:#FFC107;">
                                <h6 class="mt-2"
                                    style="font-family: Georgia, 'Times New Roman', Times, serif;color:#202222">
                                    SOCIAL UPDATES</h6>
                            </div>

                            <div class="card mb-4">
                                {{-- <img height="350" src="{{ asset('assets/frontend/banner/vertical-banner2.jpg') }}"> --}}
                                @if ($social_offer_ads->isEmpty())
                                    <div class="card mb-4 text-center justify-content-center" style="height: 200px;">
                                        <p>No Ads Found</p>
                                    </div>
                                @else
                                <div class="slider">
                                    @foreach ($social_offer_ads as $offer)
                                     
                                        <a href="{{ route('user.userProfile', $offer->user_id) }}">
                                            <img style="max-height: 360px;width: 100%;" src="{{ asset($offer->banner) }}">
                                        </a>
                                       
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="card mb-1 text-center" style="background-color:#FFC107;">
                                <h6 class="mt-2"
                                    style="font-family: Georgia, 'Times New Roman', Times, serif;color:#202222">
                                    CULTURAL UPDATES</h6>
                            </div>

                            <div class="card mb-4">
                                @if ($cultuarl_offer_ads->isEmpty())
                                <div class="card mb-4 text-center justify-content-center" style="height: 200px;">
                                    <p>No Ads Found</p>
                                </div>
                            @else
                                {{-- <img height="350" src="{{ asset('assets/frontend/banner/vertical-banner2.jpg') }}"> --}}
                                <div class="slider">
                                    @foreach ($cultuarl_offer_ads as $offer)
                                      
                                        <a href="{{ route('user.userProfile', $offer->user_id) }}">
                                            <img style="max-height: 360px;width: 100%;" src="{{ asset($offer->banner) }}">
                                        </a>
                                       
                                    @endforeach
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ads end --}}

            </div>
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="updateModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update Your Business/Profession</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="updateBusinessForm" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="updateBusinessId" name="business_id">
                                <div class="row d-flex justify-content-center align-items-center p-1">

                                    <div class="col-lg-6 col-md-6 col-sm-12 justify-content-center align-items-center">
                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="business_name">{{ __('Business Name:') }}</label>
                                                </div>
                                                <div class="col col-lg-12 ">
                                                    <input type="text" class="form-control rounded-regular"
                                                        id="updateBusinessName" name="business_name"
                                                        style="border-radius: 10px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="designation">{{ __('Your Designation:') }}</label>
                                                </div>
                                                <div class="col col-lg-12 ">
                                                    <input type="text" class="form-control" id="updateDesignation"
                                                        name="designation" required style="border-radius: 10px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="business_logo">{{ __('Business Logo:') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                    <input type="file" class="form-control" id="updateBusinessLogo"
                                                        name="business_logo" style="border-radius: 10px">

                                                </div>

                                            </div>
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="business_logo">{{ __('old Business Logo:') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                    <input type="text" class="form-control" id="businessLogoPreview"
                                                        name="old_business_logo" style="border-radius: 10px">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div
                                                class="row justify-content-center align-items-center text-start no-gutters">
                                                <div class="col col-lg-4">
                                                    <label for="type">{{ __('Type:') }}</label>
                                                </div>
                                                <div class="col col-lg-8">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="type"
                                                            id="updateBusinessType" value="business" required>
                                                        <label class="form-check-label"
                                                            for="updateBusinessType">Business</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="type"
                                                            id="updateProfessionType" value="profession" required>
                                                        <label class="form-check-label"
                                                            for="updateProfessionType">Professional</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="updateIndustryField" style="display: none;">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="industry">{{ __('Industry :') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                     <select class="form-control form-control-sm" id="updateIndustry"
                                                        name="industry"
                                                        style="border: 1px solid #9c9c9c;border-radius: 10px;">
                                                        <option value="">Select Industry</option>
                                                        <option value="Advertising">Advertising</option>
                                                        <option value="Agriculture">Agriculture</option>
                                                        <option value="Automotive industry">Automotive industry
                                                        </option>
                                                        <option value="Business">Business</option>
                                                        <option value="Chemical industry">Chemical industry
                                                        </option>
                                                        <option value="Construction">Construction</option>
                                                        <option value="Economy">Economy</option>
                                                        <option value="Energy industry">Energy industry
                                                        </option>
                                                        <option value="Engineering">Engineering</option>
                                                        <option value="Electronics industry">Electronics
                                                            industry</option>
                                                        <option value="Entertainment">Entertainment</option>
                                                        <option value="E-commerce">E-commerce</option>
                                                        <option value="Fashion">Fashion</option>
                                                        <option value="Financial services">Financial services
                                                        </option>
                                                        <option value="Finance">Finance</option>
                                                        <option value="Food and Beverages">Food and Beverages
                                                        </option>
                                                        <option value="Hospitality industry">Hospitality
                                                            industry</option>
                                                         <option value="IT">IT</option>
                                                        <option value="Information Technology">Information
                                                            Technology</option>
                                                        <option value="Manufacturing">Manufacturing</option>
                                                        <option value="Mining">Mining</option>
                                                        <option value="Petroleum industry">Petroleum industry
                                                        </option>
                                                        <option value="Retail">Retail</option>
                                                        <option value="Sports">Sports</option>
                                                        <option value="Textile industry">Textile industry
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="updateProfessionField" style="display: none;">
                                            <div
                                                class="row justify-content-center align-items-center text-start no-gutters">
                                                <div class="col col-lg-4">
                                                    <label for="profession">{{ __('Profession:') }}</label>
                                                </div>
                                                <div class="col col-lg-8 ">
                                                    <select class="form-control form-control-sm"
                                                        style="border: 1px solid #9c9c9c;border-radius: 10px;"
                                                        id="updateProfession" name="profession">
                                                        <option value="">Select Profession</option>
                                                        <option value="Accountant">Accountant</option>
                                                        <option value="Actor">Actor</option>
                                                        <option value="Architect">Architect</option>
                                                        <option value="Artist">Artist</option>
                                                        <option value="Chef">Chef</option>
                                                        <option value="Cultural">Cultural</option>
                                                        <option value="Designer">Designer</option>
                                                        <option value="Doctor">Doctor</option>
                                                        <option value="Engineer">Engineer</option>
                                                        <option value="Entrepreneur">Entrepreneur</option>
                                                        <option value="Lawyer">Lawyer</option>
                                                        <option value="Musician">Musician</option>
                                                        <option value="Photographer">Photographer</option>
                                                        <option value="Pilot">Pilot</option>
                                                        <option value="Scientist">Scientist</option>
                                                        <option value="Socialist">Socialist</option>
                                                        <option value="Teacher">Teacher</option>
                                                        <option value="Writer">Writer</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        Please choose a Profession.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="mobile_number">{{ __('Mobile No :') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                    <input type="text" class="form-control" id="updateMobileNumber"
                                                        name="mobile_number" required style="border-radius: 10px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="email">{{ __('Email :') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                    <input type="email" class="form-control" id="updateEmail"
                                                        name="email" required style="border-radius: 10px">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 justify-content-center align-items-center">

                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="website">{{ __('Website :') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                    <input type="url" class="form-control" id="updateWebsite"
                                                        name="website" style="border-radius: 10px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="facebook">{{ __('FaceBook :') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                    <input type="url" class="form-control" id="updateFacebook"
                                                        name="facebook" style="border-radius: 10px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="instagram">{{ __('Instagram :') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                    <input type="url" class="form-control" id="updateInstagram"
                                                        name="instagram" style="border-radius: 10px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label for="linkedin">{{ __('Linkedin:') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                    <input type="url" class="form-control" id="updateLinkedin"
                                                        name="linkedin" style="border-radius: 10px">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-center text-start">
                                                <div class="col col-lg-12">
                                                    <label
                                                        for="business_description">{{ __('Brief About the Business:') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                    <textarea class="form-control" id="updateBusinessDescription" name="business_description" required
                                                        style="border-radius: 10px"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row justify-content-center align-items-start text-start">
                                                <div class="col col-lg-12">
                                                    <label for="search_keywords">{{ __('Search Words:') }}</label>
                                                </div>
                                                <div class="col col-lg-12">
                                                    <input type="text" class="form-control" id="updateSearchKeywords"
                                                        name="search_keywords" style="border-radius: 10px">
                                                    <span style="color: #F53F10">Use Comma (,) for multiple
                                                        search words</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- delete business model --}}
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this business?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
