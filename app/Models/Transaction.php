<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

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

    public function review(){
        return $this->hasOne(Review::class);
    }

    public function getTotalPrice($id){
        return DB::table('product_transaction')
            ->join('products', 'product_transaction.product_id','=','products.id')
            ->where('product_transaction.transaction_id','=',$id)
            ->sum(DB::raw('products.price * product_transaction.quantity'));
    }
}
