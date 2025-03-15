<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function view(Request $request): View
    {
        return view('profile.view', [
            'user' => $request->user(),
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        return response()->json([
            'success' => 'Profile Updated Successfully',
            'reload' => true
        ]);
    }
    public function changePassword(Request $request)
    {

        $Input = $request->validate([
            'password' => 'required|min:6|confirmed',
        ], [
            'password.confirmed' => 'Passwords do not match!',
            'password.min' => 'Password must be at least 6 characters!',
        ]);
        User::where('id', Auth::id())->update($Input);

        return response()->json([
            'success' => 'Password Updated Successfully',
            'reload' => true
        ]);
    }
}
