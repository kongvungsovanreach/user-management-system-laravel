@extends('layout.master')
@section('title','Custom Login Page')
@section('script')
<script>

</script>
@endsection
@section("content")
<div class="col m4 offset-m4">
    <div class="col m12" id="top_div">
        <h3>Welcome to Custom Login</h3>
        @isset($errorLogin)
            <h1>mean error ai</h1>
        @endisset
        <form action="/customloginaction" method="POST">
            @csrf
            <input type="text" name="email" id="email">
            <input type="password" name="password" id="password">
            <input type="submit" value="Login Now" class="btn">
        </form>
    </div>
</div>
@endsection