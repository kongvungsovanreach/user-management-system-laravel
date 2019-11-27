@extends('layout.master')
@section('title','Insert Page')
@section("content")
<div class="col m8 offset-m2">
  <div class="col m6">
    <form action="/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-field">
          <i class="material-icons prefix">subtitles</i>
          <input type="text" name="name">
          <label for="title">Name</label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">email</i>
          <input type="text" name="email">
          <label for="description">Email</label>
        </div>
        <div class="input-field">
          <i class="material-icons prefix">phone</i>
          <input type="text" name="phone_number">
          <label for="author">Phone Number</label>
        </div>
        <div class="file-field input-field">
    
          <div class="btn">
            <span>File</span>
            <input type="file" name="profile" onchange="pick_image(this)">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>
        <div class="btn-bottom">
            <a href="{{route('user.index')}}">
                <button class="btn waves-effect waves-light" type="button" name="action">Go Back
                    <i class="material-icons left">arrow_back</i>
                </button>
            </a>
          <button class="btn waves-effect waves-light" type="submit" name="action">Save User
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