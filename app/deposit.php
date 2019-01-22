<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{
    protected $table = 'deposits';
    public $fillable = ['memberId','amount','created_at'];
}
