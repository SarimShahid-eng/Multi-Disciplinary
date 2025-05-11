<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use App\Models\Journals;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    function index()
    {
        $journals = Journal::with(['editor_in_chief' => function ($q) {
            return $q->select('id', 'firstname', 'lastname');
        }])->paginate(10);
        return view('admin.journal.index', compact('journals'));
    }
    function create()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', 'editor-in-chief');
        })->get();
        return view('admin.journal.create', compact('users'));
    }

    function edit(Journal $journal)
    {
        $roles = Role::where('name', 'editor-in-chief')->select('id')->first();
        $users = User::whereHas('roles', function ($query) use ($roles) {
            $query->where('role_id', $roles->id);
        })
            ->select('id', 'firstname')
            ->get();
        return view('admin.journal.create', compact('users', 'journal'));
    }
    function store(Request $request)
    {
        $Input = $request->validate(
            [
                'name' => 'required',
                'issn' => 'required',
                'email'=>'required|email|unique:journals,email,'.$request->update_id,
                'editor_in_chief_id' => 'required',
                'description' => 'required',
            ],
            [
                'name.required' => 'Name is required',
                'issn.required' => 'issn is required'
            ]
        );
        $msg = 'Added';

        if ($request->update_id) {
            $msg = 'Updated';
        }
        Journal::UpdateOrCreate(['id' => $request->update_id], $Input);

        return response()->json([
            'success' => 'Journal ' . $msg . ' Successfully',
            'redirect' => route('admin.journal.index'),
        ]);
    }
}
