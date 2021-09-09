<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class cart extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $fillable = ['product_id', 'user_id'];

    public static function addToCart($product_id){

        return self::create([
            'product_id' => $product_id,
            'user_id' => Auth::id()
        ]);
    }

    public static function getProduct(){
        return self::select(['products.id','products.name', 'products.price'])
                    ->join('products','products.id', 'carts.product_id')
                    ->where('carts.user_id', Auth::id())
                    ->get();

    }

    public static function getTotalAmount(){
        return self::selectRaw('SUM(products.price) as total_price')
                    ->join('products','products.id', 'carts.product_id')
                    ->where('carts.user_id', Auth::id())
                    ->groupBy('carts.user_id')
                    ->first();

    }
}
