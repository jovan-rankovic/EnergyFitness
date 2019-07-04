<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\SocialRequest;
use App\Social;
use App\Trainer;

class SocialController extends Controller
{
    public function index()
    {
        $socials = Social::all();
        return view('admin.pages.socials.index', compact('socials'));
    }


    public function create()
    {
        $trainers = Trainer::all();
        return view('admin.pages.socials.create', compact('trainers'));
    }


    public function store(SocialRequest $request)
    {
        Social::create([
            'name' => $request->name,
            'url' => $request->url,
            'icon' => strtolower($request->icon),
            'trainer_id' => $request->trainer_id
        ]);

        return redirect('/admin/socials');
    }


    public function show(Social $social)
    {
        //
    }


    public function edit(Social $social)
    {
        $trainers = Trainer::all();
        return view('admin.pages.socials.edit', compact('social', 'trainers'));
    }


    public function update(SocialRequest $request, Social $social)
    {
        $social->update([
            'name' => $request->name,
            'url' => $request->url,
            'icon' => strtolower($request->icon),
            'trainer_id' => $request->trainer_id
        ]);

        return redirect('/admin/socials');
    }


    public function destroy()
    {
        Social::where(request(['id']))->delete();
    }
}