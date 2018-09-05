<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use UuidForKey;

    protected $table = 'order_details';
    protected $primaryKey = 'order_details_id';
    protected $fillable = [
        'order_details_id',
        'qty',
        'price',
        'total',
        'orders_id',
        'stock_id',
    ];

    public function orders()
    {
        return $this->belongsTo('App\Models\Orders','orders_id');
    }

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock','stock_id');
    }
}
