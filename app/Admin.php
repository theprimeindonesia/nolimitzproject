<?php

namespace App;

use App\Traits\UuidForKey;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Admin extends Authenticatable
{
    use Notifiable;
    use UuidForKey, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guard_name = 'admin';
    protected $table = 'admins';
    protected $primaryKey = 'admins_id';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * 
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
