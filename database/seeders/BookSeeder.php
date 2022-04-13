<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * 
     * @return void
     */


    public function run()
    {
        $books = Book::factory()->count(3)->make();
    }
}
