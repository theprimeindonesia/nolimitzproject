<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Blogs;
use App\Models\Merk;
use App\Models\Comments;
use App\Models\Members;
use App\Models\Contact;
use App\Models\Subscriber;
use App\Models\Banner;
use DB;
class HomeController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $banner = Banner::orderBy('created_at','desc')->take(3)->get();
        $bestseller = Products::
        leftJoin('ratings','products.products_id','=','ratings.products_id')
        ->leftJoin('stock','products.products_id','=','stock.products_id')
        ->leftJoin('images','stock.stock_id','=','images.stock_id')
        ->leftJoin('order_details as a','stock.stock_id','=','a.stock_id')
        ->leftJoin('orders','orders.orders_id','=','a.orders_id')
        ->select('products.*','stock.price','images.image', DB::raw('SUM(a.qty) as bestsell'), DB::raw('FLOOR(AVG(ratings.rating)) as rating'))
        ->where('orders.status','DONE')
        ->groupBy('products.products_id')
        ->orderBy('created_at', 'desc')
        ->take(8)
        ->get();
        $newarrival = Products::
        leftJoin('stock','products.products_id','=','stock.products_id')
        ->leftJoin('ratings','products.products_id','=','ratings.products_id')
        ->leftJoin('images','stock.stock_id','=','images.stock_id')
        ->select('products.*','stock.price','images.image', DB::raw('FLOOR(AVG(ratings.rating)) as rating'))
        ->orderBy('created_at','desc')
        ->groupBy('products.products_id')
        ->take(8)
        ->get();
        $blogs = Blogs::orderBy('created_at','desc')->take(4)->get();
        $merk = Merk::all();
        $getmerk = Merk::first();
        $merchantstore = Products::
        leftJoin('merk','merk.merk_id','=','products.merk_id')
        ->leftJoin('ratings','products.products_id','=','ratings.products_id')
        ->leftJoin('stock','products.products_id','=','stock.products_id')
        ->leftJoin('images','stock.stock_id','=','images.stock_id')
        ->select('products.*','stock.price','images.image','merk.image as image_merk', DB::raw('FLOOR(AVG(ratings.rating)) as rating'))
        ->where('merk.merk_id', $getmerk->merk_id)
        ->groupBy('products.products_id')
        ->orderBy('created_at','desc')
        ->take(4)
        ->get();
        $testimoni = Comments::
        leftJoin('products','products.products_id','=','comments.products_id')
        ->leftJoin('ratings','products.products_id','=','ratings.products_id')
        ->leftJoin('members','members.members_id','=','comments.members_id')
        ->leftJoin('stock','products.products_id','=','stock.products_id')
        ->leftJoin('images','stock.stock_id','=','images.stock_id')
        ->select('products.name','images.image', 'comments.comments','members.firstname', 'members.lastname', DB::raw('FLOOR(AVG(ratings.rating)) as rating'))
        ->where('comments.status','Aktif')
        ->orderBy('comments.created_at','desc')->take(6)->get();
        $contact = Contact::with('addresses')->get();
        $jumlahmember = Members::count();
        $jumlahproduct = Products::count();
        $data = [
            "categories" => $categories,
            "banner" => $banner,
            "bestseller" => $bestseller,
            "newarrival" => $newarrival,
            "merchantstore" => $merchantstore,
            "blogs" => $blogs,
            "merk" => $merk,
            "testimoni" => $testimoni,
            "contact" => $contact,
            "jumlahmember" => $jumlahmember,
            "jumlahproduct" => $jumlahproduct
        ];
        return $data;
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:subscriber',
        ]);

        $subscriber = new Subscriber;
        $subscriber->email = $request->email;
        $subscriber->save();

        return response('Success', 201);
    }
}
