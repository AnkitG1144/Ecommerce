<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

use Hash;

class Vendor extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $guard = 'vendor';

    protected $fillable = ['name', 'shop_name', 'password','email'];

    protected $hidden = [
        'password'
    ];

    public static function register($request){
        return self::create([
            'name' => $request->name,
            'email' => $request->email,
            'shop_name' => $request->shopname,
            'password' => Hash::make($request->password)
        ]);
    }
}
