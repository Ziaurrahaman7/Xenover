@include('admin.layouts.header')

        <div id="layoutSidenav">
            @include('admin.layouts.sidebar')   
            <div id="layoutSidenav_content">
             @yield('content')
               
@include('admin.layouts.footer')