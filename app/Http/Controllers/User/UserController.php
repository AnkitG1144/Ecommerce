<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
use App\Models\Order;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:user');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::getAllProduct();
        return view('home', compact('products'));
    }

    public function addProduct(Request $request, $product_id){
        $cart = cart::addToCart($product_id);
        return redirect('checkout');
    }

    public function checkout(Request $request){
        if($request->isMethod('get')){
            $orders = cart::getProduct();
            $totalAmount = Cart::getTotalAmount();
            return view('checkout', compact('orders','totalAmount'));
        }else{
            $order = Order::addOrder($request);
            return redirect('order');
        }
    }

    public function getMyOrder(){
        $orders = Order::getMyOrder();
        return view('order', compact('orders'));
    }
    
    public function orderDetails($orderId){
        $orderId = json_decode($orderId, true);
        $orders = Order::orderDetails($orderId);

        // dd($orders);
        return view('orderDetails', compact('orders'));
    }
}
