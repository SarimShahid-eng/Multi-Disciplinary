<?php

namespace App\Models;

use Hashids\Hashids;
use Illuminate\Database\Eloquent\Model;
use RedExplosion\Sqids\Concerns\HasSqids;

class Manuscript extends Model
{
    use HasSqids;
    protected $fillable = [
        'title',
        'abstract',
        'file_path',
        'keywords',
        // 'status',
        // 'submission_date',
        // 'revised_date',
        // 'accepted_date',
        'article_type_id',
        'journal_id',
        'user_id',
        'corresponding_author_id'
    ];
    protected $casts = [
        'keywords' => 'array',
    ];
    public function getEncodedIdAttribute(): string
    {
        $hashids = new Hashids('', 25);
        return $hashids->encode($this->attributes['id']);
    }
}
