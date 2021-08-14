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

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function getTotalVoucherUsed($id){
        return $this->transactions()
            ->where('voucher_id','=',$id)
            ->count();
    }
}
