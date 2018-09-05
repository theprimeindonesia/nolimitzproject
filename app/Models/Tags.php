<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use UuidForKey;

    protected $table = 'tags';
    protected $primaryKey = 'tags_id';
    protected $fillable = [
        'tags_id',
        'name',
        'products_id',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id');
    }
}
