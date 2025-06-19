<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ProfileController extends Controller
{
    public function edit()
    {
        return Inertia::render('Profile/Edit');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'name_extention' => 'required'
        ]);

        $confirmation = User::findOrFail($request->id);

        $firstname = $confirmation->firstname === $request->firstname;
        $middlename = $request->middlename === $confirmation->middlename;
        $lastname = $confirmation->lastname === $request->lastname;
        $name_extention = $confirmation->name_extention === $request->name_extention;

        if ($firstname && $middlename && $lastname && $name_extention) {
            return redirect()->back()->with('error', 'No changes happen, update your profile information first');
        }
        $confirmation->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'name_extention' => $request->name_extention
        ]);
        return redirect()->back()->with('success', 'Your profile information updated successfully.');
    }

    public function updateCredentials(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required'
        ]);

        $checking = User::findOrFail($request->id);

        // if($request->username === $checking)

        if (!Hash::check($request->old_password, $checking->password)) {
            return response()->json([
                'error' => true,
                'Old password is incorrect, please try again'
            ]);
        }
        if ($request->new_password !== $request->confirm_password) {
            return response()->json([
                'error' => true,
                'New and old password do not match, please try again'
            ]);
        }
        $checking->update([
            // 'username' =>
        ]);
    }

    public function destroy(Request $request)
    {
        dd($request->all());
    }
}
