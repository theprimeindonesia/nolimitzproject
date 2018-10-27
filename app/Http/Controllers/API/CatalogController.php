<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Blogs;

class CatalogController extends Controller
{
    public function index()
    {
        $blogs = Blogs::orderBy('created_at','desc')->take(4)->get();
        $products = Products::orderBy('created_at','desc')->get();
        $data[] = [
            "blogs" => $blogs,
            "products" => $products
        ];
        return $data;
    }

    public function filter(Request $request)
    {
        $products = new Products;

        if(isset($request->motor)):
            $products = $products->whereHas('productsmotor', function($q) use ($request) {$q->where('motor_id',$request->motor);});
        endif;

        if(isset($request->type)):
            $products =  $products->whereHas('productstype', function($q) use ($request) {$q->where('type_id', $request->type);});
        endif;

        if(isset($request->merk)):
            $products =  $products->whereHas('merk', function($q) use ($request) {$q->where('merk_id', $request->merk);});
        endif;

        if(isset($request->category)):
            $products =  $products->whereHas('categories', function($q) use ($request) {$q->where('categories_id', $request->category);});
        endif; 

        if(isset($request->price)):
           
        endif;

        //sort by 
        // if(isset($request->sortby)):
        //     if($request->sortby == "lowtohigh"):
        //         $products =  $products->orderBy('price')
        //     elseif($request->sortby == "popular"):
        //         $products =  $products->whereHas('productstype', function($q) use ($request) {$q->where('type_id', $request->type);});
        //     endif;    
        // endif;

        $products = $products->get();
        return $products;
    }    
}
