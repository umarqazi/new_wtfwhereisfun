<!DOCTYPE html>
<html>
<head>
    <title>WTF Where's the fun</title>
</head>

<body>
<h2>Hello {{$user->first_name}},</h2>
<br/>
Your profile has been created under this email {{$user->email}}. Please click on below link to verify your account.
<br/>
<a href="{{url('user/verify/'.$user->verification->token)}}">Verify Email</a>
</body>

</html>