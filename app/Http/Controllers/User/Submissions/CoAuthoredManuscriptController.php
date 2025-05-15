<?php

namespace App\Http\Controllers\User\Submissions;

use App\Http\Controllers\Controller;
use App\Models\Manuscript;
use Illuminate\Http\Request;

class CoAuthoredManuscriptController extends Controller
{
    public function index()
    {
        // manuscripts of author where he is a co_author
        $manuscripts = Manuscript::where('user_id', auth()->id())
            ->with(['manuscriptAuthor','journal','latestStatus'])
            ->whereHas('manuscriptAuthor', function ($query) {
                $query
                ->where('is_corresponding',"1")
                ->where('email', auth()->user()->email);
            })
            ->get();
        return view('users.co_author_manuscripts.display_co_author_manuscripts',compact('manuscripts'));
    }
}
