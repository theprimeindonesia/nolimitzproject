<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    use UuidForKey;

    protected $table = 'stock_log';
    protected $primaryKey = 'stock_log_id';
    protected $fillable = [
        'stock_log_id',
        'qty',
        'description',
        'stock_id',
        'po_id',
        'retur_po_id',
        'orders_id',
        'retur_orders_id',
    ];

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock', 'stock_id');
    }

    public function po()
    {
        return $this->belongsTo('App\Models\Po', 'po_id');
    }

    public function returpo()
    {
        return $this->belongsTo('App\Models\ReturPo', 'retur_po_id');
    }

    public function orders()
    {
        return $this->belongsTo('App\Models\Orders', 'orders_id');
    }

    public function returorders()
    {
        return $this->belongsTo('App\Models\ReturOrders', 'retur_orders_id');
    }
}
