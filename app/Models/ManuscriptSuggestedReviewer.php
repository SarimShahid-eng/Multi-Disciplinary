<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManuscriptSuggestedReviewer extends Model
{
    protected $fillable = [
        'manuscript_id',
        'suggested_reviewer_1_firstname',
        'suggested_reviewer_1_lastname',
        'suggested_reviewer_1_email',
        'suggested_reviewer_1_affiliation',
        'suggested_reviewer_2_firstname',
        'suggested_reviewer_2_lastname',
        'suggested_reviewer_2_email',
        'suggested_reviewer_2_affiliation',
        'suggested_reviewer_3_firstname',
        'suggested_reviewer_3_lastname',
        'suggested_reviewer_3_email',
        'suggested_reviewer_3_affiliation',

    ];
    //
}
