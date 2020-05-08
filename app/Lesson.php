<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //Table Name
    protected $table = 'lessons';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

}
