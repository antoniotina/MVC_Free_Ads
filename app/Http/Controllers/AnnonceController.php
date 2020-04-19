<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnnonceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('annonce.create');
    }

    public function showAll()
    {
        $annonces = Annonce::latest()->paginate(10);
        return view('annonce.showall', compact('annonces'));
    }

    public function searchAd()
    {
        $searchTerm = request()->validate([
            'searchTerm' => ''
        ])['searchTerm'];
        $annonces = Annonce::where('title', 'LIKE', "%{$searchTerm}%")
            ->orWhere('description', 'LIKE', "%{$searchTerm}%")
            ->orWhere('price', 'LIKE', "%{$searchTerm}%")
            ->latest()
            ->paginate(10);
        return view('annonce.showall', ['annonces' => $annonces, 'searchTerm' => $searchTerm]);
    }

    public function add()
    {
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
            //'image' => 'required|image'
        ]);

        auth()->user()->annonces()->create($data);
        return view('profile.home', ['user' => auth()->user()]);
    }

    public function edit(Annonce $annonce)
    {
        if (auth()->user()->id == $annonce->user_id) {
            return view('annonce.edit', compact('annonce'));
        }
        return view('annonce.show', ['user' => auth()->user()]);
    }

    public function update(Annonce $annonce)
    {
        $data = request()->validate(['title' => 'required', 'description' => 'required', 'price' => 'required']);
        if (auth()->user()->id == $annonce->user_id) {
            $annonce->update($data);
        }
        return view('profile.home', ['user' => auth()->user()]);
    }

    public function delete(Annonce $annonce)
    {
        if (auth()->user()->annonces()->find($annonce)) {
            $annonce->delete();
        }
        return view('profile.home', ['user' => auth()->user()]);
    }
}
