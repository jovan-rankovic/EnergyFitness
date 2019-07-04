<?php

namespace App\Http\Controllers\Resource;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Price;
use App\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest('id')->paginate(5);
        return view('admin.pages.services.index', compact('services'));
    }


    public function create()
    {
        $prices = Price::all();
        return view('admin.pages.services.create', compact('prices'));
    }


    public function store(ServiceRequest $request)
    {
        Service::create([
            'name' => $request->name,
            'price_id' => $request->price_id
        ]);

        return redirect('/admin/services');
    }


    public function show(Service $service)
    {
        //
    }


    public function edit(Service $service)
    {
        $prices = Price::all();
        return view('admin.pages.services.edit', compact('service', 'prices'));
    }


    public function update(ServiceRequest $request, Service $service)
    {
        $service->update([
           'name' => $request->name,
           'price_id' => $request->price_id
        ]);

        return redirect('/admin/services');
    }


    public function destroy()
    {
        Service::where(request(['id']))->delete();
    }
}
