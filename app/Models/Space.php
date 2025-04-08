<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Space extends Model
{
    use HasFactory;
    use Searchable;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = []; // allow all
    protected $connection = 'mysql';
}
