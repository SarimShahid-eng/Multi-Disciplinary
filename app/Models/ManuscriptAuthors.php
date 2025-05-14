<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
    public function manuscript()
    {
        return $this->belongsTo(Manuscript::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

}
