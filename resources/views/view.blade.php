@extends('layout.master')
@section('title','View Page')
@section("content")
<div class="col s8 offset-s2">
    <div class="col s7" id="view_info">
        <table id="view_table">
            <tr>
                <th>Name</th>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{$user->phone_number}}</td>
            </tr>
        </table>
        <div class="btn-bottom">
            <a href="{{route('user.index')}}">
                <button class="btn waves-effect waves-light" type="submit" name="action">Go Back
                    <i class="material-icons left">arrow_back</i>
                </button>
            </a>
        </div>
    </div>
    <div class="col s5">
        <img src="/{{$user->profile}}" alt="{{$user->title}}'s thumbnail" id="view_profile">
    </div>
</div>
@endsection