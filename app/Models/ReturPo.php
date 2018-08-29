<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class ReturPo extends Model
{
    use UuidForKey;

    protected $table = 'retur_po';
    protected $primaryKey = 'retur_po_id';
    protected $fillable = [
        'retur_po_id',
        'po_id',
    ];

    public function po()
    {
        return $this->belongsTo('App\Models\Po', 'po_id');
    }

    public function returpodetails()
    {
        return $this->hasMany('App\Models\ReturPoDetails', 'retur_po_id');
    }

    public function stocklog()
    {
        return $this->hasMany('App\Models\StockLog', 'retur_po_id');
    }
}
