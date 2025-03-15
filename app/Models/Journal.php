<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected  $fillable = [
        'name',
        'issn',
        'editor_in_chief_id',
        'description'
    ];
    public function editor_in_chief()
    {
        return $this->belongsTo(User::class, 'editor_in_chief_id');
    }
    //
}
