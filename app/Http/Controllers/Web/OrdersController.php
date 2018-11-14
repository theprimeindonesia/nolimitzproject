<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\StockLog;
use App\Models\ReturOrders;
use App\Models\Orders;
use App\Models\Referrals;
use App\Models\OrderDetails;
use App\Models\OrderDelivery;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Orders::with('members')->orderBy('created_at')->get();
        $retur = ReturOrders::all();
        return view('orders.index',compact('data','retur'));
    }   

    public function detail($id)
    {
        $data = Orders::with('members','orderdetails.stock.products','orderdetails.stock.varians','memberaddresses.addresses','payments','expeditions')->orderBy('created_at')->find($id);
        //return $data;
        return view('orders.detail',compact('data'));
    }   
    public function paid($id)
    {
        $order = Orders::with('orderdetails')->find($id);
        $order->status = "PAID";
        $order->update();

        foreach($order['orderdetails'] as $x){
            $stock_id = $x['stock_id'];
            $stock = Stock::find($stock_id);
            $qty = $stock->stock;
            $sum = $qty - $x['qty'];
            $stock->stock = $sum;
            $stock->update();

            $stock_log = new StockLog;
            $stock_log->qty = $x['qty']*-1;
            $stock_log->stock_id = $x['stock_id'];
            $stock_log->orders_id = $x['orders_id'];
            $stock_log->save();
        }

        $members_id = $order->members_id;

        $found = false;
        $array = array();
        while(!$found){
            $refferal = Refferals::where('members_b_id',$members_id)->pluck('members_a_id');
           if($refferal === null){
            $found = true;
           }else{
            $array[] =  [
                $refferal,
           ];
           $found = false;
           }
        }
        
        
        return $array;
    }

    public function return()
    {
        $data = ReturOrders::with('orders.members')->get();
        return view('orders.retur.index',compact('data'));
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


    public function cek()
    {
       
        $members_id = "636c4401-eec5-4e9b-b774-b142d72a7aeb";

        $found = false;
        $array = array();
        while($found !== true){
            $refferal = Referrals::where('members_b_id', $members_id)->first();
            $members_a_id = $refferal['members_a_id'];
            $members_id = $members_a_id;
           if(empty($members_a_id)){
                $found = true;
           }else{
                $array[] =  [
                    $members_a_id,
                ];
                $found = false;
           }
        }
        
        
        return $array;
    }
}
