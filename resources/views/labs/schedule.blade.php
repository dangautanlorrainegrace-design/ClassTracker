@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6 border-b pb-4">
        <h2 class="text-2xl font-bold text-slate-900">Lab Schedule</h2>
        <div class="flex space-x-2">
            <a href="{{ route('labs.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                Back to List
            </a>
            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Add Entry
            </button>
        </div>
    </div>

    <!-- Your Schedule Content Goes Here -->
    <div class="py-10 text-center text-gray-400 italic">
        Schedule calendar or table coming soon...
    </div>
</div>
@endsection