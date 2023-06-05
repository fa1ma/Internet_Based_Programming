<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('user.password.change');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->update(['password' => Hash::make($request->new_password)]);
            return redirect('/')->with('success', 'Password changed successfully.');
        }

        return back()->withErrors(['current_password' => 'Incorrect current password.']);
    }
}
