<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\Brand;
use Validator, Auth;

class VendorController extends Controller
{
    public function index(){
        $totalProduct = Product::where('vendor_id', Auth::id())->count();
        $totalBrand = Brand::where('vendor_id', Auth::id())->count();
        return view('vendor.home', compact('totalProduct', 'totalBrand'));
    }

    public function showRegistrationForm(){
        return view('auth.vendorRegister');
    }

    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'shopname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        Vendor::register($request);
        return redirect('login');
    }
}
