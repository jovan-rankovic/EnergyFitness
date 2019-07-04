@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">border_color</i> Posts<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Showing all posts</small>
@endsection

@section('content')

    @php($i = 1)

    <br/>

    @foreach($posts as $post)

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ $post->title }}
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="{{ url('/admin/posts/'.$post->id.'/edit') }}">Edit</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#delete-modal{{ $i }}">Delete</a></li>
                                </ul>
                                <div class="modal fade" id="delete-modal{{ $i++ }}" role="dialog">
                                    <div class="modal-dialog modal-sm text-center">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal">
                                                    &times;
                                                </button>
                                                <h4>Are you sure?</h4>
                                                <button type="button" class="btn btn-default error" onclick="deletion({{ $post->id }}, '{{ $post->getTable() }}');">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <ul class="nav nav-tabs tab-nav-right" role="tablist">
                            <li role="presentation" class="active"><a href="#{{ $post->id }}c" data-toggle="tab">Content</a></li>
                            <li role="presentation"><a href="#{{ $post->id }}s" data-toggle="tab">Image</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="{{ $post->id }}c">
                                <p>
                                    {{ $post->content }}
                                </p>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="{{ $post->id }}s">
                                <img class="img img-responsive" width="400" src="{{ asset($post->image) }}" alt="post_image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endforeach

    <div class="text-center">{{ $posts->links() }}</div>

@endsection