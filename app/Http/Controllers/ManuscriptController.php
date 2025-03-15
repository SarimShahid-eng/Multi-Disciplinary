<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManuscriptController extends Controller
{
    function submission_details()
    {
        return view('manuscript.submission_details');
    }
    //
}
