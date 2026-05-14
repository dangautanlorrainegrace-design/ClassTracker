@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-slate-900">Laboratory Management</h2>
        <!-- Trigger Modal/Form for Add Lab -->
        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add New Lab</button>
    </div>

    <table class="w-full text-left border-collapse">
        <thead class="bg-gray-50">
            <tr>
                <th class="p-3 border-b">Lab Number</th>
                <th class="p-3 border-b">Name</th>
                <th class="p-3 border-b">Status</th>
                <th class="p-3 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($labs as $lab)
            <tr>
                <td class="p-3">{{ $lab->lab_number }}</td>
                <td class="p-3">{{ $lab->lab_name }}</td>
                <td class="p-3">
                    <span class="{{ $lab->status == 'Available' ? 'text-green-600' : 'text-red-600' }}">
                        {{ $lab->status }}
                    </span>
                </td>
                <td class="p-3">
                    <button class="text-blue-500 hover:underline">Edit</button>
                    <button class="text-red-500 hover:underline ml-2">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection