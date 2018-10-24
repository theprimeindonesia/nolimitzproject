<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class ProductsVarians extends Model
{
    use UuidForKey;

    protected $table = 'products_varians';
    protected $primaryKey = 'products_varians_id';
    protected $fillable = [
        'products_varians_id',
        'name',
        'products_id',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id');
    }
   
}
