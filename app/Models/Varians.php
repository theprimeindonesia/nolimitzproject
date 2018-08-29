<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Varians extends Model
{
    use UuidForKey;

    protected $table = 'varians';
    protected $primaryKey = 'varians_id';
    protected $fillable = [
        'varians_id',
        'name',
        'value',
        'stock_id',
    ];

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock', 'stock_id');
    }
}
