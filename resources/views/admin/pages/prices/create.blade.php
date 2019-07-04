@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">euro_symbol</i> Prices<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Creating prices</small>
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

                <p class="lead">Create a price</p>
                <form action="{{ url('/admin/prices') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="title" id="title" type="text" class="form-control" placeholder="Title" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="amount" id="amount" type="number" class="form-control" placeholder="Amount" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="priceBtn" id="priceBtn" class="btn btn-primary waves-effect waves-light">Create</button>
                        <a href="{{ url('/admin/prices') }}" class="btn waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection