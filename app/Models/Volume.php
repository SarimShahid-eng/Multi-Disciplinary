<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volume extends Model
{
    protected $fillable = [
        'journal_id',
        'year',
        'start_date',
        'end_date'
    ];

    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }
}
