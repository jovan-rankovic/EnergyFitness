<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainerRequest;
use App\Trainer;
use Illuminate\Support\Facades\File;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::all();
        return view('admin.pages.trainers.index', compact('trainers'));
    }


    public function create()
    {
        return view('admin.pages.trainers.create');
    }


    public function store(TrainerRequest $request)
    {
        $image = $request->image;

        if($image->isValid())
        {
            $imgFolder = 'images/trainer/';
            $imgName = time().rand().$image->getClientOriginalName();
            $image->move(public_path().'/'.$imgFolder, $imgName);

            Trainer::create([
                'name' => $request->name,
                'workout' => $request->workout,
                'description' => $request->description,
                'image' => $imgFolder.$imgName
            ]);
        }

        return redirect('/admin/trainers');
    }


    public function show(Trainer $trainer)
    {
        //
    }


    public function edit(Trainer $trainer)
    {
        return view('admin.pages.trainers.edit', compact('trainer'));
    }


    public function update(TrainerRequest $request, Trainer $trainer)
    {
        $image = $request->image;

        if($image->isValid())
        {
            if(File::exists(public_path().'/'.$trainer->image))
            {
                File::delete(public_path().'/'.$trainer->image);
            }

            $imgFolder = 'images/trainer/';
            $imgName = time().rand().$image->getClientOriginalName();
            $image->move(public_path().'/'.$imgFolder, $imgName);

            $trainer->update([
                'name' => $request->name,
                'workout' => $request->workout,
                'description' => $request->description,
                'image' => $imgFolder.$imgName
            ]);
        }

        return redirect('/admin/trainers');
    }


    public function destroy(Trainer $trainer)
    {
        if(File::exists(public_path().'/'.$trainer->image))
        {
            File::delete(public_path().'/'.$trainer->image);
        }

        Trainer::where(request(['id']))->delete();
    }
}