<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('partials.head-css-incluldes')
<body>
    <div class="page-wrapper">
        <div class="main-page @if(!url()->current() == url('/')) main-top-padding @endif">
            @include('partials.header')
            @yield('content')
            @include('partials.footer')
        </div>
    </div>
    @include('partials.signup-signin')
    @include('partials.scripts-includes')
</body>
</html>