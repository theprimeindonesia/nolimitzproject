<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use UuidForKey;

    protected $table = 'orders';
    protected $primaryKey = 'orders_id';
    protected $fillable = [
        'orders_id',
        'total',
        'discount',
        'grand_total',
        'status',
        'resi',
        'members_id',
        'expeditions_id',
        'member_addresses_id',
        'payments_id',
    ];

    public function members()
    {
        return $this->belongsTo('App\Models\Members','members_id');
    }

    public function expeditions()
    {
        return $this->belongsTo('App\Models\Expeditions','expeditions_id');
    }

    public function memberaddresses()
    {
        return $this->belongsTo('App\Models\MemberAddresses','member_addresses_id');
    }

    public function payments()
    {
        return $this->belongsTo('App\Models\Payments','payments_id');
    }

    public function orderdetails()
    {
        return $this->hasMany('App\Models\OrderDetails', 'orders_id');
    }

    public function orderdelivery()
    {
        return $this->hasMany('App\Models\OrderDelivery', 'orders_id');
    }

    public function returorders()
    {
        return $this->hasMany('App\Models\ReturOrders', 'orders_id');
    }

    public function stocklog()
    {
        return $this->hasMany('App\Models\StockLog', 'orders_id');
    }
}
