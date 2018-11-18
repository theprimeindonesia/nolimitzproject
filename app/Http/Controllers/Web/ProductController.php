<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Models\Products;
Use App\Models\ProductsFeature;
Use App\Models\ProductsVarians;
Use App\Models\ProductsType;
Use App\Models\ProductsMotor;
Use App\Models\Categories;
Use App\Models\Merk;
Use App\Models\Motor;
Use App\Models\Type;
Use App\Models\Uom;
Use App\Models\Stock;
Use App\Models\StockLog;
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
    
    public function addvarian(Request $request,$id)
    {
        $this->validate($request, [
            'varian' => 'required',
        ]);
        $varian = $request['varian'];
        $varianData = explode(",",$varian);
        
        foreach($varianData as $fd){
            $varians              = new ProductsVarians;
            $varians->name        = $fd;
            $varians->products_id = $id;
            $varians->save();
        }
        return back();
    }
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

        $variansvalue = $input['variansvalue'];
        $variansvalueData = explode(",",$variansvalue);
        
        foreach($variansvalueData as $vd){
            $productsvarian = new ProductsVarians;
            $productsvarian->name = $vd;
            $product->productsvarians()->save($productsvarian);
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
                $stock->buy_price = $x['buyPrice'];
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
                $stocklog = new StockLog;
                $stocklog->qty = $x['stock'];
                $stocklog->stock()->associate($stock);
                $stocklog->description = "PRODUCT MASTER";
                $stocklog->save();

                $images = new Images;
                if($x['image']!=""){
                    $imageData = $x['image'];
                    @list($type, $imageData) = explode(';', $imageData);
                    @list(, $imageData) = explode(',', $imageData); 
                    $imageName = Uuid::Uuid4().'.'.'png';
                    File::put(public_path().'/images/product/' . $imageName, base64_decode($imageData));
                    $images->image = $imageName;
                }else{
                    $images->image = "no-image.png";
                }


                $stock->images()->save($images);
            }
        }else{
            $stock = new Stock;
            $stock->barcode = $input['barcode'];
            $stock->price = $input['price'];
            $stock->buy_price = $input['buyPrice'];
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

            $stocklog = new StockLog;
            $stocklog->qty = $input['stock'];
            $stocklog->stock()->associate($stock);
            $stocklog->description = "PRODUCT MASTER";
            $stocklog->save();

            $images = new Images;
            if(isset($input['image_single'])){
                $imageData = $input['image_single'];
                @list($type, $imageData) = explode(';', $imageData);
                @list(, $imageData) = explode(',', $imageData); 
                $imageName = Uuid::Uuid4().'.'.'png';
                File::put(public_path().'/images/product/' . $imageName, base64_decode($imageData)); 
                $images->image = $imageName;
            }else{
                $images->image = "no-image.png";
            }

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
    public function detail($id)
    {
        $data = Products::with('categories','stock','stock.varians.stock','productsfeature','productsmotor.motor','productstype.type','stock.images')->find($id);
        $stock = Stock::where('products_id', $id)->first();
        return view('product.detail',compact('data', 'stock'));
    }

    public function edit($id)
    {
        $type = Type::all();
        $motor = Motor::all();
        $category = Categories::all();
        $uom = Uom::all();
        $merk = Merk::all();
        $data = Products::with('categories','stock','productsfeature','productsmotor.motor','productstype.type','stock.images')->find($id);
        return view('product.edit',compact('data','type','motor','category','uom','merk'));
    }

    public function varianedit($id)
    {
        $uom = Uom::all();
        $data = Stock::with('varians','images')->find($id);
        return view('product.varianedit',compact('data','uom'));
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
            'categories_id' => 'required',
            'merk_id' => 'required',
            'motor_id' => 'required',
            'type_id' => 'required',
        ]);
        $input = $request->all();
        $product = Products::find($id);
        $product->update($input);
        
        
        $type = ProductsType::where('products_id',$id)->delete();
        $motor = ProductsMotor::where('products_id',$id)->delete();
        $feature = ProductsFeature::where('products_id',$id)->delete();
        
        $featureInput = $input['feature'];
        $featureUpdate = explode(",",$featureInput);
        
        foreach($featureUpdate as $fd){
            $productsfeature = new ProductsFeature;
            $productsfeature->value = $fd;
            $productsfeature->products_id = $id;
            $productsfeature->save();
        }

        $typeInput = $input['type_id'];
        foreach($typeInput as $td){
            $productstype = new ProductsType;
            $productstype->type_id = $td;
            $productstype->products_id = $id;
            $productstype->save();
        }

        $motorInput = $input['motor_id'];
        foreach($motorInput as $md){
            $productsmotor = new ProductsMotor;
            $productsmotor->motor_id = $md;
            $productsmotor->products_id = $id;
            $productsmotor->save();
        }
        return redirect()->route('product.detail',$id)
            ->with('success','Product updated successfully');

    }
    public function varianadd($id)
    {
        $id = $id;
        $uom = Uom::all();
        $data = Stock::with('varians')->where('products_id',$id)->first();
        return view('product.varianadd',compact('id','uom','data'));
    }
    public function variandelete(Request $request, $id)
    {
        $product = Stock::find($id);
        $products_id = $product->products_id;
        $data = Stock::find($id)->delete();

        return redirect()->route('product.detail',$products_id)
                            ->with('success','Product updated successfully');
    }
    public function variansave(Request $request, $id)
    {
        $this->validate($request, [
            'array_varian' => 'required',
            'sku' => 'required',
            'barcode' => 'required',
            'price' => 'required',
            'primary' => 'required',
            'secondary' => 'required',
        ]);
        $product = Stock::find($id);
        $products_id = $product->products_id;
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
            $stock->products_id = $x['id'];
            $stock->save();
            foreach($x['varians'] as $v){
                $varian = new Varians;
                $varian->name = $v['name'];
                $varian->value = $v['value'];
                $stock->varians()->save($varian);
            }

            
            $imageData = $x['image'];
            if(!empty($imageData)){
                @list($type, $imageData) = explode(';', $imageData);
                @list(, $imageData) = explode(',', $imageData); 
                $imageName = Uuid::Uuid4().'.'.'png';
                File::put(public_path().'/images/product/' . $imageName, base64_decode($imageData));
                $images = new Images;
                $images->image = $imageName;
                $images->stock_id = $x['id'];
                $images->save();
            }
         
        }
        return redirect()->route('product.detail',$products_id)
        ->with('success','Product updated successfully');
    }
    public function varianupdate(Request $request, $id)
    {
        $this->validate($request, [
            'array_varian' => 'required',
            'sku' => 'required',
            'barcode' => 'required',
            'price' => 'required',
            'primary' => 'required',
            'secondary' => 'required',
        ]);
        $array = $request['array_varian'];
        $data = json_decode($array,true);
        $product = Stock::find($id);
        $products_id = $product->products_id;
        foreach($data as $x){
            $stock_id = $x['id'];
            $stock = Stock::find($stock_id);
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
            $stock->update();
            foreach($x['varians'] as $v)
            {
                $varian_id = $v['varians_id'];
                $varian = Varians::find($varian_id);
                $varian->name = $v['name'];
                $varian->value = $v['value'];
                $varian->update();
            }

            
            $imageData = $x['image'];
            if(!empty($imageData)){
                @list($type, $imageData) = explode(';', $imageData);
                @list(, $imageData) = explode(',', $imageData); 
                $imageName = Uuid::Uuid4().'.'.'png';
                File::put(public_path().'/images/product/' . $imageName, base64_decode($imageData));
                $images = new Images;
                $images->image = $imageName;
                $images->stock_id = $x['id'];
                $images->save();
            }
         
        }
        return redirect()->route('product.detail',$products_id)
        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $data = Products::find($id)->delete();
        return back();
    }
}
