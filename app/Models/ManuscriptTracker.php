<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManuscriptTracker extends Model
{
    protected $fillable = [
        'manuscript_id',
        'step1',
        'step2',
        'step3',
        'step4',
    ];
    //
}
