<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IntermediateLesson extends Model
{
    //
    //Table Name
    protected $table = 'intermediate_lessons';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }

}
