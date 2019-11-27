<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;

class UserModelController extends Controller
{
    function index(){
        $users = UserModel::paginate(7);
        return view("index", compact("users"));
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
        $user -> profile = $profile;
        $user -> save();
        return redirect()->route("user.index");
    }

    function delete($id){
        UserModel::destroy($id);
        return redirect()->back();
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
            $dbUser-> profile = $profile;
            $dbUser->save();
        }
        return redirect()->route("user.index");
    }
}
