<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use UuidForKey;

    protected $table = 'suppliers';
    protected $primaryKey = 'suppliers_id';
    protected $fillable = [
        'suppliers_id',
        'name',
        'contact',
        'contact_sales',
        'addresses_id',
    ];

    public function addresses()
    {
        return $this->belongsTo('App\Models\Addresses', 'addresses_id');
    }

    public function po()
    {
        return $this->hasMany('App\Models\Po', 'suppliers_id');
    }
}
