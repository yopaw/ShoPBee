<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    public function product(){
        return $this->hasMany(Product::class);
    }

    public function vouchers(){
        return $this->belongsToMany(Voucher::class);
    }

    public function transaction(){
        return $this->hasMany(HeaderTransaction::class);
    }
}
