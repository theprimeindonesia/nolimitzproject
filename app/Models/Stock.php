<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use UuidForKey;

    protected $table = 'stock';
    protected $primaryKey = 'stock_id';
    protected $fillable = [
        'stock_id',
        'stock',
        'sku',
        'price',
        'barcode',
        'weight',
        'length',
        'width',
        'height',
        'primary',
        'secondary',
        'products_id',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id');
    }

    public function orderdetails()
    {
        return $this->hasMany('App\Models\OrderDetails', 'stock_id');
    }
    
    public function returorderdetails()
    {
        return $this->hasMany('App\Models\ReturOrderDetails', 'stock_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Images', 'stock_id');
    }

    public function varians()
    {
        return $this->hasMany('App\Models\Varians', 'stock_id');
    }

    public function stocklog()
    {
        return $this->hasMany('App\Models\StockLog', 'stock_id');
    }

    public function podetails()
    {
        return $this->hasMany('App\Models\PoDetails', 'stock_id');
    }

    public function returpodetails()
    {
        return $this->hasMany('App\Models\ReturPoDetails', 'stock_id');
    }
}
