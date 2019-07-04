<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Menu;
use App\Post;
use App\Price;
use App\Slider;
use App\Social;
use App\Trainer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FrontendController extends Controller
{
    public function home()
    {
        $menus = Menu::orderBy('position')->get();
        $sliders = Slider::orderBy('position')->get();
        $trainers = Trainer::all();
        $prices = Price::orderBy('amount')->get();
        $posts = Post::latest('id')->paginate(4);
        $socials = Social::whereNull('trainer_id')->get();

        return view('front.pages.home', compact('menus','sliders', 'trainers', 'prices', 'posts', 'socials'));
    }

    public function contact(ContactRequest $request)
    {
        $name = $request->conName;
        $email = $request->conEmail;
        $subject = $request->conSubject;
        $message = $request->conMsg;
        $headers = 'From: '.$name.' '.$email;

        try
        {
            mail('jovan.rankovic.145.14@ict.edu.rs', $subject, $message, $headers);
            \Log::info('Contact message sent.');
            return redirect('/')->with('message', 'Message sent');
        }
        catch (\Exception $ex)
        {
            \Log::error($ex->getMessage());
            return redirect('/')->with('message', 'Error sending message.');
        }
    }

    public function image_update(Request $request, User $user)
    {
        $image = $request->imgUser;

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
                'image' => $imgFolder.$imgName
            ]);

            session('user')->update([
                'image' => $imgFolder.$imgName
            ]);

            return redirect('/')->with('message', 'Image changed successfully.');
        }

        return redirect('/');
    }
}