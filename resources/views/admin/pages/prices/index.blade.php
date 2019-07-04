@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">euro_symbol</i> Prices<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Showing all prices</small>
@endsection

@section('content')

    @php($i = 1)

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr class="info">
                <th>Title</th>
                <th>Amount</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>

            @foreach($prices as $price)

                <tr>
                    <td>{{ $price->title }}</td>
                    <td>${{ $price->amount }}</td>
                    <td><a href="{{ url('/admin/prices/'.$price->id.'/edit') }}" class="btn btn-info waves-effect btn-xs"><i class="material-icons">edit</i></a></td>
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
                                        <button type="button" class="btn btn-default error" onclick="deletion({{ $price->id }}, '{{ $price->getTable() }}');">
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