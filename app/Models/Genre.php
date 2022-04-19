<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Genre extends Model
{
    use HasFactory;

    use Sortable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'genres';

    protected $fillable = ['name', 'style'];

    public $sortable = [
        'name',
        'style'
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_genres', 'genre_id', 'book_id');
    }
}
