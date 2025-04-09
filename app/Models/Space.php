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

    public function toSearchableArray()
    {
        return [
            'state' => $this->state,
            'title' => $this->title,
            'scrape_json' => $this->scrape_json,
            'basic_scrape_json' => $this->basic_scrape_json,
        ];
    }

    public function searchableAs(): string
    {
        return 'spaces_index';
    }
}
