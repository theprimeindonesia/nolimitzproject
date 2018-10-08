<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\Type;
Use App\Models\Motor;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Type::with('motor')->get();
        return  view('type.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motor = Motor::all();
        return view('type.create',compact('motor'));
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
            'motor_id' => 'required',
        ]);
        $input = $request->all();
        $data = Type::create($input);

        return redirect()->route('type.index')
                ->with('success','Type created successfully');
        
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
        $motor = Motor::all();
        $data = Type::find($id);
        return view('type.edit',compact('data','motor'));
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
            'motor_id' => 'required',
        ]);
        $input = $request->all();
        $data = Type::find($id);
        $data->update($input);

        return redirect()->route('type.index')
                ->with('success','Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Merk::find($id);
        $image_path = "images/categories/".$data['image'];
        $delete = File::delete($image_path);
        if($delete){
            $data->delete();
	        return redirect()->route('merk.index')
					   ->with('success','Merk deleted successfully');
        }
    }
}
