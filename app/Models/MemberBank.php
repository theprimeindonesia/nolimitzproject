<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class MemberBank extends Model
{
    use UuidForKey;

    protected $table = 'member_bank';
    protected $primaryKey = 'member_bank_id';
    protected $fillable = [
        'member_bank_id',
        'owner',
        'bank',
        'cabang',
        'no_account',
        'members_id',
    ];

    public function members()
    {
        return $this->belongsTo('App\Models\Members','members_id');
    }
}
