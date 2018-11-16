<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\CategoryBlogs;
use File;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blogs::all();
        return view('blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryBlogs = CategoryBlogs::all();
        return view('blogs.create', compact('categoryBlogs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Blogs;

        if($request->hasFile('blogImages')){
            $data->images = $request->file('blogImages');
            $imageName    = time().'.'.$request->blogImages->getClientOriginalExtension();
            $data->images = 'images/blogs/'.$imageName;
            $request->blogImages->move(public_path('/images/blogs/'), $imageName);
        }

        $data->title_en          = '';
        $data->title_ind         = $request->title_ind;
        $data->article_en        = '';
        $data->article_ind       = $request->article_ind;
        $data->url               = '';
        $data->status            = 'active';
        $data->category_blogs_id = $request->category_blogs_id;

        $data->save();

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data          = Blogs::find($id);
        $categoryBlogs = CategoryBlogs::all();

        return view('blogs.edit', compact('categoryBlogs', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data      = Blogs::find($id);
        $oldImages = $request->oldImages;

        if($request->hasFile('blogImages')){
            $data->images = $request->file('blogImages');
            $imageName    = time().'.'.$request->blogImages->getClientOriginalExtension();
            $data->images = 'images/blogs/'.$imageName;

            $image_path = "public/".$oldImages;
            $delete     = File::delete($image_path);

            $request->blogImages->move(public_path('/images/blogs/'), $imageName);
        }else{
            $data->images = $oldImages;
        }

        $data->title_en          = '';
        $data->title_ind         = $request->title_ind;
        $data->article_en        = '';
        $data->article_ind       = $request->article_ind;
        $data->url               = '';
        $data->status            = 'active';
        $data->category_blogs_id = $request->category_blogs_id;

        $data->save();

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $data       = Blogs::find($id);
        $image_path = "public/".$data['images'];
        $delete     = File::delete($image_path);
        
        if($delete){
            $data->delete();
            return redirect()->route('blogs.index');
        }
    }
}
