@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">group_work</i> Services<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Editing services</small>
@endsection

@section('content')

    <div class="body">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">

                @isset($errors)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning">
                            {{ $error }}
                        </div>
                    @endforeach
                @endisset

                <p class="lead">Edit a service</p>
                <form action="{{ url('/admin/services/'.$service->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name" required value="{{ $service->name }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="price_id" id="price_id">
                            <option value="{{ $service->price->id }}">${{ $service->price->amount }}</option>

                            @foreach($prices as $price)
                                <option value="{{ $price->id }}">${{ $price->amount }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="serviceBtn" id="serviceBtn" class="btn btn-primary waves-effect waves-light">Edit</button>
                        <a href="{{ url('/admin/services') }}" class="btn waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection