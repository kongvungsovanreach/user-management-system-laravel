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
