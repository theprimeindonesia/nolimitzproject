<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class ReturOrderDetails extends Model
{
    use UuidForKey;

    protected $table = 'retur_orderdetails';
    protected $primaryKey = 'retur_orderdetails_id';
    protected $fillable = [
        'retur_orderdetails_id',
        'qty',
        'alasan',
        'retur_orders_id',
        'stock_id',
    ];

    public function returorders()
    {
        return $this->belongsTo('App\Models\ReturOrders', 'retur_orders_id');
    }

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock', 'stock_id');
    }

}
