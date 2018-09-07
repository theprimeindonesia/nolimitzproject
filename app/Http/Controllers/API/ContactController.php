<?php

namespace App\Http\Controllers\API;

use App\Models\Contact;
use App\Models\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contact()
    {
        return Contact::with('addresses')->get();
    }

    public function message(Request $request)
    {
        $data = $request->validate([
            "name" => "required|string",
            "email" => "required|string",
            "message" => "required|string",
        ]);
        $message = Messages::create($data);

        return response($message,'201');
    }



}
