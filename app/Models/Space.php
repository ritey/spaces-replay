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

    /**
     * Get the value used to index the model.
     */
    public function getScoutKey()
    {
        return $this->guid;
    }

    /**
     * Get the key name used to index the model.
     */
    public function getScoutKeyName()
    {
        return 'guid';
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title ?? '',
            'state' => $this->state ?? '',
            'scrape_json' => $this->scrape_json ?? '{}',
            'basic_scrape_json' => $this->basic_scrape_json ?? '{}',
        ];
    }

    public function searchableAs(): string
    {
        return 'spaces_index';
    }
}
