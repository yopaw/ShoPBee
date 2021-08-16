<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
