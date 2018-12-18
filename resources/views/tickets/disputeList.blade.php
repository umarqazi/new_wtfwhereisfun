@extends('layouts.master')
@section('title', "My Tickets ")
@section('content')
    <div class="container custom-margin-top">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div id="home_tab">
                            <h3>Dispute Center</h3>
                            @if(count($user_disputes))
                                @foreach($user_disputes as $dispute)
                                    <div class="eventListing dispute_listing_parent @if(!$dispute->seen_by_user)unread @endif">
                                        <div class="m-r-20 fromAvtar">
                                            <div class="img-wrapper">
                                                <div class="img-holder">
                                                    @if(!empty($dispute->user->profile_thumbnail))
                                                        <img class="rounded" src="{{$dispute->user->directory.$dispute->user->profile_thumbnail}}" alt="">
                                                    @else
                                                        <img src="{{asset('img/default-148.png')}}">
                                                    @endif
                                                </div>
                                                <p>{{$dispute->user->first_name}}</p>
                                            </div>
                                            <div class="info">
                                                <div class="leftSide">
                                                    <div class="event-title">
                                                        <a href="http://wtf.localhost/dispute/show/1">{{$dispute->subject}}</a>
                                                    </div>
                                                    <p>{!! $dispute->message !!}</p>
                                                </div>

                                                <ul class="actions-btns header-dropdown m-r--5">
                                                    <li class="action-list"><a href="{{url('/disputes/'.encrypt_id($dispute->id))}}"><button class="btn">View</button></a></li>
                                                    @if($dispute->is_closed)
                                                        <li class="action-list"><button class="btn">Closed</button></li><br>
                                                    @endif
                                                    <div class="date"><strong>Last Updated : </strong>{{monthDateYearFromat($dispute->updated_at)}}</div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div>
                                    <p><strong>No Disputes Found</strong></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection