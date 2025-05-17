@extends('frontend.frontend-page-master')
@section('page-title')
    {{__('Reset Password')}}
@endsection
@section('content')
    <section class="login-page-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="login-form-wrapper">
                        <h2>{{__('Reset Password')}}</h2>
                        @include('backend.partials.message')
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('user.reset.password.change')}}" method="post" enctype="multipart/form-data" class="account-form">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                            <div class="form-group">
                                <input type="text" id="username" class="form-control" readonly value="{{$username}}" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control passwordField" name="password" placeholder="{{__('New Password')}}">
                            </div>
                            <div class="form-group">
                                <input type="password" id="password_confirmation"  class="form-control passwordField" name="password_confirmation" placeholder="{{__('Confirm Password')}}">
                            </div>
                            <div class="form-group">
                            <input type="checkbox" class="mt-3 text-muted" id="showPassword"> <label for="showPassword">{{__('Show Password')}}</label>
                            </div>
                            <div class="form-group btn-wrapper">
                                <button type="submit" class="submit-btn width-220">{{__('Reset Password')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#showPassword').on('change', function () {
            var passwordField = $('.passwordField');
            var passwordFieldType = passwordField.attr('type');

            if ($(this).is(':checked')) {
                passwordField.attr('type', 'text');
            } else {
                passwordField.attr('type', 'password');
            }
        });
    });
</script>
@endsection


