<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use UuidForKey;

    protected $table = 'addresses';
    protected $primaryKey = 'addresses_id';
    protected $fillable = [
        'addresses_id',
        'detail',
        'city',
        'subdistrict',
        'province',
        'zip',
        'lng',
        'lat',
    ];

    public function contact()
    {
        return $this->hasOne('App\Models\Contact', 'addresses_id');
    }

    public function suppliers()
    {
        return $this->hasOne('App\Models\Suppliers', 'addresses_id');
    }

    public function memberaddresses()
    {
        return $this->hasMany('App\Models\MemberAddresses', 'addresses_id');
    }

}
