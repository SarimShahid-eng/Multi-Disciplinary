<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Manuscript;
use App\Helpers\FileUpload;
use App\Models\ArticleType;
use App\Models\ManuscriptAuthors;
use App\Models\ManuscriptTracker;
use App\Models\ManuscriptStatement;
use App\Helpers\FileUploadMimeTypes;
use App\helpers\ManuscriptIdGenerator;
use App\Models\ManuscriptSuggestedReviewer;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\TabPane\AuthorTabPaneRequest;
use App\Http\Requests\TabPane\ReviewerTabPaneRequest;
use App\Http\Requests\TabPane\StatementTabPaneRequest;
use App\Http\Requests\TabPane\ManuscriptTabPaneRequest;

class tabPaneValidationController extends Controller
{
    public $manuscriptId;
    public function manuscriptValidation(ManuscriptIdGenerator $gManuscriptId, FileUploadMimeTypes $fileUpload, ManuscriptTabPaneRequest $request)
    {

        $uploadPath = '/users-uploaded-file';
        $allowedFormats = ['application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        $file = $request->file('file')[0];
        $fieldName = 'file';
        $result = $fileUpload->validateFile($file, $fieldName, $allowedFormats);
        if (is_array($result) && array_key_exists("error", $result)) {
            throw ValidationException::withMessages([
                'error' => $result['error']
            ]);
        }
        $uploadedFileName = $fileUpload->uploadFile($uploadPath, $file, $fieldName, $allowedFormats);
        $Input = $request->validated();
        $Input['file_path'] = $uploadedFileName;
        $Input['user_id'] = auth()->user()->id;
        if (!empty($Input['keyword'])) {
            $Input['keywords'] = array_map('trim', explode(',', $Input['keyword']));
        }
        $manuscript = Manuscript::create($Input);
        // step 1 completed
        ManuscriptTracker::create([
            'manuscript_id' => $manuscript->id,
            'step1' => true,
        ]);
        return response()->json([
            'message' => 'success',
            'redirect' => route('submission.create_author', $gManuscriptId->encodeId($manuscript->id)),
        ]);
    }


    public function authorValidation(authorTabPaneRequest $request, ManuscriptIdGenerator $gManuscriptId)
    {
        $Input = $request->validated();
        $manuscriptId = $gManuscriptId->decodeId($Input['manuscript_id'])[0];
        $authors = [];
        foreach ($Input['author_email'] as $index => $email) {
            $authors[] = [
                'email' => $email,
                'author_id' => auth()->user()->id,
                'manuscript_id' => $gManuscriptId->decodeId($Input['manuscript_id'])[0],
                'title' => $Input['author_title'][$index],
                'firstname' => $Input['author_firstname'][$index],
                'middlename' => $Input['author_middlename'][$index] ?? null,
                'lastname' => $Input['author_lastname'][$index],
                'affiliation' => $Input['author_affiliation'][$index],
                'is_corresponding' => $Input['author_co_author'][$index],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        collect($authors)->chunk(100)->each(function ($chunk) {
            foreach ($chunk as $authorData) {
                ManuscriptAuthors::insert($authorData);
            }
        });
        ManuscriptTracker::where('manuscript_id', $manuscriptId)->update(['step2' => true]);

        return response()->json([
            'message' => 'success',
            'redirect' => route('submission.create_reviewer', $Input['manuscript_id']),

        ]);
    }
    public function reviewerValidation(ReviewerTabPaneRequest $request, ManuscriptIdGenerator $gManuscriptId)
    {
        $Input = $request->validated();
        $manuscriptId = $Input['manuscript_id'];
        $decodedId = $gManuscriptId->decodeId($manuscriptId)[0];
        $Input['manuscript_id'] = $decodedId;
        ManuscriptSuggestedReviewer::create($Input);
        ManuscriptTracker::where('manuscript_id', $decodedId)->update(['step3' => true]);
        return response()->json([
            'message' => 'success',
            'redirect' => route('submission.create_statement', $manuscriptId),

        ]);
    }
    public function statementValidation(StatementTabPaneRequest $request, ManuscriptIdGenerator $gManuscriptId)
    {
        $Input = $request->validated();
        $manuscriptId = $Input['manuscript_id'];
        $decodedId = $gManuscriptId->decodeId($manuscriptId)[0];

        $Input['manuscript_id'] = $decodedId;
        ManuscriptStatement::create($Input);
        ManuscriptTracker::where('manuscript_id', $decodedId)->update(['step4' => true]);
        Manuscript::where('id', $decodedId)->update(['is_completed' => true]); //mark as completed
        $newEncodedId = $gManuscriptId->getLatestId();
        session(['manuscript_id' => $newEncodedId]);
        return response()->json([
            'message' => 'success',
            'redirect' => route('submission.create_manuscript', $newEncodedId),
        ]);
    }
}
