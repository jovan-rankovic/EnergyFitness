<section id="trainers" class="parallax-section">
    <div class="container">
        <div class="row">

            <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.5s">
                <h2>Our Trainers</h2>
                <p>We present you the most professional and dedicated trainers in NY</p>
            </div>

            @foreach($trainers as $trainer)

                <div class="wow fadeInUp col-md-4 col-sm-6" data-wow-delay="0.5s">
                    <div class="trainer-thumb">
                        <img src="{{ $trainer->image }}" class="img-responsive" alt="Trainer">
                        <div class="trainer-overlay">
                            <div class="trainer-des">
                                <h2>{{ $trainer->name }}</h2>
                                <h3>{{ $trainer->workout }}</h3>
                                <ul class="social-icon">

                                    @foreach($trainer->socials as $tSocial)

                                        <li><a href="{{ $tSocial->url }}" class="fa fa-{{ $tSocial->icon }} wow fadeInUp" data-wow-delay="1s"></a></li>

                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <p>{{ $trainer->description }}</p>
                </div>

            @endforeach

        </div>
    </div>
</section>