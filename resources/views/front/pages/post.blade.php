@extends('layouts.front')

@section('content')
    @include('front.partials.post.header')

    <section id="blog" class="parallax-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">

                    @include('front.partials.post.content')
                    @include('front.partials.post.comments')
                    @include('front.partials.post.form')

                </div>
            </div>
        </div>
    </section>
@endsection

@section('homeNav')
    <li><a href="{{ url('/') }}">Home</a></li>
@endsection

@section('moreNav')
    <li><a href="#comments" class="smoothScroll">Comments</a></li>
@endsection

@section('moreCSS')
    <style>
        #blog-header {
            background: url('{{ asset($post->image) }}') 50% 0 repeat-y fixed;
        }
    </style>
@endsection

@section('moreJS')
    <script>
        const BASE_URL = "{{ url('/') }}";
        const TOKEN = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection