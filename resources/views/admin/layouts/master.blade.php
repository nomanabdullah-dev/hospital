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

            <div class="main-content">
                <div class="page-content">
                    <div class="container">
                        <div class="container-fluid">
    
                            <div class="mt-1">
                                @include('components.error_message')
                                @include('components.success_message')
                                @yield('content')
                            </div>
        
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.layouts.partials.control-sidebar')
            @include('admin.layouts.partials.footer')
        </div>
        @include('admin.layouts.partials.script')
    </body>
</html>   
