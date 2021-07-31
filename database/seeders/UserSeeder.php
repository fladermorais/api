<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        User::firstOrCreate([
            "name"  =>  "Administrador",
            "email" =>  "admin@admin.com.br",
            "password"  =>  bcrypt("Mudar123@"), 
            ]
        );
    }
}
