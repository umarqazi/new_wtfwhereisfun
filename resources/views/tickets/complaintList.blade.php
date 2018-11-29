@extends('layouts.master')
@section('title', "My Tickets :: Where's the fun")
@section('content')
    <div class="container custom-margin-top">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <div id="home_tab">
                            @foreach($vendorDisputes as $dispute)
                                <div class="eventListing dispute_listing_parent @if(!$dispute->seen_by_vendor)unread @endif">
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
                                            <ul class="actions-btns header-dropdown m-r--5">
                                               @if(!$dispute->is_closed)
                                                <form method="POST" action="{{ url('/close-dispute') }}" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <li class="action-list"><a href="{{url('/disputes/'.encrypt_id($dispute->id))}}"><button type="button" class="btn">View</button></a></li>
                                                    <li class="action-list">
                                                        <input type="hidden" name="is_closed" value="1"/>
                                                        <input type="hidden" name="dispute_id" value="{{$dispute->id}}"/>
                                                        <button class="btn" type="submit">Close Dispute </button>
                                                    </li>
                                                </form>
                                               @else
                                                    <li class="action-list"><a href="{{url('/disputes/'.encrypt_id($dispute->id))}}"><button class="btn">View</button></a></li>
                                                    <li class="action-list"><button class="btn">Closed</button></li>
                                               @endif
                                            </ul>
                                            <div class="leftSide">
                                                <div class="event-title">
                                                    <a href="http://wtf.localhost/dispute/show/1">{{$dispute->subject}}</a>
                                                </div>
                                                <p>{!! $dispute->message !!}</p>
                                            </div>
                                            <div class="date pull-right">{{$dispute->created_at}}</div>
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