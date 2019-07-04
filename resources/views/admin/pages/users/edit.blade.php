@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">person</i> Users<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Editing users</small>
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

                <p class="lead">Edit a user</p>
                <form action="{{ url('/admin/users/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="first_name" id="first_name" type="text" class="form-control" placeholder="First name" value="{{ $user->first_name }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="last_name" id="last_name" type="text" class="form-control" placeholder="Last name" value="{{ $user->last_name }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="email" id="email" type="email" class="form-control" placeholder="E-mail" value="{{ $user->email }}" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <p><i>Role:</i></p>
                        <input id="role_id1" name="role_id" type="radio" value="1" @if($user->role_id == 1) checked @endif />
                        <label for="role_id1"> Admin </label>
                        <input id="role_id2" name="role_id" type="radio" value="2" @if($user->role_id == 2) checked @endif />
                        <label for="role_id2"> User </label>
                    </div>
                    <div class="form-group">
                        <p><i>Active:</i></p>
                        <input id="active1" name="email_verified_at" type="radio" value="{{ date("Y-m-d H:i:s", time()) }}" @if($user->email_verified_at) checked @endif />
                        <label for="active1"> Yes </label>
                    </div>
                    <div class="form-group">
                        <img class="img-responsive img-circle" width="65" height="65" src="{{ asset($user->image) }}" />
                    </div>
                    <div class="form-group">
                        <label for="image"><p><i>Image:</i></p></label>
                        <input type="file" name="image" id="image" />
                        (max. 2MB, 1:1 ratio)
                        <br/>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="userBtn" id="userBtn" class="btn btn-primary waves-effect waves-light">Edit</button>
                        <a href="{{ url('/admin/users') }}" class="btn waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

@endsection