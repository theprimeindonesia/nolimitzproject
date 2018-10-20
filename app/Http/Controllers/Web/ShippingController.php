<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Expeditions;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Orders::with('members')->orderBy('created_at')->get();
        $expeditions = Expeditions::all();
        return view('shipping.index',compact('data','expeditions'));
    }

    public function label($id)
    {
        $data = Orders::with('members','memberaddresses.addresses')->find($id);
        $data->status ="DELIVERING";
        $data->update();
        return view('shipping.label',compact('data'));
    }

    public function resi(Request $request)
    {
        $id = $request['orders_id'];
        $data = Orders::find($id);
        $data->resi = $request['resi'];
        $data->expeditions_id = $request['expeditions_id'];
        $data->update();
        return back();
    }

    public function detail($id)
    {
        $data = Orders::with('members','orderdetails.stock.products','orderdetails.stock.varians','memberaddresses.addresses','payments','expeditions')->orderBy('created_at')->find($id);
        //return $data;
        return view('shipping.detail',compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
