<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Borrow extends Model
{
    use HasFactory;
    use Sortable;
    protected $table = 'borrows';
    protected $fillable = ['reader_id','book_id','status'];

    public $sortable = ['reader_id','book_id','status'];



    public function getUserRelation()
    {
        return $this->belongsTo(User::class, 'reader_id', 'id');
    }

    public function getBookRelation()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
