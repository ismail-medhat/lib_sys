<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'books';
    protected $fillable = [
        'name',
        'author_name',
        'edition_unmber',
        'isborrow',
    ];

    protected $hidden = [
        'pivot',
    ];

    public $timestamps = true;


    /* The Relationship between Book table and User table */
    public function users()
    {
        return $this->belongsToMany('App\User','user_book','book_id','user_id');
    }
}
