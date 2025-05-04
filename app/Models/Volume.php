<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    protected $fillable = [
        'journal_id',
        'year',
        'volume'
    ];

    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }
}
