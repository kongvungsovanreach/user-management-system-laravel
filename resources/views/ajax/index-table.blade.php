{{-- <div class="col m10 offset-m1">
    <div class="col m12" id="top_div">
        <div class="col m2" id="add_btn">
            <a href="{{route('user.insertForm')}}">
                <button class="btn waves-effect waves-light" type="submit" name="action">@lang('message.save_user')
                    <i class="material-icons left">library_add</i>
                </button>
            </a>
        </div>
        <div class="col m10">
            <form action="{{route('user.search')}}" method="GET" id="search_form">
               <div class="col m2">
                    <input type="text" value="{{isset($startDate)?$startDate : ''}}" class="datepicker" placeholder="@lang('message.start_date')" name="start_date">
               </div>
               <div class="col m2">
                    <input type="text" value="{{isset($endDate)?$endDate : ''}}" class="datepicker" placeholder="@lang('message.end_date')" name="end_date">
               </div>
               <div class="col m4">
                    <input type="text" value="{{isset($keyword)?$keyword : ''}}" name="keyword" placeholder="@lang('message.keyword')" autocomplete=off>
                </div>
               <div class="col m2">
                    <select name="filter">
                        @foreach($filters as $value)
                            <option value="{{$value}}"
                                @if($filter == $value)
                                    selected = 'selected'
                                @endif
                            >@lang("message.".$value)</option>
                        @endforeach
                    </select>
               </div>
               <div class="col m2" id="search_btn">
                    <button class="btn waves-effect waves-light" type="submit" >@lang('message.search')
                        <i class="material-icons right">search</i>
                    </button>
                </div>
            </form>
        </div>
    </div> --}}
    <table>
        <tr>
            <th>@lang('message.id')</th>
            <th>@lang('message.name')</th>
            <th>@lang('message.email')</th>
            <th>@lang('message.phone_number')</th>
            <th>@lang('message.profile')</th>
            <th>@lang('message.created_at')</th>
            <th>@lang('message.action')</th>
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
                            <button class="btn waves-effect waves-light" type="submit" name="action" onclick="prompt_alert_delete({{$user->id}}, '@lang('message.are_you_sure')','@lang('message.will_you_delete')','@lang('message.user_delete')','User are not deleted','{{route('user.delete',$user->id)}}')">
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
                <td id="total_user_label">@lang('message.total_user') <span>{{$count}} @lang('message.user')</span></td>
            </tr>
        @endif
    </table>
{{-- </div> --}}
