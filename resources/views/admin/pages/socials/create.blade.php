@extends('layouts.admin')

@section('header')
    <i class="material-icons icon_left">share</i> Social links<a href="{{ url('/admin') }}"><i class="material-icons pull-right">keyboard_return</i><i class="pull-right go_back">Back</i></a>
    <small>Creating social links</small>
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

                <p class="lead">Create a social link</p>
                <form action="{{ url('/admin/socials') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="form-line">
                            <input name="name" id="name" type="text" class="form-control" placeholder="Name" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="url" id="url" type="url" class="form-control" placeholder="URL" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input name="icon" id="icon" type="text" class="form-control" placeholder="Font Awesome icon" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <select name="trainer_id" id="trainer_id">
                            <option value="">Select a trainer...</option>

                            @foreach($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="socialBtn" id="socialBtn" class="btn btn-primary waves-effect waves-light">Create</button>
                        <a href="{{ url('/admin/socials') }}" class="btn waves-effect">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection