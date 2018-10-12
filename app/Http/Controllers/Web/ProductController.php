<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\Products;
Use App\Models\ProductsFeature;
Use App\Models\ProductsType;
Use App\Models\ProductsMotor;
Use App\Models\Categories;
Use App\Models\Merk;
Use App\Models\Motor;
Use App\Models\Type;
Use App\Models\Uom;
Use App\Models\Stock;
Use App\Models\Varians;
Use App\Models\Images;
Use File;
use Ramsey\Uuid\Uuid;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Products::with('stock','stock.images','stock.varians','categories')->get();
        return view('product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = Type::all();
        $motor = Motor::all();
        $category = Categories::all();
        $uom = Uom::all();
        $merk = Merk::all();
        return view('product.create',compact('type','motor','category','uom','merk'));
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
            'categories_id' => 'required',
            'merk_id' => 'required',
            'motor_id' => 'required',
            'type_id' => 'required',
        ]);
        $input = $request->all();
        $product = Products::create($input);

        $feature = $input['feature'];
        $featureData = explode(",",$feature);
        
        foreach($featureData as $fd){
            $productsfeature = new ProductsFeature;
            $productsfeature->value = $fd;
            $product->productsfeature()->save($productsfeature);
        }

        $type = $input['type_id'];
        foreach($type as $td){
            $productstype = new ProductsType;
            $productstype->type_id = $td;
            $product->productstype()->save($productstype);
        }

        $motor = $input['motor_id'];
        foreach($motor as $md){
            $productsmotor = new ProductsMotor;
            $productsmotor->motor_id = $md;
            $product->productsmotor()->save($productsmotor);
        }
        
        $switch = $request['switch'];
        if($switch === "Y"){
            $array = $request['array_varian'];
            $data = json_decode($array,true);

            foreach($data as $x){
                $stock = new Stock;
                $stock->barcode = $x['barcode'];
                $stock->price = $x['price'];
                $stock->sku = $x['sku'];
                $stock->stock = $x['stock'];
                $stock->weight = $x['weight'];
                $stock->length = $x['length'];
                $stock->width = $x['width'];
                $stock->height = $x['height'];
                $stock->primary = $x['primary'];
                $stock->secondary = $x['secondary'];
                $stock->uom_id = $x['uom'];
                $product->stock()->save($stock);
                foreach($x['varians'] as $v){
                    $varian = new Varians;
                    $varian->name = $v['name'];
                    $varian->value = $v['value'];
                    $stock->varians()->save($varian);
                }

                $imageData = $x['image'];
                @list($type, $imageData) = explode(';', $imageData);
                @list(, $imageData) = explode(',', $imageData); 
                $imageName = Uuid::Uuid4().'.'.'png';
                File::put(public_path().'/images/product/' . $imageName, base64_decode($imageData));
                $images = new Images;
                $images->image = $imageName;
                $stock->images()->save($images);
            }
        }else{
            $stock = new Stock;
            $stock->barcode = $input['barcode'];
            $stock->price = $input['price'];
            $stock->sku = $input['sku'];
            $stock->stock = $input['stock'];
            $stock->weight = $input['weight'];
            $stock->length = $input['length'];
            $stock->width = $input['width'];
            $stock->height = $input['height'];
            $stock->primary = $input['primary'];
            $stock->secondary = $input['secondary'];
            $stock->uom_id = $input['uom_id'];
            $product->stock()->save($stock);

            $imageData = $input['image_single'];
            @list($type, $imageData) = explode(';', $imageData);
            @list(, $imageData) = explode(',', $imageData); 
            $imageName = Uuid::Uuid4().'.'.'png';
            File::put(public_path().'/images/product/' . $imageName, base64_decode($imageData));
            $images = new Images;
            $images->image = $imageName;
            $stock->images()->save($images);
            //return $imageData;
        }
        return redirect()->route('product.index')
            ->with('success','Product created successfully');
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
