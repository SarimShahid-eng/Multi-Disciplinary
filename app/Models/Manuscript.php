<?php

namespace App\Models;

use Hashids\Hashids;
use App\Models\Journal;
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
        'manuscriptId',
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
    public function journal()
    {
        return $this->belongsTo(Journal::class);
    }
    public function statuses()
    {
        return $this->hasMany(ManuscriptStatus::class);
    }
    public function latestStatus()
    {
        return $this->hasOne(ManuscriptStatus::class)->latestOfMany();
    }
    public function latestStep()
    {
        return $this->hasOne(ManuscriptTracker::class);
    }
    public function getCompletedStepsCountAttribute()
    {
        $tracker = $this->latestStep;
        if (!$tracker) {
            return 0;
        }
        return collect([
            $tracker->step1,
            $tracker->step2,
            $tracker->step3,
            $tracker->step4,
        ])->filter()->count();
    }
    public function getNextStepRoute($encodedId)
    {
        $steps = config('steps');

        $latest = $this->latestStep;

        if (!$latest) {
            return route($steps[1], ['manuscriptId' => $encodedId]);
        }

        if (!$latest->step1) {
            return route($steps['step1'], ['manuscriptId' => $encodedId]);
        } elseif (!$latest->step2) {
            return route($steps['step2'], ['manuscriptId' => $encodedId]);
        } elseif (!$latest->step3) {
            return route($steps['step3'], ['manuscriptId' => $encodedId]);
        } elseif (!$latest->step4) {
            return route($steps['step4'], ['manuscriptId' => $encodedId]);
        }

        // All steps completed, return to last step (or customize as needed)
        return route($steps['step4'], ['manuscriptId' => $encodedId]);
    }
}
