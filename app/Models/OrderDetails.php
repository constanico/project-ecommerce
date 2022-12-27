<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;

    public function item() {
        return $this->belongsTo('App\Item','item_id','id');
    }

    public function order() {
        return $this->belongsTo('App\Order','order_id','id');
    }
}
