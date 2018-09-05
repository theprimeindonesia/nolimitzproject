<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use UuidForKey;

    protected $table = 'currency';
    protected $primaryKey = 'currency_id';
    protected $fillable = [
        'currency_id',
        'rate',
    ];
}
