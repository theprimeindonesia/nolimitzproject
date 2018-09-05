<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use UuidForKey;

    protected $table = 'products';
    protected $primaryKey = 'products_id';
    protected $fillable = [
        'products_id',
        'name',
        'description_ind',
        'description_en',
        'stock',
        'merk_id',
        'categories_id',
    ];

    public function merk()
    {
        return $this->belongsTo('App\Models\Merk','merk_id');
    }

    public function categories()
    {
        return $this->belongsTo('App\Models\Categories','categories_id');
    }

    public function ulasan()
    {
        return $this->hasMany('App\Models\Ulasan', 'products_id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Ratings', 'products_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comments', 'products_id');
    }

    public function tags()
    {
        return $this->hasMany('App\Models\Tags', 'products_id');
    }

    public function stock()
    {
        return $this->hasMany('App\Models\Stock', 'products_id');
    }

    public function productsfeature()
    {
        return $this->hasMany('App\Models\ProductsFeature', 'products_id');
    }

    public function productstype()
    {
        return $this->hasMany('App\Models\ProductsType', 'products_id');
    }

    public function productsmotor()
    {
        return $this->hasMany('App\Models\ProductsMotor', 'products_id');
    }
}
