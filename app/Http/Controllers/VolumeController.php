<?php

namespace App\Http\Controllers;

use App\Models\Volume;
use App\Models\Journal;
use Illuminate\Http\Request;

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
                'year' => 'required',
                'start_date' => 'required',
                'end_date' => 'required'
            ],
            [
                'journal_id.required' => 'Journal field is required',
            ]
        );
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
