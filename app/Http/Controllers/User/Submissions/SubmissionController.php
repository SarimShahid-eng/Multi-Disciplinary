<?php

namespace App\Http\Controllers\User\Submissions;

use App\Models\Journal;
use App\Models\Manuscript;
use App\Models\ArticleType;
use App\Models\ManuscriptAuthors;
use App\Mail\ManuscriptAuthorMail;
use App\Models\ManuscriptStatement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Helpers\ManuscriptIdGenerator;
use App\Models\ManuscriptSuggestedReviewer;


class SubmissionController extends Controller
{

    public function reset_manuscript(ManuscriptIdGenerator $gManuscriptId)
    {
    //     try {
    //     Mail::to('sarimshah323@gmail.com')->send(new ManuscriptAuthorMail());
    //     return "Mail sent successfully.";
    // } catch (\Exception $e) {
    //     return "Mail failed: " . $e->getMessage();
    // }

        session()->forget('manuscript_id');
        $newEncodedId = $gManuscriptId->getLatestId();
        return redirect()->route('submission.create_manuscript', $newEncodedId);
    }

    public function create_manuscript(ManuscriptIdGenerator $gManuscriptId)
    {
        $journals = Journal::all();
        $article_types = ArticleType::all();
        if (session()->has('manuscript_id')) {
            $manuscriptId = session('manuscript_id');
            $manuscript = Manuscript::find($gManuscriptId->decodeId($manuscriptId)[0]);
        } else {
            $manuscriptId = $gManuscriptId->getLatestId();
            session(['manuscript_id' => $manuscriptId]);
        }
        $manuscriptId = session('manuscript_id');

        return view('users.submission.create_manuscript', compact('journals', 'article_types', 'manuscript', 'manuscriptId'));
    }
    public function create_author($id, ManuscriptIdGenerator $gManuscriptId)
    {
        // dd($id);
        $titles = config('titles.titles');
        $id = $gManuscriptId->decodeId($id)[0];
        $authors = ManuscriptAuthors::where('manuscript_id', $id)->get();
        $manuscriptId = session('manuscript_id');
        $countries = config('countries');
        return view('users.submission.create_author', compact('authors', 'countries', 'manuscriptId', 'titles'));
    }
    public function create_reviewer($id, ManuscriptIdGenerator $gManuscriptId)
    {
        $id = $gManuscriptId->decodeId($id)[0];
        $s_reviewer = ManuscriptSuggestedReviewer::where('manuscript_id', $id)->first();
        $manuscriptId = session('manuscript_id');
        return view('users.submission.create_reviewer', compact('s_reviewer', 'manuscriptId'));
    }
    public function create_statement($id, ManuscriptIdGenerator $gManuscriptId)
    {
        $manuscriptId = session('manuscript_id');

        $id = $gManuscriptId->decodeId($id)[0];
        $m_statement = ManuscriptStatement::where('manuscript_id', $id)->first();
        return view('users.submission.create_statement', compact('m_statement', 'manuscriptId'));
    }
}
