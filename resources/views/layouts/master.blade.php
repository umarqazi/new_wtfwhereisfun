<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('partials.head-css-incluldes')
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5T5VGHN"
                      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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