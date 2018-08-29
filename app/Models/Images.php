<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    use UuidForKey;

    protected $table = 'images';
    protected $primaryKey = 'images_id';
    protected $fillable = [
        'images_id',
        'image',
        'stock_id',
    ];

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock','stock_id');
    }
}
