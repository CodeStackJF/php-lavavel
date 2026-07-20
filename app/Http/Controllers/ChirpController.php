<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChirpController extends Controller
{
    use AuthorizesRequests;

    public function get()
    {
        $users = User::get();
        $chirps = Chirp::with('user')->latest()->take(50)->get();
        $chirp = new Chirp();
        $chirp->id = 0;
        return view('/chirps/index', ['chirps' => $chirps, 'users' => $users, 'chirp' => $chirp]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:200|min:5'
        ],
        [
            'message.required' => 'Write a message please.',
            'message.max' => 'Only 200 is allowed.',
            'message.min' => 'Write at least 5 characters.',
        ]);
        
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->firstOrFail();
        $user->chirps()->create([
            'message' => $validated['message'],
            'created_at' => now()
        ]);

        return redirect('/chirps')->with('success', 'Chirp created');
    }
    
    public function view(Chirp $chirp)
    {
        return view('/chirps/view', ['chirp' => $chirp]);
    }

    public function delete(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);
        $chirp->delete();
        return redirect('/chirps')->with('success', 'Chirp deleted');
    }

    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        $users = User::get();
        return view('/chirps/edit', ['chirp' => $chirp, 'users' => $users]);
    }

    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        $validated = $request->validate([
            'message' => 'required|string|max:200|min:5'
        ],
        [
            'message.required' => 'Write a message please.',
            'message.max' => 'Only 200 is allowed.',
            'message.min' => 'Write at least 5 characters.',
        ]);

        $chirp = $chirp->update($validated);
        return redirect('/chirps')->with('success', 'Chirp updated');
    }
}
