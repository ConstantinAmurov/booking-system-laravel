<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'books';
    protected $fillable = ['title','author'];

    public $sortable = ['title','author','description','released_at','pages','in_stock'];



    public function getAllBorrows()
    {
        return $this->hasMany(Borrow::class, 'book_id');
    }

    public function getActiveBorrows()
    {
        return $this->getAllBorrows()->where('status', '=', 'ACCEPTED');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres','book_id','genre_id');
    }

}
