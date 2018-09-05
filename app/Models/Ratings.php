<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use UuidForKey;

    protected $table = 'ratings';
    protected $primaryKey = 'ratings_id';
    protected $fillable = [
        'ratings_id',
        'rating',
        'products_id',
        'members_id',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id');
    }

    public function members()
    {
        return $this->belongsTo('App\Models\Members', 'members_id');
    }
}
