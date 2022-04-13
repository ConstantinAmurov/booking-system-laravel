<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    public function getUserRelation()
    {
        return $this->belongsTo(User::class, 'id', 'reader_id');
    }
}
