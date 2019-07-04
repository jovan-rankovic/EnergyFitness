<section id="welcome" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="col-md-offset-1 col-md-10 col-sm-12">

                @isset($errors)
                    @foreach($errors->all() as $error)
                        <div class="alert alert-warning">
                            {{ $error }}
                        </div>
                    @endforeach
                @endisset

                @if(session('message'))
                    <h3 class="wow bounceIn" data-wow-delay="0.9s">{{ session('message') }}</h3>
                @else
                    <h3 class="wow bounceIn" data-wow-delay="0.9s">Welcome to the</h3>
                @endif

                <h1 class="wow fadeInUp" data-wow-delay="1.6s">Energy<br>Fitness Club</h1>
                <a href="#about" class="wow fadeInUp smoothScroll btn btn-default" data-wow-delay="2s">LEARN MORE</a>
            </div>

        </div>
    </div>
</section>