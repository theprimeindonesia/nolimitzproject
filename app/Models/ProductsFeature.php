<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class ProductsFeature extends Model
{
    use UuidForKey;

    protected $table = 'products_feature';
    protected $primaryKey = 'products_feature_id';
    protected $fillable = [
        'products_feature_id',
        'name',
        'value',
        'products_id',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id');
    }
}
