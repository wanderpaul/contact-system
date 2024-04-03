<?php

namespace App\Http\Controllers;

use App\Models\UserContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function add(Request $request)
    {
        return view('contacts.add', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);

        $user = UserContact::create([
            'user_id' => Auth::id(),
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
            'company' => $request->company,
        ]);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(UserContact $userContact)
    {
        return view('dashboard', [
            'user_contacts' => UserContact::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserContact $userContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserContact $userContact)
    {
        //
    }

     /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $contact = UserContact::where('id', $request->id);

        $contact->delete();
        return Redirect::to('/dashboard');
    }
}
