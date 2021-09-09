<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;

class Brand extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['vendor_id', 'name', 'category_id'];

    public static function createBrand($request){
        return self::create([
            'vendor_id' => Auth::id(),
            'name' => $request->brand_name,
            'category_id' => $request->category
        ]);
    }

    public static function getBrands(){
        return self::select([
            'brands.id as brand_id',
            'categories.name as category_name',
            'brands.name as brand_name'
        ])->join('categories', 'categories.id', 'brands.category_id')
        ->where('brands.vendor_id', Auth::id())
        ->get();
    }
}
