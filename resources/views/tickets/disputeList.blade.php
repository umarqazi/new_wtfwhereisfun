@extends('layouts.master')
@section('title', "My Tickets :: Where's the fun")
@section('content')
    <div class="container custom-margin-top">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div id="home_tab">
                            @foreach($user_disputes as $dispute)
                                <div class="eventListing dispute_listing_parent @if(!$dispute->seen_by_user)unread @endif">
                                    <div class="m-r-20 fromAvtar">
                                        <div class="img-wrapper">
                                            <div class="img-holder">
                                                <img class="rounded" src="{{asset('images/form-dashboard-profile.jpg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="info">
                                            <ul class="actions-btns header-dropdown m-r--5">
                                                {{--<li class="action-list"><a href="http://wtf.localhost/dispute/show/1"><button class="btn">View</button></a></li>--}}
                                                <li class="action-list"><a href="{{url('/disputes/'.encrypt_id($dispute->id))}}"><button class="btn">View</button></a></li>
                                                @if($dispute->is_closed)
                                                    <li class="action-list"><button class="btn">Closed</button></li>
                                                @endif
                                            </ul>
                                            <div class="leftSide">
                                                <div class="event-title">
                                                    <a href="http://wtf.localhost/dispute/show/1">{{$dispute->subject}}</a>
                                                </div>
                                                <p>{!! $dispute->message !!}</p>
                                            </div>
                                            <div class="date"><strong> 2018-11-22 06:30:03 </strong></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection