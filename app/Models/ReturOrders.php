<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class ReturOrders extends Model
{
    use UuidForKey;

    protected $table = 'retur_orders';
    protected $primaryKey = 'retur_orders_id';
    protected $fillable = [
        'retur_orders_id',
        'orders_id',
    ];

    public function orders()
    {
        return $this->belongsTo('App\Models\Orders', 'orders_id');
    }

    public function returorderdetails()
    {
        return $this->hasMany('App\Models\ReturOrderDetails', 'retur_orders_id');
    }

    public function stocklog()
    {
        return $this->hasMany('App\Models\StockLog', 'retur_orders_id');
    }
}
