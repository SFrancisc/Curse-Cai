<?php

namespace App\Http\Controllers;

use App\Models\Bet;
use Illuminate\Http\Request;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bets = Bet::latest()->paginate(10);

        return view('bets.index', compact('bets'))->with('page', request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'amount' => 'required'
        ]);

        Bet::create($data);

        return redirect()->route('bets.index')->with('success', 'Bet created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bet $bet)
    {
        return view('bets.show', compact('bet'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bet $bet)
    {
        return view('bets.edit', compact('bet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bet $bet)
    {
        $data = $request->validate([
            'name' => 'required',
            'amount' => 'required'
        ]);

        $bet->update($data);

        return redirect()->route('bets.index')->with('success', 'Bet updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bet $bet)
    {
        $bet->delete();

        return redirect()->route('bets.index')->with('success', 'Bet deleted successfully');
    }
}
