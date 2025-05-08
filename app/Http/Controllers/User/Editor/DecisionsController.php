<?php

namespace App\Http\Controllers\User\Editor;

use App\Models\Manuscript;
use Illuminate\Http\Request;
use App\Models\ManuscriptStatus;
use App\Http\Controllers\Controller;

class DecisionsController extends Controller
{
    public function editor_decision()
    {
        $manuscripts = Manuscript::with(['latestStatus' => function ($q) {
            $q->select('manuscript_statuses.id', 'manuscript_statuses.status', 'manuscript_statuses.manuscript_id');
        }])
            ->whereHas('latestStep', function ($query) {
                $query->where('step4', true);
            })
            ->paginate(10);
        return  view('users.academic_editor.decisions', compact('manuscripts'));
    }
    public function reject_manuscript(Manuscript $manuscript)
    {
        ManuscriptStatus::logStatus($manuscript->id, 'rejected');
        return response()->json([
            'success' => 'Manuscript rejected successfully!',
            'reload' => true,
        ]);
    }
    public function accept_manuscript(Manuscript $manuscript)
    {
        ManuscriptStatus::logStatus($manuscript->id, 'accepted');
        return response()->json([
            'success' => 'Manuscript Accepted successfully!',
            'reload' => true,
        ]);
    }
    public function under_review_manuscript(Manuscript $manuscript)
    {
        ManuscriptStatus::logStatus($manuscript->id, 'under review');
        return response()->json([
            'success' => 'Manuscript Under Reviewed successfully!',
            'reload' => true,
        ]);
    }
}
