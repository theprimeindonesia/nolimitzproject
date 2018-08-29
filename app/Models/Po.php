<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    use UuidForKey;

    protected $table = 'po';
    protected $primaryKey = 'po_id';
    protected $fillable = [
        'po_id',
        'total',
        'discount',
        'grand_total',
        'status',
        'suppliers_id',
    ];

    public function suppliers()
    {
        return $this->belongsTo('App\Models\Suppliers','suppliers_id');
    }

    public function returpo()
    {
        return $this->hasMany('App\Models\ReturPo', 'po_id');
    }

    public function podetails()
    {
        return $this->hasMany('App\Models\PoDetails', 'po_id');
    }

    public function stocklog()
    {
        return $this->hasMany('App\Models\StockLog', 'po_id');
    }
}
