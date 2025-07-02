<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Menampilkan form edit user.
     */
    public function edit(Request $request)
    {
        return view('admin.setting.index', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Memperbarui data user.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($request->user()->id)],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);
        $user = $request->user();
        if ($request->hasFile('image')) {
            $imageName = $request->image->getClientOriginalName();
            $path = public_path('storage/path/user/');
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $request->image->move($path, $imageName);
            $user->image = 'storage/path/user/' . $imageName;
        }

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully.');
    }

    /**
     * Menghapus user.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Account deleted successfully.');
    }
}
