<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    @include('admin.layouts.partials.header')

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

            @include('admin.layouts.partials.navbar')
            @include('admin.layouts.partials.main-sidebar')

            @yield('content')

            @include('admin.layouts.partials.control-sidebar')
            @include('admin.layouts.partials.footer')
        </div>
        @include('admin.layouts.partials.script')
    </body>
</html>   
