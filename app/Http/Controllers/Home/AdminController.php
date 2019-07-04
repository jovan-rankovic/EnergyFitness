<?php

namespace App\Http\Controllers\Home;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Menu;
use App\Post;
use App\Price;
use App\Role;
use App\Service;
use App\Slider;
use App\Social;
use App\Trainer;
use App\User;

class AdminController extends Controller
{
    public function home()
    {
        $users = User::all();
        $roles = Role::all();
        $posts = Post::all();
        $comments = Comment::all();
        $sliders = Slider::all();
        $menus = Menu::all();
        $trainers = Trainer::all();
        $prices = Price::all();
        $services = Service::all();
        $socials = Social::all();

        return view('admin.pages.home', compact('users', 'roles', 'posts', 'comments', 'sliders', 'menus', 'trainers', 'prices', 'services', 'socials'));
    }
}
