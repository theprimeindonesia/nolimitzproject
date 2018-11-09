<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Payments;
use App\Models\Expeditions;
use App\Models\Members;
use Steevenz\Rajaongkir;

class OrdersController extends Controller
{
    public function index()
    {
        $courier = Expeditions::all();
        $payments = Payments::all();
        $members = Members::with('memberaddresses.addresses')->where('members_id', auth()->user()->members->members_id)->first();
        
        $data = [
            "courier" => $courier,
            "payments" => $payments,
            "members" => $members
        ];

        return $data;
    }

    public function getservice(Type $var = null)
    {
        # code...
    }

    public function getcost()
    {
        //param : address_id, courier/expeditions_name, array|weight 9, 104, 1409
        $config['api_key'] = '43f21be99f3e210597f6d078c94725ba';
        $config['account_type'] = 'pro';
        // $address = Address::where('addresses_id', $addresses_id)->first();
        
        $rajaongkir = new Rajaongkir($config);
        $costs = $rajaongkir->getCost(
            ['city' => 104],
            ['city' => 13],
            1000,
            'jne'
        );
        foreach($costs as $cost){
            if($cost->service=="REG"){

            }
        }
    }
}
