<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    public function index($username)
    {
        $user = User::findOrFail($username);

        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        return view('profiles.index', compact('user', 'follows'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'bio' => 'required',
            'website' => ['required', 'url'],
            'image' => ['required', 'image']
        ]);
        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public'); // upload image to storage directory and create symbolic link to public directory
            Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000)->save(); // fit image to custome size by package intervention
        }

        $user->profile->update(array_merge(
            $data,
            [
                'image' => $imagePath ?? null
            ]
        ));
        return redirect("profile/{$user->id}");
    }

    public function create()
    {
        return 'ok';
    }
}
