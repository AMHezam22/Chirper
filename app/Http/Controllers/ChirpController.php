<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('chirps.index',[
            'chirps' => Chirp::with('user')->latest()->get(),
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
        // to ensure that the message is string and doesn't exceed 255 character
        // then save it to new variable validated.
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'title' => 'required|string|max:125',
        ]);
        // from the request variable the currently authenticated user 
        // Laravel's auth() function is commonly used for user authentication,
        // and ->user() fetches the authenticated user

        // this code creates a new chirp and associates it with the currently authenticated user,
        //  using data provided in the $validated array, assuming that the relationships
        //  and model definitions in your Laravel application are correctly set up.
        $request->user()->chirp()->create($validated);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}