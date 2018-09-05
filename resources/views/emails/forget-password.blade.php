<!DOCTYPE html>
<html>
<head>
    <title>WTF Where's the fun</title>
</head>

<body>
<h2>Hello, {{$reset_password->user->first_name}},</h2>
<br/>
<p>
Somebody (hopefully you) requested a new password for the {{Config::get('constants.SITE_NAME')}} account. No changes
    have been made to your account yet. You can reset your password by clicking this <a
            href={{url('reset-password/'.$reset_password->token)}}>link</a>
</p>
<p>
    We'll be here to help you every step of the way. If you did not request a new password, let us know immediately
    by forwarding this email to {{Config::get('constants.SUPPORT_EMAIL')}}.
</p>
<p>
    Thanks,<br>
    The {{Config::get('constants.SITE_NAME')}} Team
</p>
<br/>
</body>

</html>
