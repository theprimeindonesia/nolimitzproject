<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use UuidForKey;

    protected $table = 'motor';
    protected $primaryKey = 'motor_id';
    protected $fillable = [
        'motor_id',
        'name',
        'image',
    ];

    public function type()
    {
        return $this->hasMany('App\Models\Type', 'motor_id');
    }

    public function productsmotor()
    {
        return $this->hasMany('App\Models\ProductsMotor', 'motor_id');
    }
}
