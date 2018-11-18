<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Po;
use App\Models\PoDetails;
use App\Models\Stock;
use App\Models\StockLog;
use App\Models\Product;
use App\Models\Varians;
use App\Models\Suppliers;
use App\Models\ReturPo;
use App\Models\ReturPoDetails;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Po::with('podetails','podetails.stock','podetails.stock.products','suppliers')->get();
        return view('purchase.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stock = Stock::with('products','varians','images')->get();
        $suppliers = Suppliers::all();
        return view('purchase.create',compact('stock','suppliers'));
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
            'no_po' => 'required',
            'suppliers_id' => 'required',
        ]);
        $input                  = $request->all();
        $purchase               = new Po;
        $purchase->no_po        = $input['no_po'];
        $purchase->total        = $input['total'];
        $purchase->grand_total  = $input['total'];
        $purchase->status       = "PO";
        $purchase->suppliers_id = $input['suppliers_id'];
        $purchase->save();

        $array = $request['array_stock'];
        $data = json_decode($array,true);

        foreach($data as $x){
            $podet           = new PoDetails;
            $podet->qty      = $x['qty'];
            $podet->price    = $x['price'];
            $podet->total    = $x['qty'] * $x['price'];
            $podet->stock_id = $x['stock'];
            $purchase->podetails()->save($podet);
        }
        return redirect()->route('purchase.index');
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
    public function received($id)
    {
        $stock = Stock::with('products','varians','images')->get();
        $suppliers = Suppliers::all();
        $data = Po::with('podetails','podetails.stock.products','suppliers.addresses','podetails.stock.varians')->find($id);
        if($data['status'] === 'PO'){
            return view('purchase.received',compact('data','stock','suppliers'));
        }else{
            return back();
        }
    }
    public function detail($id)
    {
        $data = Po::with('podetails','podetails.stock.products','suppliers.addresses','podetails.stock.varians','returpo.returpodetails.stock.products','returpo.returpodetails.stock.varians')->find($id);
        return view('purchase.detail',compact('data'));
    }

    public function return($id)
    {
        $stock = Stock::with('products','varians','images')->get();
        $suppliers = Suppliers::all();
        $data = Po::with('podetails','podetails.stock.products','suppliers.addresses','podetails.stock.varians')->find($id);
        if($data['status'] === 'RECEIVED'){
            return view('purchase.return',compact('data','stock','suppliers'));
        }else{
            return back();
        }
    }

    public function returnupdate(Request $request,$id)
    {
        $input = $request->all();
        $return = ReturPo::create($input);

        $data = [];
        foreach ($request['data'] as $field => $values) {
            foreach ($values as $index => $value) {
                $data[$index][$field] = $value;
            }
        }
        foreach($data as $x){
            if($x['qty'] > 0){
                $stock_id = $x['stock_id'];
                $returpodetails = new ReturPoDetails;
                $returpodetails->qty = $x['qty'];
                $returpodetails->stock_id = $x['stock_id'];
                $return->returpodetails()->save($returpodetails);

                $stocklog = new StockLog;
                $stocklog->qty = $x['qty'] * -1;
                $stocklog->stock_id = $x['stock_id'];
                $return->stocklog()->save($stocklog);

                $stock = Stock::find($stock_id);
                $qty = $stock->stock;
                $stock->stock = $qty - $x['qty'];
                $stock->update();
            }
        }
        return redirect()->route('purchase.detail',$id);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function podet(Request $request, $id)
    {
        $podet = new PoDetails();
        $podet->qty = $request['qty'];
        $podet->stock_id = $request['stock_id'];
        $podet->price = $request['price'];
        $podet->total = $request['price'] * $request['qty'];
        $podet->po_id = $id;
        $podet->save();

        $podet_total = $request['price'] * $request['qty'];
        $po = Po::find($id);
        $discount = $po['discount'];
        $grand = $po['grand_total'];
        $total = $po['total'];
        $po->total = $total + $podet_total;
        $grandx = $total + $podet_total;
        $po->grand_total = $grandx - $discount;
        $po->update();


        return back();
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_po' => 'required',
            'suppliers_id' => 'required',
        ]);

        $po = Po::find($id);
        $po->total = $request['total'];
        $po->discount = $request['discon'];
        $po->grand_total = $request['grand_total'];
        $po->status = 'RECEIVED';
        $po->update();
        
        $data = [];
        foreach ($request['data'] as $field => $values) {
            foreach ($values as $index => $value) {
                $data[$index][$field] = $value;
            }
        }
        foreach($data as $x){
            $po_details_id = $x['po_details_id'];
            $podet = PoDetails::find($po_details_id);
            $podet->qty = $x['qty'];
            $podet->price = $x['price'];
            $podet->total = $x['qty'] * $x['price'];
            $podet->update(); 
            if($x['qty'] > 0){
                $stock_id = $x['stock_id'];
                $stock_log = new StockLog;
                $stock_log->qty = $x['qty'];
                $stock_log->stock_id = $x['stock_id'];
                $stock_log->po_id = $id;
                $stock_log->save();

                $stock = Stock::find($stock_id);
                $qty = $stock->stock;
                $stock->stock = $qty + $x['qty'];
                $stock->update();
            }
        }

        
        return redirect()->route('purchase.detail',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function po($id)
    {
        $data = Po::with('podetails','podetails.stock.products','suppliers.addresses','podetails.stock.varians','returpo.returpodetails.stock.products','returpo.returpodetails.stock.varians')->find($id);
        return view('purchase.po',compact('data'));
    }
    public function destroy($id)
    {
        //
    }
}
