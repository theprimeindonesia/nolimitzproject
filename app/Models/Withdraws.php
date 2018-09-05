<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Withdraws extends Model
{
    use UuidForKey;

    protected $table = 'withdraws';
    protected $primaryKey = 'withdraws_id';
    protected $fillable = [
        'withdraws_id',
        'nominal',
        'status',
        'members_id',
    ];

    public function members()
    {
        return $this->belongsTo('App\Models\Members', 'members_id');
    }
}
