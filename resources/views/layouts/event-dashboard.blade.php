<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('partials.head-css-incluldes')
<body>
<div class="page-wrapper">
    <div class="main-page @if(!url()->current() == url('/')) main-top-padding @endif">
        @include('partials.header')
        @yield('content')
    </div>
</div>
@include('partials.event-dashboard-scripts-includes')
@include('partials.scripts-includes')
</body>
</html>