<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserModel extends Model
{
    public $table = "tb_users";
    public $fillable = ["name" ,"email" ,"phone_number"];
}
