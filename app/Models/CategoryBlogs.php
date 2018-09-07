<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class CategoryBlogs extends Model
{
    use UuidForKey;

    protected $table = 'category_blogs';
    protected $primaryKey = 'category_blogs_id';
    protected $fillable = [
        'category_blogs_id',
        'name_ind',
        'name_en',
    ];

    public function blogs()
    {
        return $this->hasMany('App\Models\Blogs', 'category_blogs_id');
    }
}
