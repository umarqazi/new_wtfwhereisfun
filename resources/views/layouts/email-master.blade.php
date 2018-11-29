<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('emails.partials.header')
    @yield('content')
@include('emails.partials.footer')
</html>