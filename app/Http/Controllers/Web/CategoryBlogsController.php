<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoryBlogs;
use App\Models\Blogs;

class CategoryBlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CategoryBlogs::all();   
        return view('category-blogs.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category-blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name_ind' => 'required',
            'name_en'  => 'required',
        ]);

        $data = new CategoryBlogs;
        $data->name_ind = $request->name_ind;
        $data->name_en  = $request->name_en;
        $data->save();

        return redirect()->route('category-blogs.index');
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
        $data = CategoryBlogs::find($id);
        return view('category-blogs.edit', compact('data'));
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
        $this->validate($request, [
            'name_ind' => 'required',
            'name_en'  => 'required',
        ]);

        $data = CategoryBlogs::find($id);
        $data->name_ind = $request->name_ind;
        $data->name_en  = $request->name_en;
        $data->save();

        return redirect()->route('category-blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogs  = Blogs::where('category_blogs_id', $id)->get();
        $cek    = $blogs->count();

        if($cek==0){
            $data = CategoryBlogs::find($id);
            $data->delete();
        }

        return redirect()->route('category-blogs.index');
    }
}
