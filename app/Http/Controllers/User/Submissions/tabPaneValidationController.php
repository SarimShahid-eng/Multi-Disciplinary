<?php

namespace App\Http\Controllers\User\Submissions;


use App\Models\Manuscript;
use App\Models\ManuscriptStatus;
use App\Models\ManuscriptAuthors;
use App\Models\ManuscriptTracker;
use App\Mail\ManuscriptAuthorMail;
use App\Models\ManuscriptStatement;
use App\Helpers\FileUploadMimeTypes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
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
        $uploadedFileName=$request->old_file;
        if(is_null($request->old_file)){
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
    }
        $Input = $request->validated();
        $Input['file_path'] = $uploadedFileName;
        $Input['user_id'] = auth()->user()->id;
        if (!empty($Input['keyword'])) {
            $Input['keywords'] = array_map('trim', explode(',', $Input['keyword']));
        }
        $record = Manuscript::find($gManuscriptId->decodeId($Input['manuscript_id'])[0]);
        if ($record) {
            $record->update($Input);
            $manuscript = $record;
        } else {
            $manuscript = Manuscript::create($Input);
        }
        $mansuritptId = $manuscript->id;
         //mark as completed

        ManuscriptTracker::create([
            'manuscript_id' => $mansuritptId,
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
                'country' => $Input['author_country'][$index],
                'is_corresponding' => $Input['author_co_author'][$index],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $findRecord = ManuscriptAuthors::where('manuscript_id', $manuscriptId)->first();
        if ($findRecord) {
            ManuscriptAuthors::where('manuscript_id', $manuscriptId)->delete();
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
        $findRecord = ManuscriptSuggestedReviewer::where('manuscript_id', $decodedId)->first();
        if ($findRecord) {
            $findRecord->update($Input);
        } else {
            ManuscriptSuggestedReviewer::create($Input);
        }
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
        $findRecord = ManuscriptStatement::where('manuscript_id', $decodedId)->first();

        if ($findRecord) {
            $findRecord->update($Input);
        } else {
            ManuscriptStatement::create($Input);
        }
        ManuscriptTracker::where('manuscript_id', $decodedId)->update(['step4' => true]);
        Manuscript::where('id', $decodedId)->update(['is_completed' => true]); //mark as completed
        ManuscriptStatus::logStatus($decodedId, 'submitted');
    //    Find record form and update custom manuscript id
        $manuscript = Manuscript::find($decodedId);
        $CustommanuscriptId = $this->formingManuscriptId($manuscript);
        Manuscript::where('id', $decodedId)->update(['manuscriptId' => $CustommanuscriptId]);

        $newEncodedId = $gManuscriptId->getLatestId();

    // Send email to the selected authors
        ManuscriptAuthors::where('manuscript_id', $decodedId)->get()->each(function ($author) use ($CustommanuscriptId) {
                Mail::to($author->email)
                    ->queue(new ManuscriptAuthorMail($author));

        });

        session(['manuscript_id' => $newEncodedId]);
        return response()->json([
            'redirect' => route('submission.create_manuscript', $newEncodedId),
        ]);
    }
    private function formingManuscriptId(Manuscript $manuscript): string
    {
        // Get the journal name safely
        $journalName = $manuscript->journal->name ?? 'Unknown';

        // Remove "Impact in" (case-insensitive)
        $formattedJournal = preg_replace('/Impact in\s*/i', '', $journalName);

        $latestVolume = $manuscript->journal->volumes()->latest()->first();

        $volumeNumber = '00'; // default fallback
        if ($latestVolume && preg_match('/\d+/', $latestVolume->volume, $matches)) {
            $volumeNumber = $matches[0]; // first number found
        }

        // Remove spaces, convert to StudlyCase (e.g., "ComputerScience")
        $formattedJournal = \Illuminate\Support\Str::studly($formattedJournal);

        // Pad manuscript ID with 0s to ensure it's 5 digits
        $paddedId = str_pad($manuscript->id, 5, '0', STR_PAD_LEFT);

       return $formattedJournal .  '-'.$volumeNumber   . $paddedId;
    }
}
