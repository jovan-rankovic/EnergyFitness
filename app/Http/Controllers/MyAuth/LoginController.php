<?php

namespace App\Http\Controllers\MyAuth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request, User $user)
    {
            $email = $request->logEmail;
            $passwd = $request->logPasswd;

            $existingUser = $user->loginCheck($email, $passwd);

            if($existingUser)
            {
                $request->session()->put('user', $existingUser);
                \Log::info(session('user')->first_name.' '.session('user')->last_name.' logged in.');
                return $existingUser->role->name == 'admin' ? redirect()->back()->with('message', 'Welcome, admin.') : redirect()->back()->with('message', 'Login successful.');
            }
            else
            {
                return redirect('/')->with('message', 'Wrong username or password.');
            }
    }

    public function logout()
    {
        \Log::info(session('user')->first_name.' '.session('user')->last_name.' logged out.');
        session()->forget('user');
        return redirect('/');
    }
}
