<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h1 class="text-3xl font-bold text-slate-900 mb-6">CiCT Lab Occupancy</h1>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($labs as $lab)
                    <div class="p-4 rounded-xl border bg-white shadow-sm transition-all hover:shadow-md">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">Room {{ $lab->lab_number }}</h3>
                                <p class="text-sm text-gray-500">{{ $lab->lab_name }}</p>
                            </div>
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $lab->status == 'Available' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $lab->status }}
                            </span>
                        </div>

                        @if(Auth::user()->role == 'faculty')
                            <form action="{{ route('lab.toggle', $lab->id) }}" method="POST">
                                @csrf
                                <button class="w-full py-2 rounded-lg font-medium border {{ $lab->status == 'Available' ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700' }}">
                                    {{ $lab->status == 'Available' ? 'Check-In' : 'Check-Out' }}
                                </button>
                            </form>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
