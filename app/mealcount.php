<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mealcount extends Model
{
    protected $table = 'mealcounts';
    public $fillable = ['memberId','meal_number','created_at'];
}
