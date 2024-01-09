<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurent;
class RestaurentController extends Controller
{
    public function index()
    {
        $restaurents = Restaurent::all();
        return view('restaurents', compact('restaurents'));
    }
    public function show(Request $request)

    {
        $id = $request->id;
        $restaurant = Restaurent::find($id);


        $fooditems = $restaurant->getFoodItems;

        
        // echo "<pre>";
       
        // print_r($foodItems);
        // echo "</pre>";

        return view('restaurentshow', compact('fooditems'));
    }
}
