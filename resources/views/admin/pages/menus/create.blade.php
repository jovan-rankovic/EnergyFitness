@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">link</i> Menu links<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Creating menu links</small>
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

                <p class="lead">Create a menu link</p>
                <form action="{{ url('/admin/menus') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="position" id="position" type="number" class="form-control" placeholder="Position" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="route" id="route" type="text" class="form-control" placeholder="Route" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="menuBtn" id="menuBtn" class="btn btn-primary waves-effect waves-light">Create</button>
                        <a href="{{ url('/admin/menus') }}" class="btn waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection