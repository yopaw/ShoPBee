<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    public function sellers(){
        return $this->belongsToMany(Seller::class);
    }

    public function transactions(){
        return $this->hasMany(Transaction::class);
    }

    public function getTotalVoucherUsed($id){
//        return $this->transactions()
    }

}
