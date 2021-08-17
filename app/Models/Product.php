<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'stock', 'seller_id', 'description', 'product_type_id'];

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function type(){
        return $this->hasOne(ProductType::class);
    }

    public function transactions(){
        return $this->belongsToMany(Transaction::class)->withPivot('quantity');
    }

    public function rating($id){
        return DB::table('transactions')
            ->join('reviews', 'transactions.id','=','reviews.transaction_id')
            ->join('product_transaction', 'transactions.id', '=', 'product_transaction.transaction_id')
            ->where('product_transaction.product_id', '=', $id)
            ->avg('rating');
    }

    public function totalReviews($id){
        return DB::table('transactions')
            ->join('reviews', 'transactions.id','=','reviews.transaction_id')
            ->join('product_transaction', 'transactions.id', '=', 'product_transaction.transaction_id')
            ->where('product_transaction.product_id', '=', $id)
            ->count();
    }
}
