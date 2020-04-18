<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Message;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(User $user)
    {
        return view('message.create', compact('user'));
    }

    public function add(User $user)
    {
        $data = request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $data += [
            'sender_id' => auth()->user()->id,
            'receiver_id' => $user->id,
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
            'read' => 0
        ];
        DB::table('messages')->insert($data);
        return view('profile.home', ['user' => auth()->user()]);
    }

    public static function getUserMessages(User $user)
    {
        return Message::where('receiver_id', '=', auth()->user()->id)->get();
    }

    public function show(User $user)
    {
        $user->messages = Message::where('receiver_id', '=', auth()->user()->id)->latest()->paginate(1);
        Message::where('receiver_id', '=', auth()->user()->id)->update(['read' => 1]);
        return view('message.showmine', compact('user'));
    }
}
