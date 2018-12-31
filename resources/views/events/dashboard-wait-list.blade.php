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
                @if(count($waitListing))
                    <div class="table-responsive tickets-table">
                        <table class="table">
                            <tr>
                                <td>
                                    <strong>S.No</strong>
                                </td>
                                <td>
                                    <strong>Name</strong>
                                </td>
                                <td>
                                    <strong>Email</strong>
                                </td>
                                <td>
                                    <strong>Phone</strong>
                                </td>
                            </tr>

                            @foreach($waitListing as $key => $waitItem)
                                <tr class="ticket-details">
                                    <td><span>{{$key + 1 }}</span></td>
                                    <td><span>{{$waitItem->name}}</span></td>
                                    <td><span>{{$waitItem->email}}</span></td>
                                    <td>
                                        <span>
                                            @if($waitItem->phn != '')
                                            {{$waitItem->phn}}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    <h4>No users in waiting list.</h4>
                @endif
            </div>
        </section>
    </div>
@endsection