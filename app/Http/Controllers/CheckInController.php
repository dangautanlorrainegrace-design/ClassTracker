<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lab; // Ensure this matches your model name
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
    /**
     * Toggle the status of a laboratory between Available and Occupied.
     */
    public function toggleStatus(Request $request, $id) 
    {
        // 1. Find the lab or fail with a 404
        $lab = Lab::findOrFail($id);
        
        // 2. Toggle logic
        $lab->status = ($lab->status === 'Available') ? 'Occupied' : 'Available';
        $lab->save();

        // 3. Return to the dashboard with a success message
        return back()->with('status', "Lab {$lab->lab_number} is now {$lab->status}");
    }
}