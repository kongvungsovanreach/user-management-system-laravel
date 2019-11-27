@extends('layout.master')
@section('title','Insert Page')
@section("content")
<div class="col m8  offset-m2">
    <form action="{{route('user.updateAction', $user->id)}}" method="POST" enctype="multipart/form-data" id="update_form">
      @method("PUT")
      <div class="col m6">
        @csrf
        <div class="input-field">
          <i class="material-icons prefix">subtitles</i>
          <input type="text" name="name" value="{{$user->name}}">
        </div>
        <div class="input-field">
          <i class="material-icons prefix">email</i>
          <input type="text" name="email"  value="{{$user->email}}">
        </div>
        <div class="input-field">
          <i class="material-icons prefix">phone</i>
          <input type="text" name="phone_number"  value="{{$user->phone_number}}">
        </div>
        <div class="file-field input-field">
            
          <div class="btn">
            <span>File</span>
            <input type="file" name="profile" value="" onchange="pick_image(this)">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" value="{{trim($user->profile, 'upload\\')}}">
          </div>
        </div>
        <div class="btn-bottom">
            <a href="{{route('user.index')}}">
                <button class="btn waves-effect waves-light" type="button" name="back">Go Back
                    <i class="material-icons left">arrow_back</i>
                </button>
            </a>
          <button class="btn waves-effect waves-light" type="button" name="update" onclick="prompt_alert_update({{$user->id}},'Are you sure?','Do you really want to update this user?','User updated successfully!','User are not updated','{{route('user.index')}}')">Update User
            <i class="material-icons right">update</i>
          </button>
        </div>
    </div>
    <div class="col m6">
        <img src="/{{$user->profile}}" alt="{{$user->title}}'s thumbnail" id="view_profile">
    </div>
  </form>
</div>
@endsection