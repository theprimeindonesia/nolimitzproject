<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use UuidForKey;

    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'contact_id',
        'instagram',
        'facebook',
        'twitter',
        'email',
        'phone',
        'addresses_id',
    ];

    public function addresses()
    {
        return $this->belongsTo('App\Models\Addresses','addresses_id');
    }

}
