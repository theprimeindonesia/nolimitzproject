<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use Ramsey\Uuid\Uuid;
use File;

class CategoriesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Categories::all();
        return view('categories.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
            'name_en' => 'required',
            'images' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $image_uuid = Uuid::Uuid4();
        $data = new Categories();
        $data->name_ind = $request['name_ind'];
        $data->name_en = $request['name_en'];
        if(!is_null($request->file('images'))){            
          
            $file       = $request->file('images');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = "cat-".$image_uuid.".$ext";
            $upload_path ='public/images/categories';
            $request->file('images')->move($upload_path, $fileName);
            $data->images = $fileName;      
          }
        $data->save();

        return redirect()->route('categories.index');
        
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
        $data = Categories::find($id);
        return view('categories.edit',compact('data'));
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
            'name_en' => 'required',
            'images' => 'image|mimes:jpg,jpeg,png',
        ]);


        $image_uuid = Uuid::Uuid4();
        $data =  Categories::find($id);
        $data->name_ind = $request['name_ind'];
        $data->name_en = $request['name_en'];
        if(!is_null($request->file('images'))){            
          
            $file       = $request->file('images');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = "cat-".$image_uuid.".$ext";
            $upload_path ='public/images/categories';
            $request->file('images')->move($upload_path, $fileName);
            $data->images = $fileName;      
          }
        $data->update();

        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Categories::find($id);
        $image_path = "public/images/categories/".$data['images'];
        $delete = File::delete($image_path);
        if($delete){
            $data->delete();
	        return redirect()->route('categories.index')
					   ->with('success','User deleted successfully');
        }
            
    }
}
