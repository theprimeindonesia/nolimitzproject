<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class MemberAddresses extends Model
{
    use UuidForKey;

    protected $table = 'member_addresses';
    protected $primaryKey = 'member_addresses_id';
    protected $fillable = [
        'member_addresses_id',
        'members_id',
        'addresses_id',
    ];

    public function members()
    {
        return $this->belongsTo('App\Models\Members','members_id');
    }

    public function addresses()
    {
        return $this->belongsTo('App\Models\Addresses','addresses_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Orders', 'member_addresses_id');
    }
}
