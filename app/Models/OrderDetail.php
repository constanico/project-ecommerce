<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderDetail extends Model
{
    use HasFactory;

    public $table = "order_details";

    protected $guarded = [
        'id'
    ];

    public function order() {
        return $this->belongsTo('App\Order', 'orderId', 'id');
    }

}
