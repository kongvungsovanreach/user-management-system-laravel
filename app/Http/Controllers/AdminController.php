<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return "<h1>This is ADMIN home</h1>";
    }
}
