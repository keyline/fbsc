@extends('frontend.user-dashboard-master')
@section('page-title')
    {{__('User Dashboard')}}
@endsection
@section('content')
    <section class="login-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="user-dashboard-wrapper">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="mobile_nav">
                                <i class="fas fa-cogs"></i>
                            </li>
                           
                           
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('user.home')) active @endif " href="{{route('user.home')}}">{{__('Profile')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('user.home.profile.pic')) active @endif " href="{{route('user.home.profile.pic')}}">{{__('Profile Pic')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('user.home.profile.cover.pic')) active @endif " href="{{route('user.home.profile.cover.pic')}}">{{__('Profile Cover Pic')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('user.business')) active @endif" href="{{route('user.business')}}">{{__('Business Dashboard')}}</a>
                            </li>
                             <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('create-ads')) active @endif" href="{{route('create-ads')}}">{{__('Create Advertisement')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('all-ads')) active @endif" href="{{route('all-ads')}}">{{__('All Advertisement')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(request()->routeIs('user.home.change.password')) active @endif " href="{{route('user.home.change.password')}}">{{__('Change Password')}}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="{{ route('user.logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel">
                                <div class="message-show margin-top-10">
                                    <x-flash-msg/>
                                    <x-error-msg/>
                                </div>
                                @yield('section')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(document).ready(function (){
           $('select[name="country"] option[value="{{auth()->guard('web')->user()->country}}"]').attr('selected',true);
        });
    </script>
@endsection