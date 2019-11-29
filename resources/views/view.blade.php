@extends('layout.master')
@section('title','View Page')
@section("content")
<div class="col s8 offset-s2">
    <div class="col s7" id="view_info">
        <table id="view_table">
            <tr>
                <th>@lang('message.name')</th>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <th>@lang('message.email')</th>
                <td>{{$user->email}}</td>
            </tr>
            <tr>
                <th>@lang('message.phone_number')</th>
                <td>{{$user->phone_number}}</td>
            </tr>
        </table>
        <div class="btn-bottom">
            <a href="{{route('user.index')}}">
                <button class="btn waves-effect waves-light" type="submit" name="action">@lang('message.go_back')
                    <i class="material-icons left">arrow_back</i>
                </button>
            </a>
        </div>
    </div>
    <div class="col s5">
        <img src="/storage/{{$user->profile}}" alt="{{$user->title}}'s thumbnail" id="view_profile">
    </div>
</div>
@endsection