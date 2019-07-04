<footer>
    <div class="container">
        <div class="row">

            <div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
                <br/>

                <div>
                    <p>Address: 198 West 21th Street, Suite 721 New York NY 10016</p>
                </div>

                <div>
                    <p>Phone: + 1235 2355 98</p>
                </div>

                <div>
                    <p>Email: energyfitness@gmail.com</p>
                </div>

            </div>

            <div class="wow fadeInUp col-md-5 col-sm-4"  data-wow-delay="0.9s">
                <h2>Sessions</h2>
                <div>
                    <h5>Morning</h5>
                    <h4>6:00 AM - 11:00 PM</h4>
                </div>
                <div>
                    <h5>Evening</h5>
                    <h4>4:00 PM - 9:00 PM</h4>
                </div>
            </div>

            <div class="wow fadeInUp col-md-3 col-sm-4" data-wow-delay="1s">
                <h2>Follow us</h2>
                <ul class="social-icon">

                    @foreach($socials as $social)
                        <li><a href="{{ $social->url }}" class="fa fa-{{ $social->icon }} wow fadeInUp" data-wow-delay="1s"></a></li>
                    @endforeach

                </ul>
            </div>

            <div class="clearfix"></div>

            <div class="col-md-12 col-sm-12">
                <p class="copyright-text">&copy; 2019 <a href="#" data-toggle="modal" data-target="#author-modal">Jovan Ranković</a></p>
            </div>

            <!-- Author modal -->
            <div id="author-modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Author</h4>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('images/user/author.jpg') }}" class="img-responsive img-circle center-block"><br/>
                            <p class="text-center">Student: Jovan Ranković</p>
                            <p class="text-center">Index number: 145/14</p>
                            <p class="text-center">College: <a href="https://en.ict.edu.rs/"><strong>ICT college of vocational studies</strong></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Author modal END -->

        </div>
    </div>
</footer>