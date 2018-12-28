@extends('layouts.event-dashboard')
@section('title', "Dashboard :: Guest List")
@section('content')
    <div class="page_wrapper event-dashboard ">
        @if(strpos(url()->current(),'admin') == false)
            @include('events.partials.event-dashboard-sidebar')
        @endif
        <section class="content home">
            @include('events.partials.event-dashboard-top-details')
            <div>
                <div class="row">
                    <div class="col-md-12">
                        <h1>Guest List</h1>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-sm rounded-border collapsed btn-collapse-form" data-toggle="collapse" data-target="#show_form"><span>Expand Add Guest Form <i class="fa fa-caret-down"></i></span><b>Collapse Add Guest Form <i class="fa fa-caret-up"></i></b></button>
                    </div>
                    <div id="show_form" class="collapse">
                        <div class="col-md-12">
                            @php
                                $url = explode('/', url()->current());
                                array_push($url, 'add-guest');
                                $action_url = implode('/', $url);
                            @endphp
                            <form action="{{$action_url}}" method="POST">
                                <input type="hidden" name="_method" value="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="guest_list_id" value="{{$url[7]}}">
                                <input type="hidden" name="guest_list_id" value="{{$url[7]}}">
                                <div class="col-md-3">
                                    <input class="guest-input" type="text" name="name" id="name" placeholder="Enter Guest Name">
                                    @if ($errors->has('name'))
                                        <div class="col-md-12 pl-20">
                                            <p class="bold red text-center">{{ $errors->default->first('name') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-2">
                                    <input class="guest-input" type="number" min="1" name="quantity" id="quantity" placeholder="Enter Quantity">
                                    @if ($errors->has('quantity'))
                                        <div class="col-md-12 pl-20">
                                            <p class="bold red text-center">{{ $errors->default->first('quantity') }}</p>
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <input class="guest-input" type="text" name="guest_affiliation" id="guest_affiliation" placeholder="Enter Guest of / Enter Affiliation">
                                </div>
                                <div class="col-md-3">
                                    <input class="guest-input" type="email" name="guest_email" id="guest_email" placeholder="Enter Guest Email">
                                </div>
                                <div class="col-md-3 vip-drop-drown">
                                    <select name="ticket_id">
                                        @foreach($tickets as $ticket)
                                            <option value="{{$ticket->id}}">{{$ticket->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" class="btn btn-sm rounded-border" value="Add Guest">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="table-responsive tickets-table">
                    <table class="table">
                        <tr>
                            <td class="text-center">
                                <strong>S.No</strong>
                            </td>
                            <td>
                                <strong>Name</strong>
                            </td>
                            <td class="text-center">
                                <strong>Quantity</strong>
                            </td>
                            <td class="text-center">
                                <strong>Checked In</strong>
                            </td>
                        </tr>
                        @if(count($guests) > 0)
                            @foreach($guests as $key => $guest)
                            <tr class="ticket-details">
                                <td class="text-center"><span>{{$key + 1 }}</span></td>
                                <td><span>{{$guest->name}}</span></td>
                                <td class="text-center"><span>{{$guest->quantity}}</span></td>
                                <td class="text-center">0</td>
                            </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="4">No Guests!</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection