<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\RoleUser;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function manage_user()
    {
        $users = User::with('roles')->paginate(10);
        $roles = Role::all();
        return view('admin.users.index', compact('users', 'roles'));
    }
    function create()
    {
        $countries = config('countries.countries');
        $roles = Role::all();
        return view('admin.users.create', compact('roles', 'countries'));
    }
    function edit(User $user)
    {
        $countries = config('countries.countries');
        $roles = Role::all();
        return view('admin.users.create', compact('roles', 'countries', 'user'));
    }
    function store(Request $request)
    {
        // dd($request->all());
        $Input = $request->validate(
            [
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required',
                'username' => 'required',
                'password' => 'required_if:update_id,null',
                'affiliation' => 'required',
                'country' => 'required',
                'role_id' => 'required'
            ],
            [
                'password.required_if' => 'Password is required',
                'role_id.required' => 'role is required'
            ]
        );
        $msg = 'Added';
        if ($request->update_id) {
            unset($Input['password']);
            $msg = 'Updated';
        }
        $user =  User::UpdateOrCreate(['id' => $request->update_id], $Input);
        if ($request->update_id) {
            RoleUser::where('user_id', $user->id)->delete();
        }
        foreach ($request->role_id as $role_id) {
            RoleUser::create(['user_id' => $user->id, 'role_id' => $role_id]);
        }
        return response()->json([
            'success' => 'User ' . $msg . ' Successfully',
            'redirect' => route('admin.user.index'),
        ]);
    }
}
