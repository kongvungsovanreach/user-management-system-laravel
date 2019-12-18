<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserModel;
use App\Http\Controllers\FileUploadController;

class APIController extends APIBaseController
{
    function index(){
        $users = UserModel::all();
        if(count($users)){
            return $this->sendResponse($users,"The user fetch successfully!");
        }else{
            return $this->sendError("There is NO user found!");
        }
    }

    function insert(Request $request){
        $profile = FileUploadController::uploadSingleFile($request->file("profile"));;
        $user = new UserModel();
        $user->fill($request->all());
        $user -> profile = str_replace("public/", "", $profile);
        $user -> save();
        return $this->sendResponse($user,"The user inserted successfully!");
    }

    function delete($id){
        if(UserModel::destroy($id)){
            return $this->sendResponse("Deleted successfully");
        }
        return $this->sendError("Cannot find user to delete with id ".$id);
    }

    function update(Request $request, $id){
        $file = $request->file("profile");
        if($file==""){
            UserModel::find($id)->update($request->except("profile"));
            return $this->sendResponse(null, "Update success");
        }else {
            $dbUser = UserModel::find($id);
            $dbUser->fill($request->except("profile"));
            $profile = FileUploadController::uploadSingleFile($file);
            $dbUser-> profile = str_replace("public/", "", $profile);;
            $dbUser->save();
            return $this->sendResponse($a, "success");
        }
        
    }
}
