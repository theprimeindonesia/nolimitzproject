<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class ProductsType extends Model
{
    use UuidForKey;

    protected $table = 'products_type';
    protected $primaryKey = 'products_type_id';
    protected $fillable = [
        'products_type_id',
        'products_id',
        'type_id',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }
}
