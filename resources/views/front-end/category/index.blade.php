@extends('layouts.master')
@section('title', "StubGuys")
<!-- ______________________ Start Banner __________________ -->
@section('content')
    <div  id="maincontent" class="categories-wrapper">
        <div class="container">
            <div class="events-filter">
                <select id="category-filter" name="category-filter" class="form-control category-filter">
                    <option disabled="disabled" selected>Select A Category</option>
                    @foreach($categories as $category)
                        @if($category->slug !== 'more')
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <script>
        $(document).on('change','#category-filter',function() {
            var value = $(this).val();
            console.log(value);

            $.ajax({
                url  : base_url() + "category-filter",
                type : "POST",
                data : {'id': value },
                success: function(response){
                    console.log(response);
                }
            });
        });
    </script>
@endsection