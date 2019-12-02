<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;

class UserModelController extends Controller
{   
    private $filters = ["id","name","email","phone_number"];
    function index(){
       
        $users = UserModel::paginate(7);
        $count = UserModel::all()->count();
        $filters = $this->filters;
        $filter = "name";
        return view("index", compact("users","filters", "filter", "count"));
    }

    function view($id){
        $user = UserModel::find($id);
        return view("view", compact("user"));
    }

    function insertForm(){
        return view("insert");
    }

    function insertAction(Request $request){
        $profile = FileUploadController::uploadSingleFile($request->file("profile"));;
        $user = new UserModel();
        $user->fill($request->all());
        $user -> profile = str_replace("public/", "", $profile);
        $user -> save();
        return redirect()->route("user.index");
    }

    function delete($id){
        UserModel::destroy($id);
        return redirect()->back();
    }

    function deleteAll(){
        UserModel::truncate();
        return redirect()->route("user.index");
    }

    function updateForm($id){
        $user = UserModel::find($id);
        return view("update", compact("user"));
    }

    function updateAction(Request $request, $id){
        $file = $request->file("profile");
        if($file==""){
            UserModel::find($id)->update($request->except("profile"));
        }else {
            $dbUser = UserModel::find($id);
            $dbUser->fill($request->except("profile"));
            $profile = FileUploadController::uploadSingleFile($file);
            $dbUser-> profile = str_replace("public/", "", $profile);;
            $dbUser->save();
        }
        return redirect()->route("user.index");
    }

    function search(Request $request){
       
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $keyword = $request->keyword;
        $filter = $request->filter;
        $users = [];
        $count = 0;
        if($startDate == "" || $endDate == ""){
            $users = UserModel::where($filter,"like","%".$keyword."%")->paginate(5);
            $count = UserModel::where($filter,"like","%".$keyword."%")->get()->count();
        }else if($keyword=="" && ($startDate == "" || $endDate == "")){
            $users = UserModel::wherebetween("created_at",[$startDate, $endDate])->paginate(5);
            $count = UserModel::wherebetween("created_at",[$startDate, $endDate])->get()->count();
        }
        else {
            $users = UserModel::where($filter,"like","%".$keyword."%")->wherebetween("created_at",[$startDate, $endDate])->paginate(5);
            $users->count();
            $count = UserModel::where($filter,"like","%".$keyword."%")->wherebetween("created_at",[$startDate, $endDate])->get()->count();
        }
        $filters = $this->filters;
        return view("index", compact("users","filters", "filter", "keyword", "startDate", "endDate", "count"));
    }

    function khmer(){
        \App::setLocale("kh");
        \Session::put("locale", "kh");
        return redirect()->back();
    }

    function english(){
        \App::setLocale("en");
        \Session::put("locale", "en");
        return redirect()->back();
    }


    // AJAX PAGINATION CONTROLLER
    function ajax_index(Request $request){
        $users = UserModel::paginate(7);
        $count = UserModel::all()->count();
        $filters = $this->filters;
        $filter = "name";
        if($request->ajax()){
            return view("ajax.index-table", compact("users","count"));
        }
        return view("ajax.index", compact("users","filters", "filter", "count"));
    }


}
