<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Reader',
            'email' => 'reader@brs.com',
            'password' => "password",
        ]);

        DB::table('users')->insert([
            'name' => 'John Librarian',
            'email' => 'librarian@brs.com',
            'password' => "password",
        ]);
    }
}
