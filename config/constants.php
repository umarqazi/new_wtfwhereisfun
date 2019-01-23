<?php
    return[
        /* Messages constants */
        'GENERAL_ERROR'     => 'Something went wrong, please try again.',
        'EMAIL_SEND_FAILED' => 'Failed to sending a mail',
        'NO_CHANGES'        => 'We didn`t find any changes',
        'USER_VERIFICATION' => 'Currently your profile is not verified.<br><a class="green" href="#" onclick="resendVerification(event)">Click Here</a> to resend the verification email',
        'BLOCK_USER_MSG'    => 'Your profile has been blocked. Please contact to our disputes team',
        'DEACTIVATE_USER'   => 'Currently your profile is deactivated. Please contact to our disputes team',
        'SESSION_EXPIRED'   => 'Your session has been expired, please re-login to access our app',
        'AUTH_FAILED'       => 'Invalid Email Id Or Password',
        'INCORRECT_PASS'    => 'Sorry! Password does not matched with our records',
        'AUTH_SUCCESS'      => 'User loggedin successfully',
        'REG_SUCCESS'       => 'Your account has been created successfully, please check your mail inbox to verify your account',
        'REG_FAILED'        => 'Failed please try again!',
        'VERIFIED_SUCCESS'  => 'Your email has been verified Successfully! You may login now.',
        'RESEND_VERIFY_MAIL'=> 'Verification Email has been resent. Please verify to login',
        'ALREADY_VERIFIED'  => 'Your email is already verified.',
        'FORGET_VERIFY'     => 'Currently your profile is not verified, please verfiy your email to use forget password',
        'FORGET_SOCIAL'     => 'Social users can not request for forgot password',
        'FORGET_BLOCKED'    => 'Your profile is blocked. You cannot request for forgot password',
        'FORGET_ALREADY'    => 'We have already sent you an email for resetting the password',
        'FORGET_SUCCESS'    => 'A reset link has been sent to your email address. You can reset your password from your email',
        'SITE_NAME'         => 'WTFWherestheFun',
        'ALREADY_CHANGED'   => 'You have already changed your password. Request again to get a new one.',
        'PASSWORD_SUCCESS'  => 'Your password has been changed Successfully',
        'SUPPORT_EMAIL'     => 'wtf@orbitedgetech.com',

        /* User Default Image */
        'DEFAULT_USER_IMG_PATH'     =>      'img/default-148.png',

        /* User Profile Constants */
        'PROFILEINFO_SUCCESS'        =>      'Your Profile Information has been updated Successfully',
        'PROFILEINFO_FAIL'           =>      'Some errors occurred while updating your Profile Information.Please try Again',
        'CONTACTINFO_SUCCESS'        =>      'Your Contact Information has been updated Successfully',
        'CONTACTINFO_FAIL'           =>      'Some errors occurred while updating your Contact Information.Please try Again',
        'ADDRESSINFO_SUCCESS'        =>      'Your Address Information has been updated Successfully',
        'ADDRESSINFO_FAIL'           =>      'Some errors occurred while updating your Address Information.Please try Again',
        'PASSWORD_FAIL'              =>      'Current Password does not match with our records',

        /* Organizer Profile Constants*/
        'ORGANIZERPROFILE_SUCCESS'        =>      'Organizer Profile has been created Successfully',
        'ORGANIZERUPDATE_SUCCESS'         =>      'Organizer Profile has been updated Successfully',
        'ORGANIZERPROFILE_FAIL'           =>      'Some errors occurred while updating your Profile Information.Please try Again',
        'ORGANIZERLINKS_SUCCESS'          =>      'Organizer Social Links has been updated Successfully',
        'ORGANIZERCOLORS_SUCCESS'         =>      'Organizer Profile colors has been updated Successfully',

        /* Event Constants */
        'EVENTCREATED_SUCCESS'         =>       'Event created Successfully. You are being redirected to event page to complete Event Details',
        'COMPLETE_DETAILS'             =>       'Complete event details first to move forward',

        'FACEBOOK_APP_ID'              =>       env('FACEBOOK_APP_ID', '2321030821302722'),
        'FACEBOOK_APP_SECRET'          =>       env('FACEBOOK_APP_SECRET', 'b8989ab478cce0255215e3f4166e2aaa'),
        'FACEBOOK_EMPTY_PAGES'         =>       'You have no Facebook pages.<br>Please create one to post this event'

    ];