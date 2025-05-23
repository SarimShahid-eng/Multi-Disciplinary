<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class ManuscriptStatus extends Model
{
    protected $fillable = [
        'manuscript_id',
        'status',
        'status_date',
        'changed_by',
        'remarks',
    ];
    protected $casts = [
    'status_date' => 'datetime',
];
    public static function logStatus($manuscriptId, $status, $userId = null, $statusDate = null)
    {
        return self::create([
            'manuscript_id' => $manuscriptId,
            'status' => $status,
            'status_date' => $statusDate ?? now(),
            'changed_by' => $userId ?? auth()->id(),
        ]);
    }
        protected function formattedStatusDate(): Attribute
    {
        return Attribute::get(function () {
            return $this->status_date?->format('j M Y');
        });
    }
    public function manuscript()
    {
        return $this->belongsTo(Manuscript::class);
    }
}
