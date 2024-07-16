<?php

namespace App\Http\Controllers;

use App\Models\Race;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRaceRequest;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $races = Race::latest()->paginate(10);

        return view('races.index' , compact('races'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('races.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRaceRequest $request)
    {
        //create a new Race
        $race = Race::create($request->validated());

        //redirect the user and sent friendly message
        return redirect()->route('races.index')->with('succes', 'Race created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Race $race)
    {
        return view('races.show', compact('race'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Race $race)
    {
        return view('races.edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRaceRequest $request, Race $race)
    {
        //create a new Race
        $race->update($request->validated());

        //redirect the user and sent friendly message
        return redirect()->route('races.index')->with('succes', 'Race updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Race $race)
    {
        //delete the product
        $race->delete();

        //redirect the user and display succes message
        return redirect()->route('races.index')->with('succes', 'Race deleted succesfully');
    }
    /**
     * Go to user page.
     */
    public function user(Race $race)
    {
        $races = Race::latest()->paginate(10);

        return view('races.user', compact('races'));
    }
}
