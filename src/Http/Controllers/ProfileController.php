<?php

namespace Growats\OkNicLoginSecurity\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('ok-nic-login-security::profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->update($request->only(['name', 'email']));
        return redirect()->route('profile.show');
    }
}
