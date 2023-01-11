<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $table = "orders";

    protected $guarded = [
        'id'
    ];

    public function user() {
        return $this->belongsTo('App\User','userId','id');
    }

    public function items() {
        return $this->belongsToMany(related: Item::class)->withPivot(['stock', 'price']);
    }

    public function order_details() {
        return $this->hasMany('App\OrderDetails', 'orderId', 'id');
    }

}
