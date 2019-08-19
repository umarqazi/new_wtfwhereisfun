@extends('layouts.master')
@section('title', "All Blogs")
@section('content')
    <link rel="stylesheet" href="{{asset('/css/blog-grid-list.css')}}">
    {{--@if(count($blogs))--}}
    {{--@foreach ($blogs as $blog)--}}
    {{--<div class="column">--}}
    {{--<a href="{{url('blogs/'.encrypt_id($blog->id))}}"><img class="all-blog-img" alt="Blog image" src="{{$blog->image}}"></a>--}}
    {{--<a href="{{url('blogs/'.encrypt_id($blog->id))}}"><h2>{{$blog->title}}</h2></a>--}}
    {{--<a href="{{url('blogs/'.encrypt_id($blog->id))}}"><p>{{str_limit($blog->description, 50)}}</p></a>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--@endif--}}

    <div class="container">

        <section class=" blog-page">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2>Blogs</h2>
                        <div id="btnContainer">
                            <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button>
                            <button class="btn" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($blogs))
                @foreach ($blogs as $blog)
                    <div class="col-lg-6 left-box column">
                        <div class="card single-blog-post">
                            <div class="img-holder">
                                <div class="img-post"><img class="img-blog-img" src="{{$blog->directory.$blog->image}}" alt="BLOG IMAGE"></div>
                                <div class="date-box"><span>{{$blog->created_at->day}}</span><br>{{get_month($blog->created_at)}}</div>
                            </div>
                            <div class="body">
                                <h3 class="m-t-20"><a href="{{url('blogs/'.encrypt_id($blog->id))}}">{{str_limit($blog->title,30)}}</a></h3>
                                <p>{{str_limit($blog->description, 100)}}</p>
                                <a href="{{url('blogs/'.encrypt_id($blog->id))}}" class="btn btn-raised btn-default">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>
    </div>
    <script>
        var elements = document.getElementsByClassName("column");
        var i;
        function listView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "80%";
            }
        }
        function gridView() {
            for (i = 0; i < elements.length; i++) {
                elements[i].style.width = "50%";
            }
        }
        var container = document.getElementById("btnContainer");
        var btns = container.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function(){
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
@endsection