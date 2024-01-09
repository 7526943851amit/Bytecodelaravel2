<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurent extends Model
{
    use HasFactory;
    protected $table = 'restaurent';
    protected $fillable = ['name', 'code', 'location'];

    public function getFoodItems()
    {
        // return $this->hasMany('App\Models\FoodItem', 'restaurent_id', 'id');
        return $this->hasMany(fooditem::class);
    }
}
