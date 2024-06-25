<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Race;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Race $race)
    {
            $details = $race->details()->paginate(10);
        return view('details.index', compact('race', 'details'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Race $race)
    {
        return view('details.create', compact('race'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Race $race)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'horse' => 'required|string|max:255',
            'share' => 'required|integer',
            'winner' => 'boolean'
        ]);

        // Create a new detail
        $detail = new Detail($validatedData);
        $detail->race()->associate($race);
        $detail->save();

        // Redirect to details.index with a success message
        return redirect()->route('races.details.index', $race)->with('success', 'Detail created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Race $race, Detail $detail)
    {
        return view('details.show', compact('race', 'detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Race $race, Detail $detail)
    {
        return view('details.edit', compact('race', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Race $race, Detail $detail)
    {

        $validatedData = $request->validate([
            'horse' => 'required|string|max:255',
            'share' => 'required|integer',
            'winner' => 'boolean'
        ]);

        $detail->update($validatedData);

        return redirect()->route('races.details.index', $race)->with('success', 'Detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Race $race, Detail $detail)
    {
        //delete the detail
        $detail->delete();

        //redirect the user&message
        return redirect()->route('races.details.index', $race)->with('success', 'Detail deleted successfully');
    }
    public function user(Race $race)
    {
        $details = $race->details()->paginate(10);
        return view('details.user', compact('race', 'details'));

    }
}
