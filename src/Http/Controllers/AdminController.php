<?php

namespace Growats\OkNicLoginSecurity\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    public function showSettings()
    {
        return view('ok-nic-login-security::settings');
    }

    public function updateSettings(Request $request)
    {
        Config::set('app.name', $request->input('site_name'));
        return redirect()->route('settings.show');
    }

    public function showUsers()
    {
        $users = User::all();
        $roles = Role::all();
        return view('ok-nic-login-security::admin.users', compact('users', 'roles'));
    }

    /**
     * Assign role to user.
     */
    public function assignRole(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);
        return back()->with('success', 'Role updated successfully.');
    }
}
