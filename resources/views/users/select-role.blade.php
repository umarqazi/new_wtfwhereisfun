@extends('layouts.master')
@section('title', "Select Role")
@section('content')
    <div class="main-top-padding">
        <div class="select-role-form shadow">
            <form action="{{url('update/role')}}" method="post">
                {{ csrf_field() }}
                <h4>Select Role</h4>
                <div class="form-group">
                    <input class="form-control" name="role" id="radio_6" type="radio" value="vendor" required />
                    <label for="radio_6">Event Hoster</label>

                    <input class="form-control" name="role" id="radio_7" type="radio" value="normal" />
                    <label for="radio_7">Customer</label>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn rounded-border btn-sm">
                </div>
            </form>
        </div>
    </div>
@endsection