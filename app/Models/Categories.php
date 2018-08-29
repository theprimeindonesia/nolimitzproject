<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use UuidForKey;

    protected $table = 'categories';
    protected $primaryKey = 'categories_id';
    protected $fillable = [
        'categories_id',
        'name_ind',
        'name_en',
        'image',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Products', 'categories_id');
    }
}
