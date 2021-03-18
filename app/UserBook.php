<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBook extends Model
{
    protected $table = 'user_book';
    protected $fillable = [
        'book_id',
        'user_id',
    ];

    protected $hidden = [
        'pivot',
    ];

    public $timestamps = true;
}
