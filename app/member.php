<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    protected $table = "members";
    public $fillable = ['name','created_at','description']; 
    //public $timestamps = false;

    
}
