<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Author;
use Illuminate\View\View;
use App\Models\UserDetails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
    public function view(Request $request): View
    {
        $countries = config('countries.countries');

        return view('profile.view', [
            'user' => $request->user(),
            'countries' => $countries
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
        $Input = $request->validated();

        $user = User::find(auth()->id);
        // 'firstname' => ['required', 'string', 'max:255'],
        //     'lastname' => ['required', 'string', 'max:255'],
        //     'affiliation' => ['required', 'string', 'max:255'],
        //     'address1' => ['required', 'string', 'max:255'],
        //     'address2' => ['required', 'string', 'max:255'],
        //     'zip_code' => ['required', 'string', 'max:255'],
        //     'city' => ['required', 'string', 'max:255'],
        //     'country' => ['required', 'string', 'max:255'],
        //     'bio' => ['nullable', 'string', 'max:255'],
        $user->update($Input);
        if ($Input['address1'] || $Input['address2'] || $Input['bio'] || $Input['zip_code'] || $Input['city'] || $Input['middlename'] ||$Input['title']) {
            UserDetails::create($Input);
        }
        dd($request->all());
        // $request->user()->fill($request->validated());

        // if ($request->user()->isDirty('email')) {
        //     $request->user()->email_verified_at = null;
        // }

        // $request->user()->save();
        // return response()->json([
        //     'success' => 'Profile Updated Successfully',
        //     'reload' => true
        // ]);
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
