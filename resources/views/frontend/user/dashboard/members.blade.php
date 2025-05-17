@extends('frontend.user-business-dashboard')
@section('page-title')
    {{ __('Members') }}
@endsection
@section('content')
    <style>
            .email-text {
                 max-width: 100%;
                 white-space: nowrap;
                 overflow: hidden;
                 text-overflow: ellipsis;
            }
         #name-search {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 5px;
            width: 200px;
            /* Adjust the width as needed */
        }

        #search-button {
            background-color: #366873;
            color: #fff;
            border: none;
            border-radius: 4px;
            padding: 5px 16px;
            cursor: pointer;
        }

        #search-button:hover {
            background-color: #1a3338;
            border: none
        }
        
        /* Add padding and border to alphabet boxes */
        .alphabet-box {
            padding: 5px 10px;
            border: 1px solid #ccc;
            margin: 5px;
            line-height: 50px;
            text-decoration: none;
            border-radius: 5px;
            color: #333;
        }

        /* Add hover effect for alphabet boxes */
        .alphabet-box:hover {
            background-color: #f5f5f5;
        }

        .member-entry {
            border: 1px solid #ebebeb;
            padding: 15px;
            margin-top: 15px;
            margin-bottom: 10px;
            /* -moz-box-shadow: 0 1.5rem 4rem rgba(22, 28, 45, 0.1);
                                -webkit-box-shadow: 0 1.5rem 4rem rgba(22, 28, 45, 0.1);
                                box-shadow: 1 0 1.5rem 4rem rgba(22, 28, 45, 0.1); */
            -moz-transition: all 300ms ease-in-out;
            -webkit-transition: all 300ms ease-in-out;
            -o-transition: all 300ms ease-in-out;
            transition: all 300ms ease-in-out;
            -webkit-border-radius: 3px;
            -webkit-background-clip: padding-box;
            -moz-border-radius: 3px;
            -moz-background-clip: padding;
            border-radius: 3px;
            background-clip: padding-box;
            background: #fff;
            /* -webkit-box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.3);
                                box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.2), 0 6px 10px 0 rgba(0, 0, 0, 0.3); */
        }

        .member-entry:before,
        .member-entry:after {
            content: " ";
            display: table;
        }

        .member-entry:after {
            clear: both;
        }

        .member-entry:hover {
            background: rgba(235, 235, 235, 0.3);
            -moz-box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.06);
            -webkit-box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.06);
            box-shadow: 1px 1px 1px rgba(0, 1, 1, 0.06);
        }

        .member-entry .member-img,
        .member-entry .member-details {
            float: left;
        }

        .member-entry .member-img {
            position: relative;
            display: block;
            width: 30%;
        }

        .member-entry .member-img img {
            width: 100%;
            display: block;
            max-width: 100%;
            height: auto;
        }

        .member-entry .member-img i {
            position: absolute;
            display: block;
            left: 50%;
            top: 50%;
            margin-top: -12.5px;
            margin-left: -12.5px;
            color: #FFF;
            font-size: 25px;
            zoom: 1;
            -webkit-opacity: 0;
            -moz-opacity: 0;
            opacity: 0;
            filter: alpha(opacity=0);
            -moz-transform: scale(0.5);
            -webkit-transform: scale(0.5);
            -ms-transform: scale(0.5);
            -o-transform: scale(0.5);
            transform: scale(0.5);
            -moz-transition: all 300ms ease-in-out;
            -webkit-transition: all 300ms ease-in-out;
            -o-transition: all 300ms ease-in-out;
            transition: all 300ms ease-in-out;
        }

        .member-entry .member-img:hover i {
            -moz-transform: scale(1);
            -webkit-transform: scale(1);
            -ms-transform: scale(1);
            -o-transform: scale(1);
            transform: scale(1);
            zoom: 1;
            -webkit-opacity: 1;
            -moz-opacity: 1;
            opacity: 1;
            filter: alpha(opacity=100);
        }

        .member-entry .member-details {
            width: 70%;
        }

        .member-entry .member-details h4 {
            font-size: 18px;
            margin-left: 20px;
        }

        .member-entry .member-details h4 a {
            -moz-transition: all 300ms ease-in-out;
            -webkit-transition: all 300ms ease-in-out;
            -o-transition: all 300ms ease-in-out;
            transition: all 300ms ease-in-out;
        }

        /* .member-entry .member-details .info-list {
                                                                                                                                margin-left: 1px;
                                                                                                                            } */

        .member-entry .member-details .info-list>div {
            margin-top: 5px;
            font-size: 11px;
        }

        .member-entry .member-details .info-list>div a {
            -moz-transition: all 300ms ease-in-out;
            -webkit-transition: all 300ms ease-in-out;
            -o-transition: all 300ms ease-in-out;
            transition: all 300ms ease-in-out;
        }

        .member-entry .member-details .info-list>div i {
            -moz-transition: all 300ms ease-in-out;
            -webkit-transition: all 300ms ease-in-out;
            -o-transition: all 300ms ease-in-out;
            transition: all 300ms ease-in-out;
        }

        .member-entry .member-details .info-list>div:hover i {
            color: #4f5259;
        }

        @media screen and (max-width: 768px) {
            .member-entry .member-img {
                width: 100%;
                float: none;
            }

            .member-entry .member-details {
                width: 100%;
                float: none;
            }


            .member-entry .member-details h4 {
                margin-top: 0;
            }
        }

        @media screen and (max-width: 480px) {
            .member-entry .member-img {
                width: 100%;
                float: none;
                text-align: center;
                position: relative;
                background: #f8f8f8;
                margin-bottom: 15px;
                -webkit-border-radius: 3px;
                -webkit-background-clip: padding-box;
                -moz-border-radius: 3px;
                -moz-background-clip: padding;
                border-radius: 3px;
                background-clip: padding-box;
            }

            .member-entry .member-img img {
                width: auto;
                display: inline-block;
                -webkit-border-radius: 0;
                -webkit-background-clip: padding-box;
                -moz-border-radius: 0;
                -moz-background-clip: padding;
                border-radius: 0;
                background-clip: padding-box;
            }

            .member-entry .member-details {
                width: 100%;
                float: none;
            }

            .member-entry .member-details h4,
            .member-entry .member-details .info-list {
                margin-left: 0;
            }

            .member-entry .member-details h4>div,
            .member-entry .member-details .info-list>div {
                padding: 0;
            }

            .member-entry .member-details .info-list>div {
                margin-top: 10px;
            }
        }
    </style>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <div class="container">

        {{-- Fbsc Member list start --}}
        <div class="row bootstrap snippets bootdeys">
            <div class="col-md-12 col-sm-12 mt-5" style="display: flex; justify-content: center; align-items: center;">
                <h2>FBSC Member List</h2>
            </div>
        </div>

        <div class="row bootstrap snippets bootdeys mb-5">

            {{-- Chairperson start --}}
            @if ($members->where('member_category', 'Chairperson')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Chairperson')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif

                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- Chairperson end --}}

            {{-- President start --}}
            @if ($members->where('member_category', 'President')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'President')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif
                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- President end --}}

            {{-- Vice President start --}}
            @if ($members->where('member_category', 'Vice President')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Vice President')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif

                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- Vice President end --}}

            {{-- Secretary start --}}
            @if ($members->where('member_category', 'Secretary')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Secretary')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif

                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- Secretary end --}}

            {{-- Joint Secretary start --}}
            @if ($members->where('member_category', 'Joint Secretary')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Joint Secretary')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif

                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- Joint Secretary end --}}

            {{-- Asst. Secretary start --}}
            @if ($members->where('member_category', 'Asst. Secretary')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Asst. Secretary')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif

                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- Asst. Secretary end --}}

            {{-- Treasurer start --}}
            @if ($members->where('member_category', 'Treasurer')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Treasurer')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif

                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- Treasurer end --}}

            {{-- General Member start --}}
            @if ($members->where('member_category', 'General Member')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'General Member')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif

                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- General Member end --}}

            {{-- Manager start --}}
            @if ($members->where('member_category', 'Manager')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Manager')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif

                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- Manager end --}}

            {{-- Special Member start --}}
            @if ($members->where('member_category', 'Special Member')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Special Member')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif

                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- Special Member end --}}


            {{-- Honorary Member start --}}
            @if ($members->where('member_category', 'Honorary Member')->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Honorary Member')
                        <div class="col-md-3 col-sm-3">
                            <div class="member-entry">
                                @if ($member->profile_pic)
                                    <a href="#" class="member-img">
                                        <img src="{{ asset($member->profile_pic) }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @else
                                    <a href="#" class="member-img">
                                        <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                            style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                    </a>
                                @endif

                                <div class="member-details">
                                    <h6> {{ $member->first_name }} {{ $member->last_name }}
                                    </h6>
                                    <p class="text-dark">
                                        <strong>{{ $member->member_category }}</strong>
                                    </p>
                                </div>

                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            {{-- Honorary Member end --}}

        </div>

        {{-- Fbsc Member list end --}}
        <hr class="my-4" style="background-color: #807f7f">

        {{-- Fbsc govering Member list start --}}
        <div class="row bootstrap snippets bootdeys">
            <div class="col-md-12 col-sm-12" style="display: flex; justify-content: center; align-items: center;">
                <h2>Governing Body Members</h2>
            </div>
        </div>
        <div class="row bootstrap snippets bootdeys mb-5">

            {{-- Chairperson start --}}
            @if (
                $members->where('member_category', 'Chairperson')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Chairperson')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif

                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Chairperson end --}}

            {{-- President start --}}
            @if (
                $members->where('member_category', 'President')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'President')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif
                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- President end --}}

            {{-- Vice President start --}}
            @if (
                $members->where('member_category', 'Vice President')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Vice President')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif

                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Vice President end --}}

            {{-- Secretary start --}}
            @if (
                $members->where('member_category', 'Secretary')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Secretary')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif

                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Secretary end --}}

            {{-- Joint Secretary start --}}
            @if (
                $members->where('member_category', 'Joint Secretary')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Joint Secretary')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif

                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Joint Secretary end --}}

            {{-- Asst. Secretary start --}}
            @if (
                $members->where('member_category', 'Asst. Secretary')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Asst. Secretary')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif

                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Asst. Secretary end --}}

            {{-- Treasurer start --}}
            @if (
                $members->where('member_category', 'Treasurer')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Treasurer')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif

                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Treasurer end --}}

            {{-- General Member start --}}
            @if (
                $members->where('member_category', 'General Member')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'General Member')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif

                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- General Member end --}}

            {{-- Manager start --}}
            @if (
                $members->where('member_category', 'Manager')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Manager')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif

                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Manager end --}}

            {{-- Special Member start --}}
            @if (
                $members->where('member_category', 'Special Member')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Special Member')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif

                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Special Member end --}}


            {{-- Honorary Member start --}}
            @if (
                $members->where('member_category', 'Honorary Member')->count() > 0 ||
                    $members->where(function ($query) {
                            $query->where('member_category', 'Chairperson')->orWhere(function ($query) {
                                $query->where('committee', 'like', '%"GOVERNING BODY"%');
                            });
                        })->count() > 0)
                @foreach ($members as $member)
                    @if ($member->member_category == 'Honorary Member')
                        @if ($member->committee && strpos($member->committee, 'GOVERNING BODY') !== false)
                            <div class="col-md-3 col-sm-3">
                                <div class="member-entry">
                                    @if ($member->profile_pic)
                                        <a href="#" class="member-img">
                                            <img src="{{ asset($member->profile_pic) }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @else
                                        <a href="#" class="member-img">
                                            <img src="{{ asset('assets/frontend/banner/user-profile-icon.jpg') }}"
                                                style="width: 50px;height:50px; border-radius: 10px;" class="img-rounded">
                                        </a>
                                    @endif

                                    <div class="member-details">
                                        <h6> {{ $member->first_name }} {{ $member->last_name }}
                                        </h6>
                                        <p class="text-dark">
                                            <strong>{{ $member->phone }}</strong>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endif
            {{-- Honorary Member end --}}

        </div>

        {{-- Fbsc Member govering list end --}}
        <hr class="my-4" style="background-color: #807f7f">

        {{-- Fbsc Member serach list start --}}
        <div class="row bootstrap snippets bootdeys">
            <div class="col-md-12 col-sm-12" style="display: flex; justify-content: center; align-items: center;">
                <h2>All Members</h2>
            </div>
        </div>
        <div class="row bootstrap snippets bootdeys mb-3">
            
            <div class="col-md-12">
                <div class="search-container">
                    <input type="text" class="search2" id="name-search" placeholder="Search by name">
                    <button id="search-button" >Search</button>
                </div>
            </div>
        </div>
         <div class="row bootstrap snippets bootdeys mb-5">
            <div class="col-md-12">
                <div class="alphabet-filter">
                    @foreach (range('A', 'Z') as $letter)
                        <a style="cursor: pointer" class="alphabet-box" data-alphabet="{{ $letter }}">{{ $letter }}</a>
                    @endforeach
                </div>
            </div>

        </div>
        <div class="member-list">
            <!-- Results will be displayed here -->
        </div>
      
    </div>
@endsection

