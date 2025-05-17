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
            {{-- {{ $get_user }} --}}
            @if (count($get_user) > 0)
                @foreach ($get_user as $user)
                    <div class="row no-gutters">
                        <div class="col-lg-9">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-12">
                                    <!-- Cover Photo -->
                                    <div class="cover-photo">
                                        @if ($user->profile_cover_pic)
                                            <img src="{{ asset($user->profile_cover_pic) }}" alt="Cover Photo">
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

                                                @if ($user->profile_pic)
                                                    <img src="{{ asset($user->profile_pic) }}" alt="Cover Photo">
                                                @else
                                                    <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                        alt="Cover Photo">
                                                @endif
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg-10 col-md-10 col-sm-10 justify-content-center align-items-center">
                                            <div class="justify-content-center align-items-center detail-box"
                                                style="border-radius: 15px;position: relative;">
                                                <div class="card-body py-4">
                                                    <h3 class="mb-3 font-weight-bold">{{ $user->name }} <span
                                                            class="bg-warning b-name h4 ml-2">Business |
                                                            {{ $user->profession }}</span></h3>
                                                    <p class="small mb-0"><i class="far fa-star fa-lg"></i> <span
                                                            class="mx-2">|</span>
                                                        <strong>{{ $user->about }}</strong>
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
                                                <a id="about-tab" class="header-menu-tab active" data-toggle="tab"
                                                    href="#home"><span class="fa fa-user mr-1"></span>About</a>
                                            </li>
                                            <li>
                                                <a id="messages-tab" class="header-menu-tab" data-toggle="tab"
                                                    href="#menu1"><span class="fa fa-envelope mr-1"></span>Messages</a>

                                            </li>

                                        </ul>
                                    </header>
                                </div>
                                <div class="tab-content col-lg-11 mb-2">
                                    <div class="message-show margin-top-10">
                                        <x-flash-msg />
                                        <x-error-msg />
                                    </div>
                                    <div id="home" class="tab-pane  in active col-lg-12">
                                        @if (count($business_of_user) > 0)
                                            @foreach ($business_of_user as $business)
                                                <div class="row d-flex justify-content-between align-items-center">
                                                    <div class="col-lg-10 col-md-10 col-sm-12 ">
                                                        <div class="card mb-2 shadow bg-white" style="border-radius: 15px;">
                                                            <div class="card-body" style="position: relative;">
                                                                <div
                                                                    class="row d-flex justify-content-center align-items-center">
                                                                    <div
                                                                        class="col-lg-2 col-md-6 col-sm-12 justify-content-center align-items-center">
                                                                        @if ($business->business_logo)
                                                        <img class="img rounded" width="140" height="120"
                                                        src="{{ asset($business->business_logo) }}"alt="Business Logo">
                                                       @else
                                                        <img src="{{ asset('assets/frontend/banner/image-not-found-coverpic.png') }}"
                                                            alt="Business Logo">
                                                        @endif
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-6 col-md-6 col-sm-12 justify-content-center align-items-center">
                                                                        <div class="justify-content-center align-items-center"
                                                                            style="border-radius: 15px;">
                                                                            <div class="card-body py-4">
                                                                               <h4 class="mb-3 font-weight-bold user-name" title="{{ $business->business_name }}">
                                                                                    {{ $business->business_name }}</h4>
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
                                                                                    <span class="mx-1">|</span>
                                                                                    @if ($business->business_description)
                                                                                        {{-- {{ implode(' | ', $business->search_keywords) }} --}}
                                                                                        {{ $business->business_description }}
                                                                                    @endif
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="col-lg-4 col-md-6 col-sm-12 justify-content-center align-items-center">
                                                                        <div
                                                                            class="justify-content-center align-items-center">
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
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                                        <button type="button" class="btn btn-danger connect-btn"
                                                            style="width:100%;border:1px solid #e61515"
                                                            data-business-id="{{ $business->id }}"
                                                            data-business-name="{{ $business->business_name }}"
                                                            data-business-logo="{{ asset($business->business_logo) }}"
                                                            {{-- data-toggle="tab" href="#menu1" --}}>
                                                            {{ __('Connect') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="card mb-2 shadow bg-white" style="border-radius: 15px;">
                                                <div class="card-body" style="position: relative;">
                                                    <h6> No businesses found. </h6>
                                                    <ul class="nav nav-tabs header-menu horizontal-list">
                                                        <li>
                                                            <a class="header-menu-tab" data-toggle="tab"
                                                                href="#menu2">Add a new
                                                                business</a>.
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif

                                    </div>

                                    {{-- keyword search --}}
                                    <div id="menu1" class="tab-pane fade in col-lg-12">
                                        {{-- @include('frontend.user.business.chat') --}}
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-lg-10 col-md-10 col-sm-12 ">
                                                <div class="card mb-2 shadow bg-white" style="border-radius: 15px;">
                                                    <div class="card-body" style="position: relative;">
                                                        <div
                                                            class="row no-gutters d-flex justify-content-center align-items-center">
                                                            <div
                                                                class="col-lg-2 col-md-2 col-sm-12 mb-5 justify-content-center align-items-center message-tab-img">
                                                                @if ($user->profile_pic)
                                                                    <img class="img rounded " width="100"
                                                                        height="100"
                                                                        src="{{ asset($user->profile_pic) }}"
                                                                        alt="Cover Photo">
                                                                @else
                                                                    <img class="img rounded" width="100"
                                                                        height="100"
                                                                        src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                                        alt="Cover Photo">
                                                                @endif

                                                            </div>
                                                            <div class="col-lg-2 col-md-2 col-sm-12 mb-5 justify-content-center align-items-center message-tab-img1"
                                                                style="display: none">
                                                                <img class="img rounded message-tab-logo" width="100"
                                                                    height="100" src="" alt="Cover Photo">

                                                            </div>

                                                            <div
                                                                class="col-lg-10 col-md-10 col-sm-12 justify-content-center align-items-center">
                                                                <div class="justify-content-center align-items-center"
                                                                    style="border-radius: 15px;">
                                                                    <div class="card-body py-4">
                                                                        <h3 class="mb-3 message-tab-header"><span
                                                                                class="text-muted ">Send
                                                                                Message to</span> {{ $user->name }}
                                                                        </h3>
                                                                        <h3 class="mb-3 message-tab-header1"
                                                                            style="display: none"><span
                                                                                class="text-muted">Send
                                                                                Message to</span>
                                                                        </h3>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div
                                                                class="col-lg-10 col-md-10 col-sm-12 justify-content-center align-items-center">

                                                                <div class="chat-messages">
                                                                    {{-- @foreach ($messages as $message)
                                                                        <div
                                                                            class="message {{ $message->sender_id == auth()->id() ? 'sent' : 'received' }}">
                                                                            <p>{{ $message->message }}</p>
                                                                            <p class="message-timestamp">
                                                                                {{ $message->created_at->format('H:i') }}
                                                                            </p>
                                                                        </div>
                                                                    @endforeach --}}
                                                                    <div class="message sent">

                                                                    </div>
                                                                    <div class="message received">

                                                                    </div>
                                                                    <!-- More messages go here -->
                                                                </div>
                                                                <div class="chat-input input-group">

                                                                    <input type="text" id="message-input"
                                                                        placeholder="Type your message here..."
                                                                        aria-describedby="button-addon2"
                                                                        class="form-control rounded border-1 py-4">
                                                                    <div class="input-group-append">
                                                                        <button id="send-button" type="button"
                                                                            class="btn btn-primary"
                                                                            data-receiver-id="{{ $user->id }}"
                                                                            data-sender-id="{{ $user_details->id }}"> <i
                                                                                class="fa fa-paper-plane"></i></button>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


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
                                            {{-- <img height="350" src="{{ asset('assets/frontend/banner/vertical-banner1.png') }}"> --}}
                                            <img style="max-height: 360px;" src="{{ asset($offer->banner) }}">
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
                                            <img style="max-height: 360px;" src="{{ asset($offer->banner) }}">
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
                                            <img style="max-height: 360px;" src="{{ asset($offer->banner) }}">
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ads end --}}

                    </div>
                @endforeach
            @endif
            <!-- Modal -->

        </div>
    </section>
@endsection
