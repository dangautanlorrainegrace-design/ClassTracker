<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab; // 1. Un-commented this for cleaner code

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 2. Using the imported 'Lab' class directly
        $labs = Lab::all(); 

        // 3. Pass it to the view
        return view('labs.index', compact('labs'));
    }
    public function schedule()
    {
    // WRONG: This will result in a blank page
    view('labs.schedule'); 

    // CORRECT: You must include the 'return' keyword
    return view('labs.schedule'); 
    }
    public function report()
{
    // Getting the counts to display in the header cards
    $totalLabs = \App\Models\Lab::count();
    $availableLabs = \App\Models\Lab::where('status', 'Available')->count();

    return view('labs.report', compact('totalLabs', 'availableLabs'));
}
public function create()
{
    return view('labs.create'); // Shows the form
}

public function store(Request $request)
{
    // Validates the input
    $request->validate([
        'lab_number' => 'required|unique:labs',
        'lab_name' => 'required',
        'status' => 'required'
    ]);

    // Saves to database
    \App\Models\Lab::create($request->all());

    return redirect()->route('labs.index')->with('success', 'Lab created successfully!');
}
}