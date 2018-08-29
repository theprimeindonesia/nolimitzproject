<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use UuidForKey;

    protected $table = 'language';
    protected $primaryKey = 'language_id';
    protected $fillable = [
        'language_id',
        'name',
        'ind',
        'en',
    ];
}
