@extends('layout.master')
@section('title','Insert Page')
@section("content")
<div class="col m8 offset-m2">
  <div class="col m6">
    <form action="/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-field">
          <i class="material-icons prefix">subtitles</i>
          <input type="text" name="name" value="{{old('name')}}">
          <label for="title">@lang('message.name')
            @if($errors->has("name"))
              <span class="error">{{$errors->first('name')}}</span>
            @endif
          </label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">email</i>
          <input type="text" name="email" value="{{old('email')}}">
          <label for="description">@lang('message.email')
            @if($errors->has("email"))
              <span class="error">{{$errors->first('email')}}</span>
            @endif
          </label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">phone</i>
          <input type="text" name="phone_number" value="{{old('phone_number')}}">
          <label for="author">@lang('message.phone_number')
            @if($errors->has("phone_number"))
              <span class="error">{{$errors->first('phone_number')}}</span>
            @endif
          </label>
        </div>
        <div class="file-field input-field">
    
          <div class="btn">
            <span>@lang('message.profile')</span>
            <input type="file" name="profile" onchange="pick_image(this)" value="">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
        <div class="btn-bottom">
            <a href="{{route('user.index')}}">
                <button class="btn waves-effect waves-light" type="button" name="action">@lang('message.go_back')
                    <i class="material-icons left">arrow_back</i>
                </button>
            </a>
          <button class="btn waves-effect waves-light" type="submit" name="action">@lang('message.save_user')
            <i class="material-icons right">send</i>
          </button>
        </div>
      </form>
  </div>
  <div class="col m6">
        <img src="image/default.png" alt="" id="view_profile">
  </div>
</div>
@endsection