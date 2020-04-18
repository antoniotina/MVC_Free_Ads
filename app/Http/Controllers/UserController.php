<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {   
        $user->messages = Message::where('receiver_id', '=', auth()->user()->id)->get();
        $user->newMessages = count(Message::where('receiver_id', '=', auth()->user()->id)->where('read', '=', 0)->get());
        return view('profile.home', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user);
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
        $this->authorize('delete', $user);
        $user->delete();
        auth()->logout();
        return view('index');
    }

    public function listAnnonces(User $user)
    {
        $annonces = $user->annonces()->latest()->paginate(10);
        return view('annonce.show', compact('annonces'));
    }
}
