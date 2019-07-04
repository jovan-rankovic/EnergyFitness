<div class="navbar navbar-default navbar-fixed-top sticky-navigation" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="{{ url('/') }}" class="navbar-brand">Energy</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right main-navigation">
                @yield('homeNav')
                @yield('moreNav')
                @if(session()->has('user'))

                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">{{ session('user')->first_name }} <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" data-toggle="modal" data-target="#profile">Profile</a></li>

                        @if(session('user')->role->name == 'admin')
                            <li><a href="{{ url('/admin') }}">Admin</a></li>
                            <li><a href="{{ asset('files/php2_doc_145_14.pdf') }}">Documentation</a></li>
                        @endif

                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>

                @else
                    <li><a href="#" data-toggle="modal" data-target=".log-sign">Log in/Sign up</a></li>
                @endif

            </ul>
        </div>

    </div>
</div>

@if(!session()->has('user'))
<!-- Log in/Sign up Modal -->
<div class="modal fade bs-modal-sm log-sign" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="bs-example bs-example-tabs">
                <ul id="myTab" class="nav nav-tabs">
                    <li id="tab1" class=" active tab-style login-shadow "><a href="#signin" data-toggle="tab">Log In</a></li>
                    <li id="tab2" class=" tab-style "><a href="#signup" data-toggle="tab">Sign Up</a></li>

                </ul>
            </div>
            <div class="modal-body">
                <div id="myTabContent" class="tab-content">

                    <!-- Login Form -->
                    <div class="tab-pane fade active in" id="signin">
                        <form class="form-horizontal" method="POST" action="{{ url('/login') }}">
                            <fieldset>
                                @csrf

                                <div class="group">
                                    <input class="input" type="text" id="logEmail" name="logEmail" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="logEmail">E-mail</label>
                                </div>

                                <div class="group">
                                    <input class="input" type="password" id="logPasswd" name="logPasswd" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="logPass">Password</label>
                                </div>
                                <em></em>

                                <div class="control-group">
                                    <label class="control-label" for="signin"></label>
                                    <div class="controls">
                                        <button id="logBtn" name="logBtn" class="btn btn-primary btn-block">Log In</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <!-- Registration Form -->
                    <div class="tab-pane fade" id="signup">
                        <form class="form-horizontal" method="POST" action="{{ url('/register') }}">
                            <fieldset>
                                @csrf
                                <div class="group">
                                    <input class="input" type="text" id="regFN" name="regFN" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="regFN">First Name</label></div>

                                <div class="group">
                                    <input class="input" type="text" id="regLN" name="regLN" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="regLN">Last Name</label></div>

                                <div class="group">
                                    <input class="input" type="text" id="email" name="email" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="regEmail">Email</label></div>

                                <div class="group">
                                    <input class="input" type="password" id="regPasswd" name="regPasswd" required /><span class="highlight"></span><span class="bar"></span>
                                    <label class="label" for="regPasswd">Password</label></div>
                                <em></em>

                                <div class="control-group">
                                    <label class="control-label" for="signup"></label>
                                    <div class="controls">
                                        <button id="regBtn" name="regBtn" class="btn btn-primary btn-block">Sign Up</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Log in/Sign up Modal END -->
@endif

@if(session()->has('user'))
<!-- Profile modal -->
<div id="profile" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Profile</h4>
            </div>
            <div class="modal-body">

                @yield('profileImage')

                <h4 class="text-center">{{ session('user')->first_name }} {{ session('user')->last_name }}</h4>
                <hr/>

                @php
                    $joined = new DateTime(session('user')->created_at);
                    $now = new DateTime();

                    $since = $now->diff($joined);
                @endphp

                <p class="text-center">Member for: <i>{{ ($since->y > 0)?$since->y.' years':'' }} {{ ($since->m > 0 && $since->m < 12)?$since->m.' months':'' }} {{ ($since->m < 1)?(($since->d == 0)?$since->i.' minutes':$since->d.' days'):'' }}</i></p>
                <p class="text-center">Comments: <i>{{ count(session('user')->comments) }}</i></p>

                @if(session('user')->role->name == 'admin')
                    <p class="text-center">Posts: <i>{{ count(session('user')->posts) }}</i></p>
                @endif

            </div>
        </div>
    </div>
</div>
<!-- Profile modal END -->
@endif