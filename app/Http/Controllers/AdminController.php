<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    function index()
    {
        $admins = Admin::paginate(10);
        Gate::authorize('super-admin');
        return view('admin.admin.index', compact('admins'));
    }
    function create()
    {
        return view('admin.admin.create');
    }

    function edit(Admin $admin)
    {
        return view('admin.admin.create', compact('admin'));
    }
    function store(Request $request)
    {
        // dd($request->all());
        $Input = $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required_if:update_id,null',
            ],
            [
                'name.required' => 'Name is required',
            ]
        );
        $msg = 'Added';
        $Input['password'] = Hash::make($Input['password']);
        if ($request->update_id && $Input['password'] === null) {
            $msg = 'Updated';
            unset($Input['password']);
        }
        Admin::UpdateOrCreate(['id' => $request->update_id], $Input);

        return response()->json([
            'success' => 'Admin ' . $msg . ' Successfully',
            'redirect' => route('admin.index'),
        ]);
    }
}
