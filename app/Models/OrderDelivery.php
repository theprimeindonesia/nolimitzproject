<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class OrderDelivery extends Model
{
    use UuidForKey;

    protected $table = 'order_delivery';
    protected $primaryKey = 'order_delivery_id';
    protected $fillable = [
        'order_delivery_id',
        'details',
        'orders_id',
    ];

    public function orders()
    {
        return $this->belongsTo('App\Models\Orders','orders_id');
    }
}
