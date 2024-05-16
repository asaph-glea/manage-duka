<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Carbon\Carbon; 

class ProductController extends Controller
{
   public function AllProduct(){

    $product = Product::latest()->get();
    return view('backend.product.all_product',compact('product'));

   } // End Method 

   public function AddProduct(){

    $category = Category::latest()->get();
    $supplier = Supplier::latest()->get();
    return view('backend.product.add_product',compact('category','supplier'));
   }// End Method 

   public function StoreProduct(Request $request){ 

    if ($request ->file('image')) {
        $manager = new ImageManager(new Driver());
        $name_gen = hexdec(uniqid()).'.'.$request ->file('image')->getClientOriginalExtension();
        $img = $manager->read($request ->file('image'));
        $img = $img->resize(300,300);
        $img->toJpeg(80)->save(base_path('public/upload/product/'.$name_gen));
        $save_url = 'upload/product/'.$name_gen;

        
    Product::insert([

        'product_name' => $request->product_name,
        'category_id' => $request->category_id,
        'supplier_id' => $request->supplier_id,
        'product_code' => $request->product_code,
        'product_garage' => $request->product_garage,
        'product_store' => $request->product_store,
        'buying_date' => $request->buying_date,
        'expire_date' => $request->expire_date,
        'buying_price' => $request->buying_price,
        'selling_price' => $request->selling_price,
        'product_image' => $save_url,
        'created_at' => Carbon::now(), 

    ]);

    } //end if
    
     $notification = array(
        'message' => 'Product Inserted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('all.product')->with($notification); 
    } // End Method 

}