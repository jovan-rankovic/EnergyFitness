<!DOCTYPE html>
<html lang="en">
    @include('front.partials.common.head')
    <body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">
        @include('front.partials.common.preloader')
        @include("front.partials.common.nav")
        @yield('content')
        @include("front.partials.common.footer")
        @include("front.partials.common.scripts")
    </body>
</html>