<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('partials.head-css-incluldes')
<body>
    <div class="page-wrapper">
        <div class="main-page main-top-padding">
            @include('partials.header')
            @yield('content')
            @include('partials.footer')
        </div>
    </div>
    @include('partials.scripts-includes')
</body>
</html>