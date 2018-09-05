<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class UlasanBlogs extends Model
{
    use UuidForKey;

    protected $table = 'ulasan_blogs';
    protected $primaryKey = 'ulasan_blogs_id';
    protected $fillable = [
        'ulasan_blogs_id',
        'pesan',
        'status',
        'blogs_id',
        'members_id',
    ];

    public function blogs()
    {
        return $this->belongsTo('App\Models\Blogs', 'blogs_id');
    }

    public function members()
    {
        return $this->belongsTo('App\Models\Members', 'members_id');
    }

    public function balasulasanblogs()
    {
        return $this->hasMany('App\Models\BalasUlasanBlogs', 'ulasan_blogs_id');
    }
}
