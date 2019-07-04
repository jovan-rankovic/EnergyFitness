<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Slider;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('position')->get();
        return view ('admin.pages.sliders.index', compact('sliders'));
    }


    public function create()
    {
        return view('admin.pages.sliders.create');
    }


    public function store(SliderRequest $request)
    {
        $image = $request->image;

        if($image->isValid())
        {
            $imgFolder = 'images/slider/';
            $imgName = time().rand().$image->getClientOriginalName();
            $image->move(public_path().'/'.$imgFolder, $imgName);

            Slider::create([
                'position' => $request->position,
                'image' => $imgFolder.$imgName
            ]);
        }

        return redirect('/admin/sliders');
    }


    public function show(Slider $slider)
    {
        //
    }


    public function edit(Slider $slider)
    {
        return view('admin.pages.sliders.edit', compact('slider'));
    }


    public function update(SliderRequest $request, Slider $slider)
    {
        $image = $request->image;

        if($image->isValid())
        {
            if(File::exists(public_path().'/'.$slider->image))
            {
                File::delete(public_path().'/'.$slider->image);
            }

            $imgFolder = 'images/slider/';
            $imgName = time().rand().$image->getClientOriginalName();
            $image->move(public_path().'/'.$imgFolder, $imgName);

            $slider->update([
                'position' => $request->position,
                'image' => $imgFolder.$imgName
            ]);
        }

        return redirect('/admin/sliders');
    }


    public function destroy(Slider $slider)
    {
        if(File::exists(public_path().'/'.$slider->image))
        {
            File::delete(public_path().'/'.$slider->image);
        }

        Slider::where(request(['id']))->delete();
    }
}