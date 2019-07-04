<section>
    <aside id="leftsidebar" class="sidebar">

        <!-- User info -->
        <div class="user-info">
            <div class="image">
                <img src="{{ asset(session('user')->image) }}" width="59" height="59" alt="Admin" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ session('user')->first_name }} {{ session('user')->last_name }}</div>
                <div class="email">{{ session('user')->email }}</div>
            </div>
        </div>
        <!-- User info END -->

        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">NAVIGATION</li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">person</i>
                        <span>Users</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/users') }}">Show all users</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/users/create') }}">Create a user</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">border_color</i>
                        <span>Posts</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/posts') }}">Show all posts</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/posts/create') }}">Create a post</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">burst_mode</i>
                        <span>Slider</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/sliders') }}">Show all slider images</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/sliders/create') }}">Create a slider image</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">link</i>
                        <span>Menu links</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/menus') }}">Show all menu links</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/menus/create') }}">Create a menu link</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">fitness_center</i>
                        <span>Trainers</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/trainers') }}">Show all trainers</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/trainers/create') }}">Create a trainer</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">euro_symbol</i>
                        <span>Prices</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/prices') }}">Show all prices</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/prices/create') }}">Create a price</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">group_work</i>
                        <span>Services</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/services') }}">Show all services</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/services/create') }}">Create a service</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">share</i>
                        <span>Social links</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{ url('/admin/socials/') }}">Show all links</a>
                        </li>
                        <li>
                            <a href="{{ url('/admin/socials/create') }}">Create a link</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Menu END -->

        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 Jovan Ranković
            </div>
            <div class="version">
                <a href="https://en.ict.edu.rs">ICT college of vocational studies</a>
            </div>
        </div>
        <!-- Footer END -->

    </aside>
</section>