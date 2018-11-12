<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;
use DB;

class Blogs extends Model
{
    use UuidForKey;

    protected $table = 'blogs';
    protected $primaryKey = 'blogs_id';
    protected $fillable = [
        'blogs_id',
        'title_ind',
        'title_en',
        'url',
        'images',
        'article_ind',
        'article_en',
        'status',
        'category_blogs_id',
    ];

    public function ulasanblogs()
    {
        return $this->hasMany('App\Models\UlasanBlogs', 'blogs_id');
    }

    public function categoryblogs()
    {
        return $this->belongsTo('App\Models\CategoryBlogs','category_blogs_id');
    }

    /************************* VIEW TABLE BLOG API ************************/
    public static function getDataBlog()
    {
        $blogs = DB::table('v_blogs')
                  ->where('status','active')
                  ->orderBy('id');
        return $blogs;

    }

    public static function getLatestBlog()
    {
        $blogs = DB::table('v_blogs')
                  ->where('status','active')
                  ->select('title_ind','title_en','url')
                  ->orderBy('created_at','desc');
        return $blogs;

    }

    public static function getBlogByCategory($category_id)
    {
        $blogs = DB::table('v_blogs')
                  ->where('status','active')
                  ->where('category_id',$category_id);
        return $blogs;
        
    }

}
