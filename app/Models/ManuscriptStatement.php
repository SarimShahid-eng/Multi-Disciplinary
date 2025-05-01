<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManuscriptStatement extends Model
{
    protected $fillable = [
        'manuscript_id',
        'conflict_interest',
        'conflict_interest_reason',
        'manuscript_version',
        'manuscript_version_reason',
        'funding',
        'funding_reason',
        'genAi',
        'genAi_reason',
    ];
    protected $casts = [
        'conflict_interest' => 'boolean',
        'manuscript_version' => 'boolean',
        'funding' => 'boolean',
        'genAi' => 'boolean',
    ];
}
