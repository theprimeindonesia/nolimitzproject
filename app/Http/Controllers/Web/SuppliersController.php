<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Addresses;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Suppliers::with('addresses')->get();
        return view('suppliers.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            'contact' => 'required',
        ]);

        $input = $request->all();
        $addresses  = Addresses::create($input);

        $suppliers = new Suppliers;
        $suppliers->name = $input['name'];
        $suppliers->contact = $input['contact'];
        $suppliers->contact_sales = $input['contact_sales'];
        $addresses->suppliers()->save($suppliers);

        return redirect()->route('suppliers.index')
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
        $data = Suppliers::with('addresses')->find($id);
        return view('suppliers.edit',compact('data'));
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
            'contact' => 'required',
        ]);

      

        $suppliers = Suppliers::find($id);
        $suppliers->name = $request['name'];
        $suppliers->contact = $request['contact'];
        $suppliers->contact_sales = $request['contact_sales'];
        $suppliers->update();
        $addresses_id = $suppliers['addresses_id'];
        $addresses  = Addresses::find($addresses_id);
        $addresses->city = $request['city'];
        $addresses->subdistrict = $request['subdistrict'];
        $addresses->province = $request['province'];
        $addresses->detail = $request['detail'];
        $addresses->update();

        return redirect()->route('suppliers.index')
        ->with('success','Suppliers updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Suppliers::find($id);
        $addresses_id =  $data->addresses_id;
        $data->delete();
        $address = Addresses::find($addresses_id);
        $address->delete();

            return redirect()->route('suppliers.index')
            ->with('success','Suppliers updated successfully');
       
    }
}
