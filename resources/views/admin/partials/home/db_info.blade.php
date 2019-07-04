@section('header')
    Welcome, {{ session()->get('user')->first_name }} {{ session()->get('user')->last_name }}!
@endsection

<div class="body">
    <div class="row clearfix">

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/users') }}">
                <div class="link_show_all info-box bg-light-blue hover-expand-effect" data-link="user_show">
                    <div class="icon">
                        <i class="material-icons">person</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ $users->count() }} USERS</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="link_show_all info-box bg-light-blue hover-expand-effect" data-link="user_show">
                <div class="icon">
                    <i class="material-icons">group</i>
                </div>
                <div class="content">
                    <div class="text">{{ $roles->count() }} ROLES</div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/posts') }}">
                <div class="link_show_all info-box bg-light-blue hover-expand-effect" data-link="post_show">
                    <div class="icon">
                        <i class="material-icons">border_color</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ $posts->count() }} POSTS</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-blue hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">mode_comment</i>
                </div>
                <div class="content">
                    <div class="text">{{ $comments->count() }} COMMENTS</div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/sliders') }}">
                <div class="link_show_all info-box bg-light-blue hover-expand-effect" data-link="slider_show">
                    <div class="icon">
                        <i class="material-icons">burst_mode</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ $sliders->count() }} SLIDERS</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/menus') }}">
                <div class="link_show_all info-box bg-light-blue hover-expand-effect" data-link="link_show">
                    <div class="icon">
                        <i class="material-icons">link</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ $menus->count() }} MENU LINKS</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/trainers') }}">
                <div class="link_show_all info-box bg-light-blue hover-expand-effect" data-link="poll_show">
                    <div class="icon">
                        <i class="material-icons">fitness_center</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ $trainers->count() }} TRAINERS</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/prices') }}">
                <div class="link_show_all info-box bg-light-blue hover-expand-effect" data-link="gallery_show">
                    <div class="icon">
                        <i class="material-icons">euro_symbol</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ $prices->count() }} PRICES</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/services') }}">
                <div class="link_show_all info-box bg-light-blue hover-expand-effect" data-link="gallery_show">
                    <div class="icon">
                        <i class="material-icons">group_work</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ $services->count() }} SERVICES</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/admin/socials') }}">
                <div class="info-box bg-light-blue hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">share</i>
                    </div>
                    <div class="content">
                        <div class="text">{{ $socials->count() }} SOCIAL LINKS</div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <a href="{{ url('/top_secret_admin_path') }}">
                <div class="info-box bg-deep-purple hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">brightness_7</i>
                    </div>
                    <div class="content">
                        <div class="text">TELESCOPE</div>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>