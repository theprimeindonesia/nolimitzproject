<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Expeditions extends Model
{
    use UuidForKey;

    protected $table = 'expeditions';
    protected $primaryKey = 'expeditions_id';
    protected $fillable = [
        'expeditions_id',
        'name',
        'contact',
        'type',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\Orders', 'expeditions_id');
    }
}
