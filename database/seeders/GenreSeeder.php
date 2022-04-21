<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => "Fiction",
            'style' => 'primary'
        ]);

        DB::table('genres')->insert([
            'name' => "Action",
            'style' => 'warning'
        ]);

        DB::table('genres')->insert([
            'name' => "Self-Help",
            'style' => 'info'
        ]);
    }
}
