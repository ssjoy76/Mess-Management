<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bazar extends Model
{
    protected $table = 'bazars';
    public $fillable = ['memberId','details','amount','created_at'];
}
