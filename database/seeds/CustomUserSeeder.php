<?php

use Illuminate\Database\Seeder;

class CustomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory("App\UserModel", 10)->create();
    }
}
