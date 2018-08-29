<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class PoDetails extends Model
{
    use UuidForKey;

    protected $table = 'po_details';
    protected $primaryKey = 'po_details_id';
    protected $fillable = [
        'po_details_id',
        'qty',
        'price',
        'total',
        'po_id',
        'stock_id',
    ];

    public function po()
    {
        return $this->belongsTo('App\Models\Po','po_id');
    }

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock','stock_id');
    }
}
