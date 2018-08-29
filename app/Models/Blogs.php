<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    use UuidForKey;

    protected $table = 'blogs';
    protected $primaryKey = 'blogs_id';
    protected $fillable = [
        'blogs_id',
        'title_ind',
        'title_en',
        'images',
        'article_ind',
        'article_en',
        'status',
    ];

    public function ulasanblogs()
    {
        return $this->hasMany('App\Models\UlasanBlogs', 'blogs_id');
    }
}
