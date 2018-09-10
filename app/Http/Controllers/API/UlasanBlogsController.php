<?php

namespace App\Http\Controllers\API;

use App\Models\UlasanBlogs;
use App\Models\BalasUlasanBlogs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UlasanBlogsController extends Controller
{
    public function createUlasanBlogs(Request $request, $blogid)
    {
        $data = $request->validate([
            "pesan" => "required|string",
        ]);

        $ulasanBlogs = new UlasanBlogs; 
        $ulasanBlogs->pesan = $request->pesan; //set ulasan blogs pesan
        $ulasanBlogs->status = "show"; //set ulasan blogs status 
        $ulasanBlogs->blogs_id = $blogid; //set ulasan blogs from blogs
        $ulasanBlogs->members_id = auth()->user()->members->members_id; // set ulasan blogs members
        $ulasanBlogs->save(); //store ulasan blogs

        return response($ulasanBlogs, 201);
    }

    public function updateUlasanBlogs(Request $request, $ulasanblogid)
    {
        $data = $request->validate([
            "pesan" => "required|string",
        ]);
        
        $members_id = UlasanBlogs::where('ulasan_blogs_id','=',$ulasanblogid)->value('members_id'); //get members from ulasan blogs by ulasan blogs id
        if($members_id==auth()->user()->members->members_id){ //statment jika member yang update ulasan blog adalah member yang sesuai maka pesan ulasan blogs dapat di update
            $ulasanBlogs = UlasanBlogs::where('ulasan_blogs_id','=',$ulasanblogid)->first();
            $ulasanBlogs->pesan = $request->pesan;
            $ulasanBlogs->update();
            return response($ulasanBlogs, 200);
        }else{
            return response('Not Acceptable', 406);
        }        
    }

    public function createBalasUlasanBlogs(Request $request, $ulasanblogid)
    {
        $data = $request->validate([
            "pesan" => "required|string",
        ]);

        $balasUlasanBlogs = new BalasUlasanBlogs; 
        $balasUlasanBlogs->pesan = $request->pesan; //set balas ulasan blogs pesan
        $balasUlasanBlogs->status = "show"; //set balas ulasan blogs status 
        $balasUlasanBlogs->ulasan_blogs_id = $ulasanblogid; //set balas ulasan blogs from blogs
        $balasUlasanBlogs->members_id = auth()->user()->members->members_id;; // set balas ulasan blogs members
        $balasUlasanBlogs->save(); //store balas ulasan blogs

        return response($balasUlasanBlogs, 201);
    }

    public function updateBalasUlasanBlogs(Request $request, $balasulasanblogid)
    {
        $data = $request->validate([
            "pesan" => "required|string",
        ]);
        
        $members_id = BalasUlasanBlogs::where('balas_ulasan_blogs_id','=',$balasulasanblogid)->value('members_id'); //get members from balas ulasan blogs by balas ulasan blogs id
        if($members_id==auth()->user()->members->members_id){ //statment jika member yang update ulasan blog adalah member yang sesuai maka pesan balas ulasan blogs dapat di update
            $balasUlasanBlogs = BalasUlasanBlogs::where('balas_ulasan_blogs_id','=',$balasulasanblogid)->first();
            $balasUlasanBlogs->pesan = $request->pesan;
            $balasUlasanBlogs->update();
            return response($balasUlasanBlogs, 200);
        }else{
            return response('Not Acceptable', 406);
        }        
    }
}
