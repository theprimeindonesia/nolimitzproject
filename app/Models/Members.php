<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
    use UuidForKey;

    protected $table = 'members';
    protected $primaryKey = 'members_id';
    protected $fillable = [
        'members_id',
        'firstname',
        'lastname',
        'sex',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'phone',
        'photo',
        'dompet',
        'users_id',
    ];

    public function ulasanblogs()
    {
        return $this->hasMany('App\Models\UlasanBlogs', 'members_id');
    }

    public function balasulasan()
    {
        return $this->hasMany('App\Models\BalasUlasan', 'members_id');
    }

    public function balasulasanblogs()
    {
        return $this->hasMany('App\Models\BalasUlasanBlogs', 'members_id');
    }

    public function ulasan()
    {
        return $this->hasMany('App\Models\Ulasan', 'members_id');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Ratings', 'members_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comments', 'members_id');
    }

    public function withdraws()
    {
        return $this->hasMany('App\Models\Withdraws', 'members_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Orders', 'members_id');
    }

    public function memberbank()
    {
        return $this->hasMany('App\Models\MemberBank', 'members_id');
    }

    public function referralsa()
    {
        return $this->hasMany('App\Models\Referrals', 'members_id');
    }

    public function referralsb()
    {
        return $this->hasMany('App\Models\Referrals', 'members_id');
    }

    public function memberaddresses()
    {
        return $this->hasMany('App\Models\MemberAddresses', 'members_id');
    }

    public function users(){
        return $this->belongsTo('App\Users', 'users_id');
    }
}
