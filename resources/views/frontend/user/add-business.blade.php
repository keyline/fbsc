@extends('frontend.user-business-dashboard')
@section('page-title')
    {{ __('User Dashboard') }}
@endsection
@section('content')
    <section class="login-page-wrapper">
        {{-- {{ $member }} --}}

        @foreach ($member as $user_details)
            <div class="container-fluid">
                <div class="row no-gutters justify-content-center align-items-center">
                    <div class="col-lg-12">
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
                                                <h3 class="mb-3 font-weight-bold">{{ $user_details->first_name }}
                                                    {{ $user_details->last_name }} <span
                                                        class="bg-warning b-name h4 ml-2">Business |
                                                        {{ $user_details->highlight }}</span></h3>
                                                <p class="small mb-0"><i class="far fa-star fa-lg"></i> <span
                                                        class="mx-2">|</span>
                                                    <strong>{{ $user_details->about }}</strong>
                                                </p>
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

                                    </ul>
                                </header>
                            </div>
                            <div class="tab-content col-lg-11 col-md-11 col-sm-12 mb-2">
                                <div class="message-show margin-top-10">
                                    <x-flash-msg />
                                    <x-error-msg />
                                </div>

                                {{-- add business start --}}
                                <div id="home" class="tab-pane  in active col-lg-12">

                                    <div class="card mb-5 shadow bg-white border-1"
                                        style="border: 1px solid #9c9c9c;border-radius: 15px;">
                                        <div class="card-body p-3">
                                            <h5 class="mb-2">Add Your Business/Profession : </h5>
                                            <hr>
                                            <form id="member_business" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="member_id" value="{{ $user_details->id }}">
                                                <input type="hidden" name="url" id="url"
                                                    value="{{ route('store_member_business') }}">
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
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
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
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
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
                                                                    <input type="file"
                                                                        class="form-control form-control-sm"
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
                                                                            name="type" id="businessType"
                                                                            value="business" required>
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

                                                        <div class="form-group" id="industryField"
                                                            style="display: none;">
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
                                                                        <option value="Automotive industry">Automotive
                                                                            industry
                                                                        </option>
                                                                        <option value="Business">Business</option>
                                                                        <option value="Chemical industry">Chemical industry
                                                                        </option>
                                                                        <option value="Construction">Construction</option>
                                                                        <option value="economy">economy</option>
                                                                        <option value="Energy industry">Energy industry
                                                                        </option>
                                                                        <option value="Engineering">Engineering</option>
                                                                        <option value="Electronics industry">Electronics
                                                                            industry</option>
                                                                        <option value="Entertainment">Entertainment
                                                                        </option>
                                                                        <option value="E-commerce">E-commerce</option>
                                                                        <option value="Fashion">Fashion</option>
                                                                        <option value="Financial services">Financial
                                                                            services
                                                                        </option>
                                                                        <option value="Finance">Finance</option>
                                                                        <option value="Food industry">Food industry
                                                                        </option>
                                                                        <option value="Hospitality industry">Hospitality
                                                                            industry</option>
                                                                        <option value="IT">IT</option>
                                                                        <option value="Manufacturing">Manufacturing
                                                                        </option>
                                                                        <option value="Mining">Mining</option>
                                                                        <option value="Petroleum industry">Petroleum
                                                                            industry
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

                                                        <div class="form-group" id="professionField"
                                                            style="display: none;">
                                                            <div
                                                                class="row justify-content-center align-items-center text-start no-gutters">
                                                                <div class="col col-lg-4">
                                                                    <label
                                                                        for="profession">{{ __('Profession:') }}</label>
                                                                </div>
                                                                <div class="col col-lg-8 ">
                                                                    <select class="form-control form-control-sm"
                                                                        style="border: 1px solid #9c9c9c;border-radius: 10px;"
                                                                        id="profession" name="profession">
                                                                        <option value="">Select Profession</option>
                                                                        <option value="Doctor">Doctor</option>
                                                                        <option value="Lawyer">Lawyer</option>
                                                                        <option value="Engineer">Engineer</option>
                                                                        <option value="Teacher">Teacher</option>
                                                                        <option value="Accountant">Accountant</option>
                                                                        <option value="Socialist">Socialist</option>
                                                                        <option value="Cultural">Cultural</option>
                                                                        <option value="Musician">Musician</option>
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
                                                                    <label
                                                                        for="mobile_number">{{ __('Mobile No :') }}</label>
                                                                </div>
                                                                <div class="col col-lg-8 ">
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
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
                                                                    <input type="email"
                                                                        class="form-control form-control-sm"
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
                                                                    <input type="url"
                                                                        class="form-control form-control-sm"
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
                                                                    <input type="url"
                                                                        class="form-control form-control-sm"
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
                                                                    <input type="url"
                                                                        class="form-control form-control-sm"
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
                                                                    <input type="url"
                                                                        class="form-control form-control-sm"
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
                                                                    <input type="text"
                                                                        class="form-control form-control-sm"
                                                                        id="search_keywords" name="search_keywords"
                                                                        style="border: 1px solid #9c9c9c;border-radius: 10px;"
                                                                        required>
                                                                    <div class="invalid-feedback">
                                                                        Please Enter a search Keywords.
                                                                    </div>
                                                                    <small class="form-text" style="color: #F53F10;">Use
                                                                        Comma
                                                                        (,)
                                                                        for multiple
                                                                        search words</small>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary btn-rounded btn-md member">
                                                        SUBMIT
                                                    </button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                                {{-- add business end --}}

                            </div>
                        </div>
                    </div>

                    {{-- ads start --}}
                    
                    {{-- ads end --}}

                </div>

                {{-- delete business model --}}
                <div class="modal fade" id="confirmation_addModal" tabindex="-1" role="dialog"
                aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmationModalLabel">Confirm</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Do you want to add more business?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" id="confirmYes">Yes</button>
                            <button type="button" class="btn btn-danger" id="confirmNo" data-dismiss="modal">No</button>
                        </div>
                    </div>
                </div>
            </div>            

            </div>
        @endforeach
    </section>
@endsection
