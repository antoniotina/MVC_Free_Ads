<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store()
    {
        $images = request()->file('file');
        return view('profile.home', ['user' => auth()->user()]);
        dd(... $images);
    }
}
