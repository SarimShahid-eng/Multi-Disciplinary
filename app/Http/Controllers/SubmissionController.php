<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Submission;
use App\Helpers\FileUpload;
use App\Models\Submissions;
use Illuminate\Http\Request;
use App\Models\SuggestedReviewer;
use Illuminate\Validation\ValidationException;

class SubmissionController extends Controller
{
    public function index()
    {
        $submissions = Submission::paginate(20);
        return view('submission.index', compact('submissions'));
    }
    public function create()
    {
        $journals = Journal::all();
        return view('submission.create', compact('journals'));
    }
    public function store(Request $request, FileUpload $fileUploader)
    {
        $Input = $request->validate(
            [
                'title' => 'required',
                'abstract' => 'required',
                'tags' => 'required',
                'journal_id' => 'required',
                'name' => 'required',
                'email' => 'required',
                'affiliation' => 'required',
                'reason' => 'required',

            ],
            [
                'tags.required' => 'Keywords field is required',
                'journal_id.required' => 'Journal field is required',
            ]
        );
        $tags = explode(',', $Input['tags']);
        // dd(explode(',', $Input['tags']));
        $file = $request->file('file');
        $fieldName = 'file';

        $response = $fileUploader->uploadFile('submissionFormFiles/files', $file, $fieldName);
        if (isset($response['error'])) {
            throw ValidationException::withMessages([$fieldName => $response['error']]);
        }
        $msg = 'Added';
        $submission = [
            'title' => $Input['title'],
            'abstract' => $Input['abstract'],
            'keywords' => $tags,
            'submission_date' => date('Y-m-d'),
            'journal_id' => $Input['journal_id'],
            'corresponding_author_id' => auth()->user()->id,
            'file_path' => $response
        ];
        $submission = Submission::create($submission);
        $suggestedReviewer = [
            'submission_id' => $submission->id,
            'name' => $Input['name'],
            'email' => $Input['email'],
            'affiliation' => $Input['affiliation'],
            'reason' => $Input['reason'],

        ];
        SuggestedReviewer::create($suggestedReviewer);
        return response()->json([
            'success' => 'SUbmission Details ' . $msg . ' Successfully',
            'reload' => true
        ]);
    }
    public function show(Submission $submission)
    {
        return view('submission.show', compact('submission'));
    }
}
