<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fooditem extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'name', 'description', 'price', 'status','restaurent_id'];
    public function getRestaurant()
    {
        // return $this->belongsTo('App\Models\Restaurent', 'restaurent_id', 'id');
        return $this->belongsTo(Restaurent::class);

    }
}
