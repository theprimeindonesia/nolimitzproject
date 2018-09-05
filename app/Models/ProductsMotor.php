<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class ProductsMotor extends Model
{
    use UuidForKey;

    protected $table = 'products_motor';
    protected $primaryKey = 'products_motor_id';
    protected $fillable = [
        'products_motor_id',
        'products_id',
        'motor_id',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id');
    }

    public function motor()
    {
        return $this->belongsTo('App\Models\Motor', 'motor_id');
    }
}
