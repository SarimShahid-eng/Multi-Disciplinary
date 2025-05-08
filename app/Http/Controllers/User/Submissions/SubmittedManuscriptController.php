<?php

namespace App\Http\Controllers\User\Submissions;


use App\Models\Manuscript;

use Illuminate\Http\Request;
use App\Models\ManuscriptStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Helpers\ManuscriptIdGenerator;
use Illuminate\Validation\ValidationException;

class SubmittedManuscriptController extends Controller
{
    function incomplete_manuscripts()
    {
        $this->setManuscriptStatusCounts();
        $incompleteManuscripts =  Manuscript::where('user_id', auth()->id())
            ->where('is_completed', false)
            ->with(['journal:id,name', 'latestStep'])
            ->get();

        return view('users.display_submitted_manuscripts.incomplete_manuscripts', compact('incompleteManuscripts'));
    }
    function under_processing_manuscripts()
    {
        $this->setManuscriptStatusCounts();
        $underProcessings = $count = Manuscript::where('user_id', auth()->id())
            ->whereHas('latestStatus', function ($query) {
                $query->where('status', 'under review');
            })
            ->with('journal:id,name')
            ->get();
        return view('users.display_submitted_manuscripts.under_processing_manuscripts', compact('underProcessings'));
    }
    function website_online_manuscripts()
    {
        $publishes = Manuscript::where('user_id', auth()->id())
            ->whereHas('latestStatus', function ($query) {
                $query->where('status', 'accepted');
            })
            ->with('journal:id,name')
            ->get();
        $this->setManuscriptStatusCounts();
        return view('users.display_submitted_manuscripts.website_online_manuscripts', compact('publishes'));
    }
    function reject_withdrawn_manuscripts()
    {
        $rejectWithdrawns = Manuscript::where('user_id', auth()->id())
            ->whereHas('latestStatus', function ($query) {
                $query->where('status', 'rejected');
            })
            ->with('journal:id,name')
            ->get();

        $this->setManuscriptStatusCounts();
        return view('users.display_submitted_manuscripts.reject_withdrawn_manuscripts', compact('rejectWithdrawns'));
    }
    public function delete_incomplete(Request $request, ManuscriptIdGenerator $gManuscriptId)
    {
        $Input = $request->validate([
            'id' => 'required',
        ]);
        $manuscriptId = $gManuscriptId->decodeId($Input['id'])[0];
        $record = Manuscript::find($manuscriptId);
        if (!$record) {
            throw ValidationException::withMessages([
                'error' => 'Manuscript not found'
            ]);
        }
        Manuscript::where('id', $manuscriptId)->delete();
        return response()->json([
            'success' => 'Incomplete Manuscript Deleted successfully!',
            'reload' => true,
        ]);
    }

    private function setManuscriptStatusCounts()
    {
        $userId = auth()->id();

        Cache::remember('incompleteCount', 60, function () use ($userId) {
            return Manuscript::where('user_id', $userId)->where('is_completed', false)->count();
        });

        Cache::remember('underReview', 60, function () use ($userId) {
            return Manuscript::where('user_id', $userId)
                ->whereHas('latestStatus', function ($query) {
                    $query->where('status', 'under review');
                })
                ->count();
        });

        Cache::remember('accepted', 60, function () use ($userId) {
            return Manuscript::where('user_id', $userId)
                ->whereHas('latestStatus', function ($query) {
                    $query->where('status', 'accepted');
                })
                ->count();
        });

        Cache::remember('rejected', 60, function () use ($userId) {
            return Manuscript::where('user_id', $userId)
                ->whereHas('latestStatus', function ($query) {
                    $query->where('status', 'rejected');
                })
                ->count();
        });
    }
}
