<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Kyon147\LaravelShopify\Facades\Shopify;
// use Signifly\Shopify\Shopify;
use Illuminate\Support\Facades\Http;
use Auth;
class ShopifyController extends Controller
{
    
   
    public function getProducts()
    
    {
        if (!Auth::check()){
            return view('auth.login');
        }
        else{
        $shopUrl = env('SHOPIFY_STORE');
        $apiKey = env('SHOPIFY_API_KEY');
        $apiPassword = env('SHOPIFY_API_SECRET');
        $accessToken = env('SHOPIFY_TOKEN');

       
        $productsEndpoint = "{$shopUrl}/admin/api/2021-10/products.json";

       
        $response = Http::withHeaders([
            'X-Shopify-Access-Token' => $accessToken,
        ])->get($productsEndpoint);

       
        if ($response->successful()) {
           
            $products = $response->json()['products'];
//             echo "<pre>";
// print_r($products);
// echo "</pre>";
// die();
          return view('products',compact('products'));
        } else {
    
            dd($response->json());
        }
        }
        
    }
}

