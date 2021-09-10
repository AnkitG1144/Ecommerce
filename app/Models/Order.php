<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\cart;

use Auth;

class Order extends Model
{
    use HasFactory;

    public $fillable = ['order_id','user_id','first_name','last_name','email','address','country','state','zip_code','payment_mode','total_amount'];

    public static function addOrder($request){
        $order = self::create([
                'order_id' => '#'.rand(10000, 99999),
                'user_id' => Auth::id(),
                'first_name' => $request->firstName,
                'last_name' => $request->lastName,
                'email' => $request->email,
                'address' => $request->address,
                'country' => $request->country,
                'state' => $request->state,
                'zip_code' => $request->zip,
                'payment_mode' => $request->paymentMethod == 'on' ? 1 : 0,
                'total_amount' => $request->total_price
        ]);

        $products = cart::getProduct();
        foreach($products as $ord){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $ord->id
            ]);
        }

        cart::where('user_id', Auth::id())->delete();
        return $order;
    }

    public static function getMyOrder(){
        return self::select([
                        'id',
                        'first_name',
                        'last_name',
                        'payment_mode',
                        'order_id',
                        'total_amount'
                    ])
                    ->where('user_id', Auth::id())
                    ->get();
    }

    public static function orderDetails($order_id){
        return self::select([
            'orders.first_name',
            'orders.total_amount',
            'products.name',
            'products.image',
            'products.price',
        ])->join('order_items', 'order_items.order_id', 'orders.id')
        ->join('products', 'products.id', 'order_items.product_id')
        ->where('orders.id', $order_id)
        ->get();
    }

}
