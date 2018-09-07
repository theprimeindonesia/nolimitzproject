<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use UuidForKey;

    protected $table = 'messages';
    protected $primaryKey = 'messages_id';
    protected $fillable = [
        'messages_id',
        'name',
        'email',
        'message',
    ];
}
