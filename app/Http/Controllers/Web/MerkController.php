<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merk;
use Ramsey\Uuid\Uuid;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $merk = Merk::all();
        return view('merk.index',compact('merk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merk.create');
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
            'name' => 'required',
            'images' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        $image_uuid = Uuid::Uuid4();
        $merk = new Merk();
        $merk->name = $request['name'];
        if(!is_null($request->file('images'))){            
          
            $file       = $request->file('images');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = "merk-".$image_uuid.".$ext";
            $upload_path ='images/merk';
            $request->file('images')->move($upload_path, $fileName);
            $merk->image = $fileName;      
          }
        $merk->save();

        return redirect()->route('merk.index');
        
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
        $data = Merk::find($id);
        return view('merk.edit',compact('data'));
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
            'name' => 'required',
            'images' => 'image|mimes:jpg,jpeg,png',
        ]);

        $image_uuid = Uuid::Uuid4();
        $merk =  Merk::find($id);
        $merk->name = $request['name'];
        if(!is_null($request->file('images'))){            
          
            $file       = $request->file('images');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = "merk-".$image_uuid.".$ext";
            $upload_path ='images/merk';
            $request->file('images')->move($upload_path, $fileName);
            $merk->image = $fileName;      
          }
        $merk->update();

        return redirect()->route('merk.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Merk::find($id)->delete();
	   return redirect()->route('merk.index')
					   ->with('success','User deleted successfully');
    }
}
