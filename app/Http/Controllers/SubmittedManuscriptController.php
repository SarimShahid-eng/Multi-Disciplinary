<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubmittedManuscriptController extends Controller
{
    function incomplete_manuscripts()
    {
        return view('users.display_submitted_manuscripts.incomplete_manuscripts');
    }
    function under_processing_manuscripts()
    {
        return view('users.display_submitted_manuscripts.under_processing_manuscripts');
    }
    function website_online_manuscripts()
    {
        return view('users.display_submitted_manuscripts.incomplete_manuscripts');
    }
    function reject_withdrawn_manuscripts()
    {
        return view('users.display_submitted_manuscripts.incomplete_manuscripts');
    }
}
