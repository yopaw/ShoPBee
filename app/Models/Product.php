<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function seller(){
        return $this->belongsTo(Seller::class);
    }

    public function type(){
        return $this->hasOne(ProductType::class);
    }

    public function detailTransaction(){
        return $this->belongsTo(DetailTransaction::class);
    }
}
