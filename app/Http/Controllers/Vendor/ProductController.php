<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Traits\General;
use Storage;

class ProductController extends Controller
{
    use General;

    public function showProducts () {
        $brands = Brand::getBrands();
        $products = Product::getProduct();
        // dd($products);
        return view('vendor.product', compact('brands', 'products'));
    }
    
    public function addProduct(Request $request){
        $dir_path = 'products\\';
        Storage::disk('public')->makeDirectory($dir_path);

        if($request->hasFile('product_image'))
            $request->product_image = $this->uploadFile($request->file('product_image'), $dir_path);

        $product = Product::addProduct($request);

        return redirect('vendor/products');
    }
}
