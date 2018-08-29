<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Referrals extends Model
{
    use UuidForKey;

    protected $table = 'referrals';
    protected $primaryKey = 'referrals_id';
    protected $fillable = [
        'referrals_id',
        'members_a_id',
        'members_b_id',
    ];

    public function membersa()
    {
        return $this->belongsTo('App\Models\Members', 'members_a_id');
    }

    public function membersb()
    {
        return $this->belongsTo('App\Models\Members', 'members_b_id');
    }
}
