<?php

namespace Growats\OkNicLoginSecurity\Http\Controllers;

use Illuminate\Http\Request;
use Growats\OkNicLoginSecurity\Services\EmailOtpService;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show login form.
     */
    public function showLoginForm()
    {
        return view('ok-nic-Login-security::login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user && EmailOtpService::verifyOtp($request->input('otp'), session('otp'))) {
            Auth::login($user);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['otp' => 'Invalid OTP.']);
    }

    /**
     * Send OTP to email.
     */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if ($user) {
            $otp = EmailOtpService::generateOtp();
            EmailOtpService::sendOtp($request->input('email'), $otp);
            session(['otp' => $otp]);
            return redirect()->route('login.form');
        }

        return back()->withErrors(['email' => 'Email not found.']);
    }
}
