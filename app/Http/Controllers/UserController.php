<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        return view('profile.home', compact('user'));
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $user->update($data);
        return view('profile.edit', compact('user'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return view('index');
    }
}
