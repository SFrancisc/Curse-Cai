<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horses = Horse::latest()->paginate(10);

        return view('horses.index', compact('horses'))->with('page', request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('horses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'win_races' => 'required',
            'share' => 'required'
        ]);

        $horse = Horse::create($request->all());

        return redirect()->route('horses.index')->with('succes', 'Horse created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horse $horse)
    {
        return view('horses.show', compact('horse'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horse $horse)
    {
        return view('horses.edit', compact('horse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horse $horse)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'win_races' => 'required',
            'share' => 'required'
        ]);

        $horse->update($request->all());

        return redirect()->route('horses.index')->with('succes', 'Horse created succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horse $horse)
    {
        $horse->delete();

        return redirect()->route('horses.index')->with('succes', 'Horse deleted succesfully');
    }
    public function user(Horse $horse)
    {
        $horses = Horse::latest()->paginate(10);

        return view('horses.user', compact('horses'));
    }
}
