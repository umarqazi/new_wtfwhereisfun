@extends('layouts.event-dashboard')
@section('title', "Dashboard :: Wait List")
@section('content')
    <div class="page_wrapper event-dashboard ">
        @if(strpos(url()->current(),'admin') == false)
            @include('events.partials.event-dashboard-sidebar')
        @endif
        <section class="content home">
            @include('events.partials.event-dashboard-top-details')
            <div>
                <h1>Wait List</h1>
            </div>
        </section>
    </div>
@endsection