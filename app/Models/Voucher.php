<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ['name','stock','description','discount','minimum_price','maximum_price'];
    public function sellers(){
        return $this->belongsToMany(Seller::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }

}
