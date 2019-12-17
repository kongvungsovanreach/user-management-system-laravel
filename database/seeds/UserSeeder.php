<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table("role_user")->truncate();
        $admin = User::create([
            "name"=>"Bong admin",
            "email"=>"admin@admin",
            "password"=>bcrypt("admin@admin")
        ]);

        $user = User::create([
            "name"=>"Bong user",
            "email"=>"user@user",
            "password"=>bcrypt("user@user")
        ]);

        $adminRole = Role::where("name", "admin")->first();
        $userRole = Role::where("name", "user")->first();

        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
    }
}