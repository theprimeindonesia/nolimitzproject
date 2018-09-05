<?php

namespace App\Models;

use App\Traits\UuidForKey;
use Illuminate\Database\Eloquent\Model;

class ReturPoDetails extends Model
{
    use UuidForKey;

    protected $table = 'retur_podetails';
    protected $primaryKey = 'retur_podetails_id';
    protected $fillable = [
        'retur_podetails_id',
        'qty',
        'retur_po_id',
        'stock_id',
    ];

    public function returpo()
    {
        return $this->belongsTo('App\Models\ReturPo', 'retur_po_id');
    }

    public function stock()
    {
        return $this->belongsTo('App\Models\Stock', 'stock_id');
    }
}
