<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'title',
        'abstract',
        'file_path',
        'keywords',
        'status',
        'submission_date',
        'revised_date',
        'accepted_date',
        'journal_id',
        'corresponding_author_id'
    ];
    protected $casts = [
        'keywords' => 'array',
    ];
}
