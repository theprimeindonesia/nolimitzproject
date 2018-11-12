<?php

namespace App\Http\Controllers\API;

use App\Models\UlasanBlogs;
use App\Models\CategoryBlogs;
use App\Models\Blogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs         = Blogs::getDataBlog()->paginate(8);
        $category      = CategoryBlogs::select('category_blogs_id','name_ind','name_en')->get();
        $latest_blog   = Blogs::getLatestBlog()->paginate(5);

        $result[] = [
            "blogs"         => $blogs,
            "category"      => $category,
            "latest_blog"   => $latest_blog
        ];
        return $result;
    }

    public function getBlogCategory($category_id)
    {
        $blogs         = Blogs::getBlogByCategory($category_id)->paginate(8);
        $category      = CategoryBlogs::select('category_blogs_id','name_ind','name_en')->get();
        $latest_blog   = Blogs::getLatestBlog()->paginate(5);

        $result[] = [
            "blogs"         => $blogs,
            "category"      => $category,
            "latest_blog"   => $latest_blog
        ];
        return $result;
    }

    public function getBlogUrl($url)
    {
        $post         = Blogs::where('url','=',$url)->get();
        $id           = $post->pluck('blogs_id');
        $related      = $post->pluck('category_blogs_id');
        $related_post = Blogs::whereHas('categoryblogs', function ($query) use ($related){
            $query->where('category_blogs_id','=',$related);
        })->whereNotIn('blogs_id',$id)->orderBy('blogs_id','desc')->take(4)->get();
        $category      = CategoryBlogs::select('category_blogs_id','name_ind','name_en')->get();
        $latest_blog   = Blogs::getLatestBlog()->paginate(5);
        $ulasan_post   = UlasanBlogs::where('blogs_id','=',$id)->with(['balasulasanblogs' => function($query){
            $query->orderBy('created_at','asc')->get();
        }])->orderBy('created_at', 'desc')->get();

        $result[] = [
            "post"         => $post,
            "related_post" => $related_post,
            "category"     => $category,
            "latest_blog"  => $latest_blog,
            "ulasan"       => $ulasan_post
        ];
        return $result;
    }
}
