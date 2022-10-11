<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'category_title' => 'Verslas',
            ]);

        DB::table('categories')->insert([
            'category_title' => 'Sportas',
            ]);

        DB::table('categories')->insert([
            'category_title' => 'Auto',
            ]);

        DB::table('categories')->insert([
            'category_title' => 'Sveikata',
            ]);

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('1'),
            'role' => 10,
        ]);
    
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com' ,
            'password' => Hash::make('2')
        ]);
    }
}
