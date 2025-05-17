<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fbsc - Member Register</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!------ Include the above in your HEAD tag ---------->

    <style>
        body {
            background-color: #dee9ff;
        }

        .registration-form {
            padding: 50px 50px;
        }

        .registration-form form {
            background-color: #fff;
            max-width: 500px;
            margin: auto;
            padding: 50px 70px;
            border-radius: 30px;
            /* border-top-right-radius: 30px; */
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .form-icon {
            text-align: center;
            background-color: #5891ff;
            border-radius: 50%;
            font-size: 40px;
            color: white;
            width: 100px;
            height: 100px;
            margin: auto;
            margin-bottom: 50px;
            line-height: 100px;
        }

        .registration-form .item {
            border-radius: 20px;
            margin-bottom: 25px;
            padding: 10px 20px;
        }

        .registration-form .create-account {
            border-radius: 30px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
            background-color: #5791ff;
            border: none;
            color: white;
            margin-top: 20px;
        }

        .registration-form .social-media {
            max-width: 500px;
            background-color: #fff;
            margin: auto;
            padding: 35px 0;
            text-align: center;
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            color: #9fadca;
            border-top: 1px solid #dee9ff;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
        }

        .registration-form .social-icons {
            margin-top: 30px;
            margin-bottom: 16px;
        }

        .registration-form .social-icons a {
            font-size: 23px;
            margin: 0 3px;
            color: #5691ff;
            border: 1px solid;
            border-radius: 50%;
            width: 45px;
            display: inline-block;
            height: 45px;
            text-align: center;
            background-color: #fff;
            line-height: 45px;
        }

        .registration-form .social-icons a:hover {
            text-decoration: none;
            opacity: 0.6;
        }

        @media (max-width: 576px) {
            .registration-form {
            padding: 50px 20px;
        }

            .registration-form form {
                padding: 50px 20px;
            }

            .registration-form .form-icon {
                width: 70px;
                height: 70px;
                font-size: 30px;
                line-height: 70px;
            }
        }
    </style>

</head>

<body>

    <div class="registration-form">
        
    <form method="POST" action="{{ route('member_create') }}">
        @csrf
        <div class="form-icon">
            <span><i class="icon icon-user"></i></span>
            {{-- <h3>Member Register</h3> --}}
        </div>
        <div class="message-show margin-top-10">
            <x-flash-msg />
            <x-error-msg />
        </div>
        
        <div class="form-group">
            <input type="text" class="form-control item" id="username" name="username" placeholder="Username">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="first_name" name="first_name" placeholder="First Name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="last_name" name="last_name" placeholder="Last Name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control item" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control item" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="profession" name="profession" placeholder="Profession">
        </div>
        <div class="form-group">
            <input type="text" class="form-control item" id="business_interest" name="business_interest" placeholder="Business Interest">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block create-account">Register</button>
        </div>
    </form>
    {{-- <div class="social-media">
        <h5>Sign up with social media</h5>
        <div class="social-icons">
            <a href="#"><i class="icon-social-facebook" title="Facebook"></i></a>
            <a href="#"><i class="icon-social-google" title="Google"></i></a>
            <a href="#"><i class="icon-social-twitter" title="Twitter"></i></a>
        </div>
    </div> --}}
    </div>


</body>

</html>
