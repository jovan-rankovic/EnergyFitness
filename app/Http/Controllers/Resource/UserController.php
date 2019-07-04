<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.pages.users.index', compact('users'));
    }


    public function create()
    {
        return view('admin.pages.users.create');
    }


    public function store(UserRequest $request)
    {
        $password = md5($request->password);
        $image = $request->image;

        if($image->isValid())
        {
            $imgFolder = 'images/user/';
            $imgName = time().rand().$image->getClientOriginalName();
            $image->move(public_path().'/'.$imgFolder, $imgName);

            User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => $password,
                'role_id' => $request->role_id,
                'email_verified_at' => $request->email_verified_at,
                'image' => $imgFolder.$imgName
            ]);

            return redirect('/admin/users');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit(User $user)
    {
        return view('admin.pages.users.edit', compact('user'));
    }


    public function update(UserRequest $request, User $user)
    {
        $image = $request->image;

        if($image)
        {
            if($image->isValid())
            {
                if(File::exists(public_path().'/'.$user->image))
                {
                    $defaultImage = public_path().'/images/user/new.jpg';

                    if(public_path().'/'.$user->image != $defaultImage)
                    {
                        File::delete(public_path().'/'.$user->image);
                    }
                }

                $imgFolder = 'images/user/';
                $imgName = time().rand().$image->getClientOriginalName();
                $image->move(public_path().'/'.$imgFolder, $imgName);

                $user->update([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'role_id' => $request->role_id,
                    'email_verified_at' => $request->email_verified_at,
                    'image' => $imgFolder.$imgName
                ]);
            }
        }
        else
        {
            $user->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'email_verified_at' => $request->email_verified_at
            ]);
        }

        return redirect('/admin/users');
    }


    public function destroy(User $user)
    {
        if(File::exists(public_path().'/'.$user->image))
        {
            $defaultImage = public_path().'/images/user/new.jpg';

            if(public_path().'/'.$user->image != $defaultImage)
            {
                File::delete(public_path().'/'.$user->image);
            }
        }

        User::where(request(['id']))->delete();
    }
}