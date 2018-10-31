<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Blogs;
use App\Models\Motor;
use App\Models\Merk;
use App\Models\Categories;
use DB;

class CatalogController extends Controller
{
    public function index()
    {
        $blogs = Blogs::orderBy('created_at','desc')->take(4)->get();
        $merk = Merk::all();
        $motor = Motor::all();
        $categories = Categories::all();
        $products = Products::
        leftJoin('ratings','products.products_id','=','ratings.products_id')
        ->leftJoin('stock','products.products_id','=','stock.products_id')
        ->leftJoin('images','stock.stock_id','=','images.stock_id')
        ->select('products.*','stock.price','images.image', DB::raw('FLOOR(AVG(ratings.rating)) as rating'))
        ->groupBy('products.products_id')
        ->orderBy('created_at','desc')
        ->withCount('comments')
        ->paginate(5);
        $data = [
            "blogs" => $blogs,
            "products" => $products,
            "categories" => $categories,
            "motor" => $motor,
            "merk" => $merk
        ];
        return $data;
    }

    public function filter(Request $request)
    {
        $products = Products::
        leftJoin('ratings','products.products_id','=','ratings.products_id')
        ->leftJoin('stock','products.products_id','=','stock.products_id')
        ->leftJoin('images','stock.stock_id','=','images.stock_id')
        ->select('products.*','stock.*','images.image', DB::raw('FLOOR(AVG(ratings.rating)) as rating'))
        ->groupBy('products.products_id')
        ->withCount('comments');

        if(isset($request->motor)):
            $products = $products
            ->leftJoin('products_motor', 'products.products_id','=','products_motor.products_id')
            ->where('products_motor.motor_id', $request->motor);
        endif;

        if(isset($request->type)):
            $products = $products
            ->leftJoin('products_type', 'products.products_id','=','products_type.products_id')
            ->where('products_type.type_id', $request->type);
        endif;

        if(isset($request->merk)):
            $products = $products
            ->leftJoin('merk', 'products.merk_id','=','products.merk_id')
            ->where('products.merk_id', $request->merk);
        endif;

        if(isset($request->category)):
            $products = $products
            ->leftJoin('categories', 'products.categories_id','=','products.categories_id')
            ->where('products.categories_id', $request->category);
        endif; 

        if(isset($request->star0)):
            $products = $products
            ->having(DB::raw('FLOOR(AVG(ratings.rating))'), '0');
        endif;

        if(isset($request->star1)):
            $products = $products
            ->having(DB::raw('FLOOR(AVG(ratings.rating))'), '1');
        endif;

        if(isset($request->star2)):
            $products = $products
            ->having(DB::raw('FLOOR(AVG(ratings.rating))'), '2');
        endif;

        if(isset($request->star3)):
            $products = $products
            ->having(DB::raw('FLOOR(AVG(ratings.rating))'), '3');
        endif;

        if(isset($request->star4)):
            $products = $products
            ->having(DB::raw('FLOOR(AVG(ratings.rating))'), '4');
        endif;

        if(isset($request->star5)):
            $products = $products
            ->having(DB::raw('FLOOR(AVG(ratings.rating))'), '5');
        endif;

        if(isset($request->price)):
            $products = $products
            ->whereBetween('stock.price',array($request->pricefrom,$request->priceto));
        endif;

        if(isset($request->sort)):
            if($request->sort=="lowtohigh"):
                $products = $products
                ->orderBy('stock.price','asc');
            elseif($request->sort=="hightolow"):
                $products = $products
                ->orderBy('stock.price','desc');
            endif;
        endif;

        $products = $products->paginate(5);
        return $products;
    }    
}
