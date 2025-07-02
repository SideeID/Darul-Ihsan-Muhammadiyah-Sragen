<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('admin.setting.index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255'],
                'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            ]);

            $data = $request->all();
            if ($request->image) {
                $namafile = $request->image->getClientOriginalName();
                $path = public_path() . '/storage/path/user/';
                $request->image->move($path, $namafile);
                $data['image'] = '/storage/path/user/' . $namafile;
            }
            $request->user()->fill($data);

            $request->user()->save();
            return redirect()->route('pengaturan.profile')->with('status', 'profile-updated');
        } catch (\Exception $e) {
            return Redirect::back()->with('status', 'profile-update-failed' . $e->getMessage());
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        try {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current_password'],
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}
