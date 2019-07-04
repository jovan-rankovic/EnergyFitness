@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">link</i> Menu links<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Editing menu links</small>
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

                <p class="lead">Edit a menu link</p>
                <form action="{{ url('/admin/menus/'.$menu->id) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="position" id="position" type="number" class="form-control" placeholder="Position" required value="{{ $menu->position }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name" required value="{{ $menu->name }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="route" id="route" type="text" class="form-control" placeholder="Route" required value="{{ $menu->route }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="menuBtn" id="menuBtn" class="btn btn-primary waves-effect waves-light">Edit</button>
                        <a href="{{ url('/admin/menus') }}" class="btn waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection