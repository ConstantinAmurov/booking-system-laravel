<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;


    public function getAllBorrows()
    {
        return $this->hasMany(Borrow::class, 'book_id');
    }

    public function getActiveBorrows()
    {
        return $this->getAllBorrows()->where('status', '=', 'ACCEPTED');
    }

    public function getGenres()
    {
        return $this->belongsToMany(Genre::class, 'book_genre','book_id','genre_id');
    }

}
