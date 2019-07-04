<!DOCTYPE html>
<html lang="en">
    @include('admin.partials.common.head')
    <body class="theme-light-blue">
        @include('admin.partials.common.loader')
        @include('admin.partials.common.nav')
        @include('admin.partials.common.sidebar')

        <section class="content" id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    @yield('header')
                                </h2>
                            </div>

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </section>

        @include('admin.partials.common.scripts')
    </body>
</html>