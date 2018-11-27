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
                                                <img class="rounded" src="{{asset('images/form-dashboard-profile.jpg')}}" alt="">
                                            </div>
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
                                            <div class="date pull-right">2018-11-22 06:30:03</div>
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