@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">fitness_center</i> Trainers<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Editing Trainers</small>
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

                <p class="lead">Edit a trainer</p>
                <form action="{{ url('/admin/trainers/'.$trainer->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name" required value="{{ $trainer->name }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="workout" id="workout" type="text" class="form-control" placeholder="Workout" required value="{{ $trainer->workout }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea name="description" id="description" class="form-control" placeholder="Content" rows="7" required >{{ $trainer->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <img class="img-responsive" width="180" src="{{ asset($trainer->image) }}" />
                    </div>
                    <div class="form-group">
                        <label for="image"><p><i>Image:</i></p></label>
                        <input type="file" name="image" id="image" />
                        (max. 2MB, 474x592)
                        <br/>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="trainerBtn" id="trainerBtn" class="btn btn-primary waves-effect waves-light">Edit</button>
                        <a href="{{ url('/admin/trainers') }}" class="btn waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection