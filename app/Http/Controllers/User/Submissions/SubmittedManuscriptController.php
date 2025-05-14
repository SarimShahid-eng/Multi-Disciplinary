<?php

namespace App\Http\Controllers\User\Submissions;


use App\Models\Manuscript;

use Illuminate\Http\Request;
use App\Mail\InviteReviewers;
use App\Models\ManuscriptStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\NewSuggestedReviewers;
use Illuminate\Support\Facades\Cache;
use App\Helpers\ManuscriptIdGenerator;
use App\Models\ManuscriptSuggestedReviewer;
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
        // dd($incompleteManuscripts);
        return view('users.display_submitted_manuscripts.incomplete_manuscripts', compact('incompleteManuscripts'));
    }
    function under_processing_manuscripts()
    {
        $this->setManuscriptStatusCounts();
        $underProcessings = $count = Manuscript::where('user_id', auth()->id())
            ->whereHas('latestStatus', function ($query) {
                $query->where('status', 'submitted');
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
    function view_manuscript_details($manuscriptId, ManuscriptIdGenerator $gManuscriptId)
    {

        $decodedId = $gManuscriptId->decodeId($manuscriptId)[0];
        $manuscript = Manuscript::with([
            'journal:id,name',
            'latestStatus',
            'articleType:id,name',
            'user:id,firstname,lastname',
            'statuses:id,manuscript_id,status,status_date,created_at',
            'manuscriptStatement:id,manuscript_id,funding,funding_reason',
            'manuscriptAuthor:id,manuscript_id,email,firstname,affiliation,is_corresponding',
        ])
            ->when(Auth::user()->hasAnyRole(['editor-in-chief', 'associate-editor', 'assistant-editor']), function ($query) {
                $query->with('suggestedReviewer');
            })
            ->where('id', $decodedId)
            ->first();
        return view('users.display_submitted_manuscripts.view_manuscript_details', compact('manuscript'));
    }
    public function fetch_email_data(Request $request)
    {
        $email = $request->email;
        $record = ManuscriptSuggestedReviewer::where(function ($query) use ($email) {
            $query->where('suggested_reviewer_1_email', $email)
                ->orWhere('suggested_reviewer_2_email', $email)
                ->orWhere('suggested_reviewer_3_email', $email);
        })->first();
        $data = [];

        if ($record) {
            if ($record->suggested_reviewer_1_email === $email) {
                $data = [
                    'firstname'   => $record->suggested_reviewer_1_firstname,
                    'lastname'    => $record->suggested_reviewer_1_lastname,
                    'email'       => $record->suggested_reviewer_1_email,
                    'affiliation' => $record->suggested_reviewer_1_affiliation,
                ];
            } elseif ($record->suggested_reviewer_2_email === $email) {
                $data = [
                    'firstname'   => $record->suggested_reviewer_2_firstname,
                    'lastname'    => $record->suggested_reviewer_2_lastname,
                    'email'       => $record->suggested_reviewer_2_email,
                    'affiliation' => $record->suggested_reviewer_2_affiliation,
                ];
            } elseif ($record->suggested_reviewer_3_email === $email) {
                $data = [
                    'firstname'   => $record->suggested_reviewer_3_firstname,
                    'lastname'    => $record->suggested_reviewer_3_lastname,
                    'email'       => $record->suggested_reviewer_3_email,
                    'affiliation' => $record->suggested_reviewer_3_affiliation,
                ];
            }
        } else {
            $record = NewSuggestedReviewers::where('email', $email)->first();
            $data = [
                'firstname'   => $record->firstname,
                'lastname'    => $record->lastname,
                'email'       => $record->email,
                'affiliation' => $record->affiliation,
            ];
        }
        return response()->json([
            'success' => !empty($data),
            'data'    => $data,
        ]);
    }
    function submit_decision(Request $request, ManuscriptIdGenerator $gManuscriptId)
    {
        $validate =    $request->validate([
            'decision' => ['required', 'in:rejected,invited'],
            'manuscript_id'   => ['required_if:decision,rejected'],

            // Conditional validation only if 'invite' is selected
            'firstname'   => ['required_if:decision,invited', 'array'],
            'lastname'    => ['required_if:decision,invited', 'array'],
            'email'       => ['required_if:decision,invited', 'array'],
            'affiliation' => ['required_if:decision,invited', 'array'],

            // Each item in the arrays
            'firstname.*'   => ['required_if:decision,invited', 'string'],
            'lastname.*'    => ['required_if:decision,invited', 'string'],
            'email.*'       => ['required_if:decision,invited', 'email', 'distinct'], // distinct ensures all emails are different
            'affiliation.*' => ['required_if:decision,invited', 'string'],
        ], [
            'firstname.required_if' => 'First name is required when inviting reviewers.',
            'lastname.required_if' => 'Last name is required when inviting reviewers.',
            'email.required_if' => 'Email address is required when inviting reviewers.',
            'affiliation.required_if' => 'Affiliation is required when inviting reviewers.',

            'firstname.*.required_if' => 'Each reviewer must have a first name.',
            'lastname.*.required_if' => 'Each reviewer must have a last name.',
            'email.*.required_if' => 'Each reviewer must have an email address.',
            'email.*.email' => 'Please enter a valid email address for each reviewer.',
            'email.*.distinct' => 'Each reviewer must have a unique email address.',
            'affiliation.*.required_if' => 'Each reviewer must have an affiliation.',
        ]);
        if ($validate['decision'] == "invited") {

            foreach ($validate['email'] as $key => $email) {
                $record = ManuscriptSuggestedReviewer::where(function ($query) use ($email) {
                    $query->where('suggested_reviewer_1_email', $email)
                        ->orWhere('suggested_reviewer_2_email', $email)
                        ->orWhere('suggested_reviewer_3_email', $email);
                })->first();
                $data = [
                    'firstname'   => $validate['firstname'][$key],
                    'lastname'    => $validate['lastname'][$key],
                    'email'       => $validate['email'][$key],
                    'affiliation' => $validate['affiliation'][$key],
                ];
                if (!$record) {
                    NewSuggestedReviewers::create($data);
                }

                Mail::to($email)
                    ->queue(new InviteReviewers());
            }
        } elseif ($validate['decision'] == "rejected") {
            $decodedId = $gManuscriptId->decodeId($validate['manuscript_id'])[0];
            ManuscriptStatus::logStatus($decodedId, 'rejected');
        }

        return response()->json([
            'reload' => true
        ]);
    }
    private function setManuscriptStatusCounts()
    {
        $userId = auth()->id();

        Cache::remember('incompleteCount', 60, function () use ($userId) {
            return Manuscript::where('user_id', $userId)->where('is_completed', false)->count();
        });

        Cache::remember('underProcessing', 60, function () use ($userId) {
            return Manuscript::where('user_id', $userId)
                ->whereHas('latestStatus', function ($query) {
                    $query->where('status', 'submitted');
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
