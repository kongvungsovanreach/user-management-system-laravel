<?php

Route::get('/', "UserModelController@index")->name("user.index");
Route::get("/insert", "UserModelController@insertForm")->name("user.insertForm");
Route::post("/insert", "UserModelController@insertAction")->name("user.insertAction");
Route::get("/view/{id}","UserModelController@view")->name("user.view");
Route::get("/delete/{id}", "UserModelController@delete")->name("user.delete");
Route::get("/deleteAll", "UserModelController@deleteAll")->name("user.deleteAll");
Route::get("/update/{id}", "UserModelController@updateForm")->name("user.updateForm");
Route::put("/update/{id}", "UserModelController@updateAction")->name("user.updateAction");
Route::get("/search", "UserModelController@search")->name("user.search");
Route::get("/khmer", "UserModelController@khmer");
Route::get("/english", "UserModelController@english");

// AJAX ROUTE
Route::get("/ajax/index", "UserModelController@ajax_index")->name("user.ajax.pagination");
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get("/logout", "UserModelController@logoutGet")->name("logout");


//ADMIN ROUTE
Route::group(["prefix"=>"admin", "middleware"=>["auth.admin", "auth"]], function(){
    Route::get("home", "AdminController@index");
});
