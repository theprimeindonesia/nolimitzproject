<?php

namespace App\Http\Controllers\API;

use App\Models\UlasanBlogs;
use App\Models\CategoryBlogs;
use App\Models\Blogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogsController extends Controller
{
    public function blogs()
    {
        $categoryBlogs = CategoryBlogs::all(); //get category blogs
        $blogs = Blogs::all(); //get blogs
        $latest = Blogs::orderBy('created_at', 'desc')->select('title_ind','title_en','url')->get(); //get latest blogs
        $blogsByCategory = CategoryBlogs::with('blogs')->get(); //get blogs by category

        $data[] = [
            "categoryblogs" => $categoryBlogs,
            "blogs" => $blogs,
            "latest" => $latest,
            "blogbybategory" => $blogsByCategory
        ];
        return $data;
    }

    public function categoryBlogs($id)
    {
        $categoryBlogs = CategoryBlogs::all(); //get category blogs
        $blogs = Blogs::whereHas('categoryblogs', function($q) use ($id){
            $q->where('category_blogs_id','=', $id);
        })->get(); //get blogs by category
        $latest = Blogs::orderBy('created_at', 'desc')->select('title_ind','title_en','url')->get(); //get latest blogs
        $data[] = [
            "categoryblogs" => $categoryBlogs,
            "blogs" => $blogs,
            "latest" => $latest
        ];
        return $data;
    }

    public function blogPost($url)
    {
        $blog = Blogs::where('url','=',$url)->get(); //get blog by url
        $blogid = $blog->pluck('blogs_id'); //get id blog
        $similar = $blog->pluck('category_blogs_id'); // get category blog
        $latest = Blogs::orderBy('created_at', 'desc')->select('title_ind','title_en','url')->get(); //get latest blog 
        $blogSimilar =  Blogs::whereHas('categoryblogs', function($q) use ($similar){
            $q->where('category_blogs_id','=', $similar);
        })->whereNotIn('blogs_id',$blogid)->orderBy('blogs_id', 'desc')->take(2)->get(); //get similar blog from blog post
        $ulasanBlogs = UlasanBlogs::where('blogs_id','=',$blogid)->with(['balasulasanblogs' => function($q){
            $q->orderBy('created_at','asc')->get();
        }])->orderBy('created_at', 'desc')->get();
        $data[] = [
            "blog" => $blog,
            "latest" => $latest,
            "blogsimilar" => $blogSimilar,
            "ulasanblogs" => $ulasanBlogs
        ];
        return $data;
    }
}
