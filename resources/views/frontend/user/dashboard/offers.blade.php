@extends('frontend.user-business-dashboard')
@section('page-title')
    {{ __('Offers') }}
@endsection
@section('content')
    <section class="login-page-wrapper">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 col-sm-12 mt-5" style="display: flex; justify-content: center; align-items: center;">
                    <h3>MEMBER OFFERS</h3>
                </div>
                <div class="col-md-12 col-sm-12 mb-5">
                    <div class="row justify-content-center align-items-center">
                        @if ($member_offer_ads->isEmpty())
                            <div class="card mb-4 text-center justify-content-center" style="height: 200px;width:200px">
                                <p>No Ads Found</p>
                            </div>
                        @else
                            @foreach ($member_offer_ads as $offer)
                                <div class="col-md-2 col-sm-2">
                                    <div class="card mb-4">
                                       <a href="{{ route('user.userProfile', $offer->user_id) }}">
                                            <img style="max-height: 360px;width: 100%;" src="{{ asset($offer->banner) }}">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 mt-5" style="display: flex; justify-content: center; align-items: center;">
                    <h3>SOCIAL UPDATES</h3>
                </div>

                <div class="col-md-12 col-sm-12 mb-5">
                    <div class="row justify-content-center align-items-center">
                        @if ($social_offer_ads->isEmpty())
                            <div class="card mb-4 text-center justify-content-center" style="height: 200px;width:200px">
                                <p>No Ads Found</p>
                            </div>
                        @else
                            @foreach ($social_offer_ads as $offer)
                                <div class="col-md-2 col-sm-2">
                                    <div class="card mb-4">
                                        <a href="{{ route('user.userProfile', $offer->user_id) }}">
                                            <img style="max-height: 360px;width: 100%;" src="{{ asset($offer->banner) }}">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>


                <div class="col-md-12 col-sm-12 mt-5" style="display: flex; justify-content: center; align-items: center;">
                    <h3>CULTURAL UPDATES</h3>
                </div>

                <div class="col-md-12 col-sm-12 mb-5">
                    <div class="row justify-content-center align-items-center">
                        @if ($cultuarl_offer_ads->isEmpty())
                            <div class="card mb-4 text-center justify-content-center" style="height: 200px;width:200px">
                                <p>No Ads Found</p>
                            </div>
                        @else
                            @foreach ($cultuarl_offer_ads as $offer)
                                <div class="col-md-2 col-sm-2">
                                    <div class="card mb-4">
                                        <a href="{{ route('user.userProfile', $offer->user_id) }}">
                                            <img style="max-height: 360px;width: 100%;" src="{{ asset($offer->banner) }}">
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
