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

class HomeController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        $banner = Banner::orderBy('created_at','desc')->take(3)->get();
        //belum fix bestseller
        $bestseller = Products::with(['stock' => function($q){$q->withCount(['orderdetails' => function($q){$q->whereHas('orders', function($q){$q->where('status','DONE');});}]);}])->take(8)->get();
        $newarrival = Products::orderBy('created_at','desc')->take(8)->get();
        $blogs = Blogs::orderBy('created_at','desc')->take(4)->get();
        $merk = Merk::all();
        $getmerk = Merk::first();
        $merchantstore = Products::where('merk_id',$getmerk->merk_id)->orderBy('created_at','desc')->take(4)->get();
        $testimoni = Comments::with('products')->orderBy('created_at','desc')->take(6)->get();
        $contact = Contact::with('addresses')->get();
        $jumlahmember = Members::count();
        $jumlahproduct = Products::count();
        $data[] = [
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
