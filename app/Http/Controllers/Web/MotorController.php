<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\Motor;
use Ramsey\Uuid\Uuid;
Use File;

class MotorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Motor::all();
        return view('motor.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('motor.create');
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
        $data = new Motor();
        $data->name = $request['name'];
        if(!is_null($request->file('images'))){            
          
            $file       = $request->file('images');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = "motor-".$image_uuid.".$ext";
            $upload_path ='images/motor';
            $request->file('images')->move($upload_path, $fileName);
            $data->image = $fileName;      
          }
        $data->save();

        return redirect()->route('motor.index');
        
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
        $data = Motor::find($id);
        return view('motor.edit',compact('data'));
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
        $data =  Motor::find($id);
        $data->name = $request['name'];
        if(!is_null($request->file('images'))){            
          
            $file       = $request->file('images');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = "motor-".$image_uuid.".$ext";
            $upload_path ='images/motor';
            $request->file('images')->move($upload_path, $fileName);
            $data->image = $fileName;      
          }
        $data->update();

        return redirect()->route('motor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Motor::find($id);
        $image_path = "images/motor/".$data['image'];
        $delete = File::delete($image_path);
        if($delete){
            $data->delete();
	        return redirect()->route('motor.index')
					   ->with('success','Motor deleted successfully');
        }
    }
}
