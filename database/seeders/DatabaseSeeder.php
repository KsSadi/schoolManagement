<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Modules\Users\Models\Users;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::create([
            'name'=>'Super Admin',
            'email'=>'super@admin.com',
            'password'=>bcrypt('12345678'),
            'user_type'=>'admin'

        ]);
    }
}
