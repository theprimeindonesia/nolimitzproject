<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use UuidForKey;

    protected $table = 'ulasan';
    protected $primaryKey = 'ulasan_id';
    protected $fillable = [
        'ulasan_id',
        'pesan',
        'status',
        'members_id',
        'products_id',
    ];

    public function members()
    {
        return $this->belongsTo('App\Models\Members', 'members_id');
    }

    public function products()
    {
        return $this->belongsTo('App\Models\Products', 'products_id');
    }

    public function balasulasan()
    {
        return $this->hasMany('App\Models\BalasUlasan', 'ulasan_id');
    }
}
