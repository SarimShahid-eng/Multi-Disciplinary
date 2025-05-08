<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManuscriptStatus extends Model
{
    protected $fillable = [
        'manuscript_id',
        'status',
        'status_date',
        'changed_by',
        'remarks',
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
    public function manuscript()
    {
        return $this->belongsTo(Manuscript::class);
    }
}
