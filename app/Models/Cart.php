<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['seller_id','user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function voucher(){
        return $this->belongsTo(Voucher::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function getTotalPrice($id){
        return DB::table('cart_product')
            ->join('products', 'cart_product.product_id','=','products.id')
            ->where('cart_product.cart_id','=',$id)
            ->sum(DB::raw('products.price * cart_product.quantity'));
    }

    public function getTotalQuantity($id){
        return DB::table('cart_product')
            ->where('cart_product.cart_id','=',$id)
            ->sum(DB::raw('cart_product.quantity'));
    }
}
