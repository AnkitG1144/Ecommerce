<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Brand;

class BrandController extends Controller
{
    public function showBrands (){
        $categories = Category::all();
        $allBrands = Brand::getBrands();
        return view('vendor.brand', compact('categories','allBrands'));
    }

    public function createBrand(Request $request){
        $brand = Brand::createBrand($request);
        return redirect('vendor/brands');
    }
}
