<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ __('Account Verify') }} </title>
    <style>
        .mail-container {
            max-width: 650px;
            margin: 0 auto;
            text-align: center;
        }

        .mail-container .logo-wrapper {
            background-color: #1d2228;
            padding: 20px 0 20px;
        }

        table {
            margin: 0 auto;
        }

        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        table td,
        table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #1d2228;
            color: white;
        }

        footer {
            margin: 20px 0;
            font-size: 10px;
        }

        .mail-container .message-box {
            text-align: center;
            margin: 40px 0;
        }

        .btn {
            background-color: #444;
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 3px;
            display: block;
            width: 130px;
            margin-top: 20px;
        }

        .verify-code {
            background-color: #f2f2f2;
            color: #333;
            padding: 10px 15px;
            border-radius: 3px;
            display: block;
            margin: 20px 0;
        }

        .logo-wrapper img {
            max-width: 200px;
        }
    </style>
</head>

<body>
       <p>Hello {{ $member->first_name }},</p>

    <p>Your login details:</p>
    <ul>
        <li>Username: {{ $user->username }}</li>
        <li>Password: {{ $password }}</li>
    </ul>

    <p>Thank you for your membership.</p>

    <p>Best regards,<br>FBSC - Forum for Business ,Social and Cultural Initiatives</p>

</body>

</html>
