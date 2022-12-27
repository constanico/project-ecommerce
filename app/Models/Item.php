<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price',
        'desc',
        'stock'
    ];

    public function order_detail() {
        return $this->hasMany('App\OrderDetails','item_id','id');
    }
}
