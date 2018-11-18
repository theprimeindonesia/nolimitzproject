<?php

namespace App\Models;

use App\Traits\UuidForKey;
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

    public static function generateUrl($title)
    {
        $tandaText = array(
                    'spasi'=>" ",
                    'koma'=>",",
                    'tandatanya'=>"?",
                    'tandaseru'=>"!",
                    'titikkoma'=>";",
                    'titikdua'=>":",
                    'kutipsatu'=>"'",
                    'dan'=>"&",
                    'at'=>"@",
                    'hashtag'=>"#",
                    'persen'=>"%",
                    'bintang'=>"*",
                    'dollar'=>"$",
                    "kurungbuka"=>"(",
                    "kurungtutup"=>")",
                    "kurungkurawalbuka"=>"{",
                    "kurungkurawaltutup"=>"}",
                    "atau"=>"/",
                    "titik"=>".",
                    "kurungsikubuka"=>"<",
                    "kurungsikututup"=>">",
                    "panahatas"=>"^",
                    "plus"=>"+",
                    "minus"=>"-",
                    "kurung["=>"[",
                    "kurung]"=>"]",
                );

        return str_replace($tandaText,"-", $title);
    }
}
