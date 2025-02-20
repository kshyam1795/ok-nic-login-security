<?php

namespace Growats\OkNicLoginSecurity\Services;

use Illuminate\Support\Facades\Mail;

class EmailOtpService
{
    public static function generateOtp()
    {
        return rand(100000, 999999);
    }

    public static function sendOtp($email, $otp)
    {
        Mail::send('ok-nic-login-security::otp-email', ['otp' => $otp], function ($message) use ($email) {
            $message->to($email)->subject('Your OTP Code');
        });
    }

    public static function verifyOtp($inputOtp, $storedOtp)
    {
        return $inputOtp == $storedOtp;
    }
}
