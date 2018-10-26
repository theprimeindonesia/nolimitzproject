<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use UuidForKey;
    protected $table = 'banner';
    protected $primaryKey = 'banner_id';
    protected $fillable = [
        'banner_id',
        'title',
        'description',
        'image',
    ];
}
