<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use UuidForKey;

    protected $table = 'merk';
    protected $primaryKey = 'merk_id';
    protected $fillable = [
        'merk_id',
        'name',
        'image',
    ];

    public function products()
    {
        return $this->hasMany('App\Models\Products', 'merk_id');
    }
}
