<?php

namespace App\Http\Controllers\MyAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
            try
            {
                $user = User::create([
                    'first_name' => $request->regFN,
                    'last_name' => $request->regLN,
                    'email' => $request->email,
                    'password' => md5($request->regPasswd),
                    'image' => 'images/user/new.jpg',
                    'role_id' => 2,
                    'remember_token' => md5(time().$request->email),
                    'email_verified_at' => date('Y-d-m H:i:s')
                ]);

//                if($user)
//                {
//                    $activation_link = url('/register').'/'.$user->remember_token;
//
//                    $subject = 'EnergyFitness - Activation';
//                    $headers = 'From: EnergyFitness e.fitns@gmail.com';
//
//                    mail($user->email, $subject, $activation_link, $headers);
//
//                    \Log::info($user->first_name.' '.$user->last_name.' registered, activation link was sent.');
//
//                    return redirect('/')->with('message', 'Activation link sent, check your e-mail.');
//                }

                \Log::info($user->first_name.' '.$user->last_name.' registered.');

                return redirect('/')->with('message', 'Registration successful.');
            }
            catch (\Exception $ex)
            {
                \Log::error($ex->getMessage());

                return redirect('/')->with('message', 'Something went wrong, try again later.');
            }
    }

    public function activate(Request $request)
    {
        $user = User::where('remember_token', $request->remember_token)
        ->update([
            'email_verified_at' => date('Y-d-m H:i:s')
        ]);

        if($user)
        {
            return redirect('/')->with('message', 'E-mail verified successfully.');
        }
        else
        {
            return redirect('/')->with('message', 'Verification problem.');
        }
    }
}