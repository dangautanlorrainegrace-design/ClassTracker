<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laboratory; // Import the Model Raffy created

class LabController extends Controller
{
    /**
     * Display the main Laboratory Inventory.
     */
    public function index()
    {
        // Fetch all labs from the database
        $labs = Laboratory::all(); 
        
        // Return Raffy's UI (resources/views/labs/index.blade.php)
        return view('labs.index', compact('labs'));
    }

    /**
     * Display the Lab Schedule (Gina's Requirement).
     */
    public function schedule()
    {
        return view('labs.schedule');
    }

    /**
     * Display the Lab Reports (Arlene's Requirement).
     */
    public function report()
    {
        return view('labs.report');
    }

    /**
     * Handle the creation of a new lab.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lab_number' => 'required|unique:laboratories',
            'lab_name' => 'required',
            'capacity' => 'required|integer',
        ]);

        Laboratory::create([
            'lab_number' => $request->lab_number,
            'lab_name' => $request->lab_name,
            'capacity' => $request->capacity,
            'status' => 'Available',
        ]);

        return redirect()->back()->with('success', 'Laboratory added successfully!');
    }
}