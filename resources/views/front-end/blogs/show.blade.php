@extends('layouts.master')
@section('title', "Where's the fun :: Blog Page")
<style type="text/css">
    .body{
        margin-bottom: 40px;
    }
    .img-blog{
        max-height: 300px;
        width: auto !important;
    }
    .content {
        margin-top: 40px;
    }
</style>
<link rel='stylesheet' href="{{asset('css/single-blog.css')}}" alt=""/>
<div id="maincontent" class="main-content">
    <div class="container">
        @if(!is_null($blog))
        <section class="content blog-page">
            <div class="col-lg-8 col-md-12 left-box">
                <div class="card single-blog-post">
                    <div class="img-holder">
                        <div class="img-post"><img class="img-blog" src="{{$blog->image}}" alt="Awesome Image"></div>
                        <div class="date-box"><span>{{$blog->created_at->day}}</span><br>{{get_month($blog->created_at)}}</div>
                    </div>
                    <div class="body">
                        <h3 class="m-t-20"><a href="#">{{$blog->title}}</a></h3>
                        <p>{{$blog->description}}</p>
                    </div>
                </div>
            </div>
        </section>
        @endif
    </div>
</div>