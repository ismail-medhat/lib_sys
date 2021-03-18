<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $table = 'roles';
    protected $fillable = [];
    public $timestamps = true;


    /* The Relationship between Role table and User table */
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
