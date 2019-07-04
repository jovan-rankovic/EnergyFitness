@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">share</i> Social links<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Showing all social links</small>
@endsection

@section('content')

    @php($i = 1)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="info">
                <th>Name</th>
                <th>Icon/URL</th>
                <th>Trainer</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach($socials as $social)

                <tr>
                    <td>{{ $social->name }}</td>
                    <td><a href="{{ $social->url }}" class="fa fa-{{ $social->icon }}"></a></td>

                    @if($social->trainer['image'])
                        <td><img class="img-responsive" width="140" src="{{ asset($social->trainer['image']) }}"/></td>
                    @else
                        <td>No trainer associated</td>
                    @endif

                    <td><a href="{{ url('/admin/socials/'.$social->id.'/edit') }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
                    <td>
                        <a class="btn btn-danger waves-effect btn-xs" href="#" data-toggle="modal" data-target="#delete-modal{{ $i }}">
                            <i class="material-icons">delete_forever</i>
                        </a>
                        <div class="modal fade" id="delete-modal{{ $i++ }}" role="dialog">
                            <div class="modal-dialog modal-sm text-center">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal">
                                            &times;
                                        </button>
                                        <h4>Are you sure?</h4>
                                        <button type="button" class="btn btn-default error" onclick="deletion({{ $social->id }}, '{{ $social->getTable() }}');">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>

@endsection