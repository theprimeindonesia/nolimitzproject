<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class BalasUlasanBlogs extends Model
{
    use UuidForKey;

    protected $table = 'balas_ulasan_blogs';
    protected $primaryKey = 'balas_ulasan_blogs_id';
    protected $fillable = [
        'balas_ulasan_blogs_id',
        'pesan',
        'status',
        'ulasan_blogs_id',
        'members_id',
    ];

    public function ulasanblogs()
    {
        return $this->belongsTo('App\Models\UlasanBlogs','ulasan_blogs_id');
    }

    public function members()
    {
        return $this->belongsTo('App\Models\Members','members_id');
    }
}
