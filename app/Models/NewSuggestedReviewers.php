<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewSuggestedReviewers extends Model
{
    protected $fillable=[
        'firstname',
        'lastname',
        'email',
        'affiliation'
    ];
    //
}
