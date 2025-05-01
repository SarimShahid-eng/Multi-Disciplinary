<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IncompleteSubmissionController extends Controller
{
    function index()
    {
        dd('ss');
        return view('submission.create');
    }
}
