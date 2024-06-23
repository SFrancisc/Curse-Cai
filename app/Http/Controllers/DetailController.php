<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = Detail::latest()->paginate(10);

        return view('details.index', compact('details'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'horse' => 'required|string|max:255',
            'share' => 'required|integer',
            'winner' => 'boolean'
        ]);

        // Create a new detail
        $detail = Detail::create([
            'horse' => $validatedData['horse'],
            'share' => $validatedData['share'],
            'winner' => $request->input('winner') ? true : false,
        ]);

        // Redirect to details.index with a success message
        return redirect()->route('details.index')->with('success', 'Detail created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Detail $detail)
    {
        return view('details.show', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detail $detail)
    {
        return view('details.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detail $detail)
    {
        //validate input
        $request->validate([
            'horse' => 'required',
            'share' => 'required',
            'winner' => 'boolean'
        ]);

        //create a new detail
        $detail->update([
            'horse' => $request->horse,
            'share' => $request->share,
            'winner' => $request->input('winner') ? true : false,
        ]);


        //redirect to user and send friendly message
        return redirect()->route('details.index')->with('succes','Detail created successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detail $details)
    {
        //delete the detail
        $detail->delete();

        //redirect the user&message
        return redirect()->route('details.index')->with('succes','Detail deleted successfully');
    }
    public function user(Detail $details)
    {
        $details = Detail::latest()->paginate(10);

        return view('details.user', compact('details'));
    }
}
