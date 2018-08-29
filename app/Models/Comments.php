<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use UuidForKey;

    protected $table = 'comments';
    protected $primaryKey = 'comments_id';
    protected $fillable = [
        'comments_id',
        'comments',
        'status',
        'products_id',
        'members_id',
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Products','products_id');
    }

    public function members()
    {
        return $this->belongsTo('App\Models\Members','members_id');
    }

}
