<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Volume;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class VolumeController extends Controller
{
    function index()
    {
        $volumes = Volume::with('journal')->paginate(10);

        return view('admin.volume.index', compact('volumes'));
    }
    function create()
    {
        $journals = Journal::all();

        return view('admin.volume.create', compact('journals'));
    }

    function edit(Volume $volume)
    {
        $journals = Journal::all();
        return view('admin.volume.create', compact('volume', 'journals'));
    }
    function store(Request $request)
    {
        $Input = $request->validate(
            [
                'journal_id' => 'required',
            ],
            [
                'journal_id.required' => 'Journal field is required',
            ]
        );
        $journalId = $request->journal_id;
        $year =  now()->year;
        $existing = Volume::where('journal_id', $journalId)
            ->where('year', $year)
            ->first();

        if ($existing && !$request->update_id) {
            throw ValidationException::withMessages([
                'error' => 'This journal already exists for the selected year.'
            ]);
        }

        $count = Volume::where('journal_id', $journalId)->count();
        $volumeNumber = $count + 1;
        $Input['year'] = $year;

        $Input['volume'] = 'Vol' . ' ' . $volumeNumber;
        $msg = 'Added';

        if ($request->update_id) {
            $msg = 'Updated';
        }

        Volume::UpdateOrCreate(['id' => $request->update_id], $Input);

        return response()->json([
            'success' => 'Volume ' . $msg . ' Successfully',
            'redirect' => route('admin.volume.index'),
        ]);
    }
}
