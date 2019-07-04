@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">border_color</i> Posts<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Editing posts</small>
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

                <p class="lead">Edit a post</p>
                <form action="{{ url('/admin/posts/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="title" id="title" type="text" class="form-control" placeholder="Title" required value="{{ $post->title }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea name="contentP" id="contentP" class="form-control" placeholder="Content" rows="15" required >{{ $post->content }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input name="user_id" id="user_id" type="hidden" class="form-control" value="{{ session('user')->id }}" />
                    </div>
                    <div class="form-group">
                        <img class="img-responsive" width="400" src="{{ asset($post->image) }}" />
                    </div>
                    <div class="form-group">
                        <label for="image"><i>Image:</i></label>
                        <input type="file" name="image" id="image" required />
                        (max. 2MB)
                        <br/>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="postBtn" id="postBtn" class="btn btn-primary waves-effect waves-light">Edit</button>
                        <a href="{{ url('/admin/posts') }}" class="btn waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection