<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use UuidForKey;

    protected $table = 'payments';
    protected $primaryKey = 'payments_id';
    protected $fillable = [
        'payments_id',
        'name',
        'username',
        'password',
        'email',
        'no_account',
        'image',
        'status',
        'type',
    ];

    public function payments()
    {
        return $this->hasMany('App\Models\Payments','payments_id');
    }
}
