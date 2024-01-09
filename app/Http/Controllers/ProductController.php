<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Storage;
class ProductController extends Controller
{
  public function createproducts(){
    return view('productscreate');
  }
 
  public function productsshow(){
    return view('products');
  }
  
public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'body_html' => 'required',
        'product_type' => 'required',
        'status' => 'required',
        // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $imageName = time().'.'.$request->image->extension();
    $request->image->move(public_path('images'), $imageName);


    $newProduct = Product::create([
        'title' => $request->title,
        'body_html' => $request->body_html,
        'product_type' => $request->product_type,
        'status' => $request->status,
        'image' => $imageName,
    ]);

    $imagePath = public_path('images') . '/' . $imageName;
    $imageContent = base64_encode(Storage::get($imagePath));
    $shopifyImage = new \Illuminate\Http\UploadedFile($imagePath, $imageName);
    $shopifyProductData = [
        'product' => [
            'title' => $newProduct->title,
            'body_html' => $newProduct->body_html,
            'product_type' => $newProduct->product_type,
            'status' => $newProduct->status,
            'images' => [
                [
                    'attachment' => base64_encode(file_get_contents($shopifyImage->path())),
                    'filename' => $shopifyImage->getClientOriginalName(),
                ],
            ],
        ],
    ];

    
    $response = Http::withHeaders([
        'X-Shopify-Access-Token' => env('SHOPIFY_TOKEN'),
    ])->post(env('SHOPIFY_STORE') . '/admin/api/2023-10/products.json', $shopifyProductData);

    if ($response->successful()) {
        $shopifyProduct = $response->json()['product'];
        return redirect()->route('products.create')->with('success', 'Product created successfully.');
    } else {
        dd($response->status(), $response->json());
    }
}


public function mailview(){
    return view('mailsend');
  }


  public function mailsend(Request $request){
    // $this->validate($request,[
    //     'email' => 'required|email|unique:users',
    //     'name' => 'required|max:20|min:5',
    //     'phone' => 'required|min:11|numeric',
    //     'message'=> 'required|max:200|min:5'
    //     ]);

       $email= $request->Input('email');
       $name= $request->Input('name');
       $phone= $request->Input('phone');
       $message= $request->Input('message');
       echo $email;
    //    die();
  }
}
