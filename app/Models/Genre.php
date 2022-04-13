<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;


    public function getBooks() {
        return $this->belongsToMany(Book::class,'book_genre','genre_id','book_id');
    }
}
