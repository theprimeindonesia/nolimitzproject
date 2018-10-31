<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expeditions;
use App\Models\Blogs;
use App\Models\Products;
use App\Models\Members;
use App\Models\Ulasan;
use App\Models\Varians;
use DB;
class ProductsController extends Controller
{
    public function index($products_id)
    {
        $expeditions = Expeditions::all();
        $blogs = Blogs::orderBy('created_at','desc')->take(4)->get();
        $products = Products::
        leftJoin('ratings','products.products_id','=','ratings.products_id')
        ->select('products.*', DB::raw('FLOOR(AVG(ratings.rating)) as rating'))
        ->where('products.products_id', $products_id)
        ->groupBy('products.products_id')
        ->with('stock.images')
        ->get();
        $varians = Varians::
        leftJoin('stock', 'stock.stock_id', '=', 'varians.stock_id')
        ->leftJoin('products', 'stock.products_id','=','products.products_id')
        ->select('varians.*','stock.stock_id')
        ->where('products.products_id', $products_id)
        ->get();
        $getcategory = Products::where('products_id',$products_id)->pluck('categories_id');
        $similarproduct = Products::
        leftJoin('stock','products.products_id','=','stock.products_id')
        ->leftJoin('ratings','products.products_id','=','ratings.products_id')
        ->leftJoin('images','stock.stock_id','=','images.stock_id')
        ->select('products.*','stock.price','images.image', DB::raw('FLOOR(AVG(ratings.rating)) as rating'))
        ->where('categories_id', $getcategory)
        ->where('products.products_id','<>' ,$products_id)
        ->orderBy('created_at','desc')
        ->groupBy('products.products_id')
        ->take(8)
        ->get();
        $review = Members::
        leftJoin('comments', 'comments.members_id','=', 'members.members_id')
        ->leftJoin('ratings', 'ratings.members_id','=', 'members.members_id')
        ->select('comments.*', 'members.firstname', 'members.lastname', DB::raw('FLOOR(AVG(ratings.rating)) as rating'))
        ->groupBy('members.members_id')
        ->Where('comments.products_id', $products_id)
        ->orWhere('ratings.products_id', $products_id)
        ->paginate(5);
        $ulasan = Ulasan::whereHas('products', function($q) use ($products_id) {$q->where('products_id', $products_id);})->where('status', 'show')->with(['balasulasan' => 
        function($q){
            $q->where('status', 'show');
        }, 'members', 'balasulasan.members'])->paginate(5);
        $data = [
            "products" => $products,
            "expeditions" => $expeditions,
            "blogs" => $blogs,
            "similarproduct" => $similarproduct,
            "review" => $review,
            "varians" => $varians,
            "ulasan" => $ulasan
        ];
        return $data;
    }

    public function createulasanproducts(Request $request, $products_id)
    {
        $data = $request->validate([
            "pesan" => "required|string",
        ]);

        $ulasan = new Ulasan; 
        $ulasan->pesan = $request->pesan; //set ulasan blogs pesan
        $ulasan->status = "show"; //set ulasan blogs status 
        $ulasan->products_id = $products_id; //set ulasan blogs from blogs
        $ulasan->members_id = auth()->user()->members->members_id; // set ulasan blogs members
        $ulasan->save(); //store ulasan blogs

        return response('Success Create', 201);
    }

    public function updateulasanproducts(Request $request, $ulasanproductsid)
    {
        $data = $request->validate([
            "pesan" => "required|string",
        ]);
        
        $members_id = Ulasan::where('ulasan_id','=',$ulasanproductsid)->value('members_id'); //get members from ulasan blogs by ulasan blogs id
        if($members_id==auth()->user()->members->members_id){ //statment jika member yang update ulasan blog adalah member yang sesuai maka pesan ulasan blogs dapat di update
            $ulasan = Ulasan::where('ulasan_id','=',$ulasanproductsid)->first();
            $ulasan->pesan = $request->pesan;
            $ulasan->update();
            return response('Success Update', 200);
        }else{
            return response('Not Acceptable', 406);
        }        
    }

    public function createbalasulasanproducts(Request $request, $ulasanproductsid)
    {
        $data = $request->validate([
            "pesan" => "required|string",
        ]);

        $balasulasan = new BalasUlasan; 
        $balasulasan->pesan = $request->pesan; //set balas ulasan blogs pesan
        $balasulasan->status = "show"; //set balas ulasan blogs status 
        $balasulasan->ulasan_id = $ulasanproductsid; //set balas ulasan blogs from blogs
        $balasulasan->members_id = auth()->user()->members->members_id;; // set balas ulasan blogs members
        $balasulasan->save(); //store balas ulasan blogs

        return response('Success Create', 201);
    }

    public function updatebalasulasanproducts(Request $request, $balasulasanproductsid)
    {
        $data = $request->validate([
            "pesan" => "required|string",
        ]);
        
        $members_id = BalasUlasan::where('balas_ulasan_id','=',$balasulasanproductsid)->value('members_id'); //get members from balas ulasan blogs by balas ulasan blogs id
        if($members_id==auth()->user()->members->members_id){ //statment jika member yang update ulasan blog adalah member yang sesuai maka pesan balas ulasan blogs dapat di update
            $balasulasan = BalasUlasan::where('balas_ulasan_id','=',$balasulasanproductsid)->first();
            $balasulasan->pesan = $request->pesan;
            $balasulasan->update();
            return response('Success Update', 200);
        }else{
            return response('Not Acceptable', 406);
        }        
    }
}
