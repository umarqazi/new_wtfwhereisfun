@extends('layouts.event-dashboard')
@section('title', "Dashboard :: Guest Lists")
@section('content')
    <div class="page_wrapper event-dashboard ">
        @if(strpos(url()->current(),'admin') == false)
            @include('events.partials.event-dashboard-sidebar')
        @endif
        <section class="content home">
            @include('events.partials.event-dashboard-top-details')
            <div>
                <div class="row">
                    <div class="col-md-4">
                        <h1>Guest List</h1>
                    </div>
                    <div class="col-md-8">
                        @php
                            $url = explode('/', url()->current());
                            $current_url = url()->current();
                            array_pop($url);
                            array_push($url, 'add-guest-list');
                            $url = implode('/', $url);
                        @endphp
                        <form action="{{$url}}" method="POST">
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="col-md-9">
                                <input class="guest-list-input" type="text" name="name" id="name" placeholder="Enter Guest List Name">
                                @if ($errors->has('name'))
                                    <div class="col-md-12 pl-20">
                                        <p class="bold red text-center">{{ $errors->default->first('name') }}</p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-3">
                                <input type="submit" class="btn btn-sm rounded-border" value="Create Guest List">
                            </div>
                        </form>
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
                                <strong>Checked In</strong>
                            </td>
                        </tr>
                        @if(count($guestListing) > 0)
                            @foreach($guestListing as $key => $guestItem)
                            <tr class="ticket-details">
                                <td class="text-center"><span>{{$key + 1 }}</span></td>
                                <td><span>{{$guestItem->name}}</span></td>
                                <td class="text-center"><a href="{{$current_url.'/'.$guestItem->encrypted_id}}"><i class="fa fa-eye"></i></a></td>
                            </tr>
                            @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="3">No Guest List</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection