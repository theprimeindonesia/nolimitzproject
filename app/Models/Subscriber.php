<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use UuidForKey;

    protected $table = 'subscriber';
    protected $primaryKey = 'subscriber_id';
    protected $fillable = [
        'subscriber_id',
        'email',
    ];
}
