<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class BalasUlasan extends Model
{
    use UuidForKey;

    protected $table = 'balas_ulasan';
    protected $primaryKey = 'balas_ulasan_id';
    protected $fillable = [
        'balas_ulasan_id',
        'pesan',
        'status',
        'ulasan_id',
        'members_id',
    ];

    public function ulasan()
    {
        return $this->belongsTo('App\Models\Ulasan','ulasan_id');
    }

    public function members()
    {
        return $this->belongsTo('App\Models\Members','members_id');
    }
}
