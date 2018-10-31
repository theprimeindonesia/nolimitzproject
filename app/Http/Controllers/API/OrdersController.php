<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\Expeditions;
use App\Models\Members;

class OrdersController extends Controller
{
    public function index()
    {
        $courier = Expeditions::all();
        $payments = Payments::all();
        $members = auth()->user()->members->members_id;
        
        $data = [
            "courier" => $courier,
            "payments" => $payments,
            "members" => $members
        ];
        return $members;
    }
}
