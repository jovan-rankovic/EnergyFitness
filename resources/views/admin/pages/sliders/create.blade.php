@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">burst_mode</i> Sliders<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Creating slider images</small>
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

                <p class="lead">Create a slider image</p>
                <form action="{{ url('/admin/sliders') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="position" id="position" type="number" class="form-control" placeholder="Position" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image"><i>Image:</i></label>
                        <input type="file" name="image" id="image" required />
                        (max. 2MB)
                        <br/>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="sliderBtn" id="sliderBtn" class="btn btn-primary waves-effect waves-light">Create</button>
                        <a href="{{ url('/admin/sliders') }}" class="btn waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection