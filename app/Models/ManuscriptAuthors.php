<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManuscriptAuthors extends Model
{
    protected $fillable = [
        'email',
        'firstname',
        'middlename',
        'lastname',
        'title',
        'country',
        'affiliation',
        'is_corresponding',
        'manuscript_id',
        'author_id',
    ];
    protected $casts = [
        'is_corresponding' => 'boolean',
    ];
}
