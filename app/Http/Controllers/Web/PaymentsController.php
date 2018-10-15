<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payments;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Payments::all();
        return view('payments.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payments.create');
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
            'no_account' => 'required',
        ]);

        $input = $request->all();
        $payments = Payments::create($input);

        if(!is_null($request->file('images'))){            
          
            $file       = $request->file('images');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = $file->getClientOriginalName();
            $upload_path ='public/images/payments';
            $request->file('images')->move($upload_path, $fileName);
          }

        return redirect()->route('payments.index');
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
        $data = Payments::find($id);
        return view('payments.edit',compact('data'));
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
            'no_account' => 'required',
        ]);

        $input = $request->all();
        $payments = Payments::find($id);
        $payments->update($input);
        if(!is_null($request->file('image'))){            
          
            $file       = $request->file('image');
            $ext        = $file->getClientOriginalExtension();
            $fileName   = $file->getClientOriginalName();
            $upload_path ='public/images/payments';
            $request->file('image')->move($upload_path, $fileName);
          }
        return redirect()->route('payments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Payments::find($id)->delete();
        return redirect()->route('payments.index');
    }
}
