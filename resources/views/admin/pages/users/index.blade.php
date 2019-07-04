@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">person</i> Users<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Showing all users</small>
@endsection

@section('content')

    @php($i = 1)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="info">
                <th>First name</th>
                <th>Last name</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Join date</th>
                <th>Active</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)

            <tr>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->created_at->format('d.m.Y.') }}</td>
                <td>@if($user->email_verified_at != NULL)Yes @else No @endif</td>
                <td><img class="img-responsive" width="52" height="52" src="{{ asset($user->image) }}"/></td>
                <td><a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
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
                                    <button type="button" class="btn btn-default error" onclick="deletion({{ $user->id }}, '{{ $user->getTable() }}');">
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