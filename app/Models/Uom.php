<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Uom extends Model
{
    use UuidForKey;

    protected $table = 'uom';
    protected $primaryKey = 'uom_id';
    protected $fillable = [
        'uom_id',
        'name',
    ];

    public function stock()
    {
        return $this->hasMany('App\Models\Stock', 'uom_id');
    }
}
