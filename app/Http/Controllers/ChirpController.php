<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        $chirps = [
            [
                'author' => 'Jane Doe',
                'message' => 'Hello friends',
                'time' =>  '5 minutes ago'
            ],
            [
                'author' => 'Jhone Doe',
                'message' => 'Hello pals',
                'time' =>  '7 minutes ago'
            ]
        ];
        $users = User::get();
        $chirps = Chirp::with('user')->latest()->take(50)->get();
        return view('home', ['chirps' => $chirps, 'users' => $users]);
    }

    public function store(Request $request)
    {
        //die(json_encode($request));
        $validated = $request->validate([
            'message' => 'required|string|max:200',
            'user_id' => 'required|int'
        ]);
        
        $user_id = $validated['user_id'];
        $user = User::where('id', $user_id)->firstOrFail();
        $user->chirps()->create([
            'message' => $validated['message'],
            'created_at' => now()
        ]);

        return redirect('/')->with('success', 'Chirp created');
    }
    
    public function get(int $id)
    {
        $chirp = Chirp::where('id', $id)->firstOrFail();
        return view('/chirps/index', ['chirp' => $chirp]);
    }

    public function delete(int $id)
    {
        $chirp = Chirp::where('id', $id)->firstOrFail();
        $chirp->delete();
        return redirect('/')->with('success', 'Chirp deleted');
    }
}
