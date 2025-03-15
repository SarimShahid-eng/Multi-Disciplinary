<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestedReviewer extends Model
{
    protected $fillable = [
        'submission_id',
        'name',
        'email',
        'affiliation',
        'reason'
    ];
    //
}
