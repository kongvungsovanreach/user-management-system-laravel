@extends('layout.master')
@section('title','Home Page')
@section('script')
<script>

</script>
@endsection
@section("content")
<div class="col m10 offset-m1">
    <div class="col m12" id="top_div">
        <div class="col m2" id="add_btn">
            <a href="{{route('user.insertForm')}}">
                <button class="btn waves-effect waves-light" type="submit" name="action">Add User
                    <i class="material-icons left">library_add</i>
                </button>
            </a>
        </div>
        <div class="col m10">
            <form action="{{route('user.search')}}" method="GET" id="search_form">
               <div class="col m2">
                    <input type="text" value="{{isset($startDate)?$startDate : ''}}" class="datepicker" placeholder="Start Date" name="start_date">
               </div>
               <div class="col m2">
                    <input type="text" value="{{isset($endDate)?$endDate : ''}}" class="datepicker" placeholder="End Date" name="end_date">
               </div>
               <div class="col m4">
                    <input type="text" value="{{isset($keyword)?$keyword : ''}}" name="keyword" placeholder="Keyword..." autocomplete=off>
                </div>
               <div class="col m2">
                    <select name="filter">
                        @foreach($filters as $key => $value)
                            <option value="{{$key}}"
                                @if($filter == $key)
                                    selected = 'selected'
                                @endif
                            >{{$value}}</option>
                        @endforeach
                    </select>
               </div>
               <div class="col m2" id="search_btn">
                    <button class="btn waves-effect waves-light" type="submit" >Search
                        <i class="material-icons right">search</i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>PHONE NUMBER</th>
            <th>PROFILE</th>
            <th>CREATED AT</th>
            <th>ACTION</th>
        </tr>
        @if(count($users))
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td><img src="/storage/{{$user->profile}}" alt="Demo Text" id="front_profile"></td>
                    <td>{{$user->created_at}}</td>
                    <td>
                        <a href="{{route('user.view',$user->id)}}">
                            <button class="btn waves-effect waves-light" type="submit" name="action">
                                <i class="material-icons ">visibility</i>
                            </button>
                        </a>
                            <button class="btn waves-effect waves-light" type="submit" name="action" onclick="prompt_alert_delete({{$user->id}},'Are you sure?','Do you really want to delete this user?','User deleted successfully!','User are not deleted','{{route('user.delete',$user->id)}}')">
                                <i class="material-icons">delete</i>
                            </button>
                        <a href="{{route('user.updateForm', $user->id)}}">
                            <button class="btn waves-effect waves-light" type="submit" name="action">
                                <i class="material-icons">edit</i>
                            </button>
                        </a>
                    </td>
                </tr> 
            @endforeach
            <tr id="table_footer">
                <td colspan="6">{{$users->appends(request()->all())->links()}}</td>
                <td id="total_user_label">Total User: <span>{{$count}} users</span></td>
            </tr>
        @endif
    </table>
</div>
@endsection