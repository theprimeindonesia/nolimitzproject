<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use UuidForKey;

    protected $table = 'type';
    protected $primaryKey = 'type_id';
    protected $fillable = [
        'type_id',
        'name',
        'motor_id',
    ];

    public function motor()
    {
        return $this->belongsTo('App\Models\Motor', 'motor_id');
    }

    public function productstype()
    {
        return $this->hasMany('App\Models\ProductsType', 'type_id');
    }
}
