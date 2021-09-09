<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth,Storage;

class Product extends Model
{
    use HasFactory;
    public $fillable = ['vendor_id', 'name', 'description', 'image', 'brand_id', 'is_active', 'price'];


    public static function addProduct($request){
        $createFile = [
            'vendor_id' => Auth::id(),
            'name' => $request->product_name,
            'description' => $request->product_desctiption,
            'brand_id' => $request->brand,
            'price' => $request->price,
            'is_active' => 1,
            'image' => $request->product_image
        ];  
        return self::create($createFile);
    }

    public static function getProduct(){
        return self::select([
            'products.name as product_name',
            'products.description as product_desc',
            'products.image',
            'brands.name as brand_name',
            'products.price'
        ])->join('brands','brands.id','products.brand_id')
        ->where('products.vendor_id', Auth::id())
        ->get();
    }

    public static function getAllProduct(){
        return self::select(['products.*', 'brands.name as brand_name'])
                    ->join('brands', 'brands.id', 'products.brand_id')
                    ->get();
    }
}
