<?php

namespace App\Http\Controllers;

use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $winners = Winner::latest()->paginate(10);

        return view('winners.index', compact('winners'))->with('page', request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('winners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->validate([
            'name' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);

        Winner::create($data);

        return redirect()->route('winners.index')->with('succes', 'Winner created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Winner $winner)
    {
        return view('winners.show', compact('winner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Winner $winner)
    {
        return view('winners.edit', compact('winner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Winner $winner)
    {
        $data = $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);

        $winner->update($data);

        return redirect()->route('winners.index')->with('succes', 'Winner created succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Winner $winner)
    {
        $winner->delete();

        return redirect()->route('winners.index')->with('succes', 'Winner deleted succesfully');
    }
    public function user(Winner $winner)
    {
        $winners = Winner::latest()->paginate(10);

        return view('winners.user', compact('winners'));
    }
}
