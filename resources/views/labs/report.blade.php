<x-app-layout>
    {{-- This part sends the title to the Top Navigation Bar --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reports Overview') }}
        </h2>
    </x-slot>

    {{-- This is the main body content --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Report Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="bg-blue-50 p-5 rounded-xl border border-blue-100">
                        <span class="text-blue-600 text-sm font-bold uppercase">Total Labs</span>
                        <h3 class="text-3xl font-bold text-slate-900">{{ $totalLabs ?? 0 }}</h3>
                    </div>
                    <div class="bg-green-50 p-5 rounded-xl border border-green-100">
                        <span class="text-green-600 text-sm font-bold uppercase">Available Now</span>
                        <h3 class="text-3xl font-bold text-slate-900">{{ $availableLabs ?? 0 }}</h3>
                    </div>
                    <div class="bg-purple-50 p-5 rounded-xl border border-purple-100">
                        <span class="text-purple-600 text-sm font-bold uppercase">Usage Rate</span>
                        @php
                            $total = $totalLabs ?? 0;
                            $available = $availableLabs ?? 0;
                            $used = max($total - $available, 0);
                            $usageRate = $total > 0 ? intval(round(($used / $total) * 100)) : 0;
                        @endphp
                        <h3 class="text-3xl font-bold text-slate-900">{{ $usageRate }}%</h3>
                    </div>
                </div>

                <div class="border-2 border-dashed border-gray-200 rounded-lg h-64 flex items-center justify-center">
                    <p class="text-gray-400">Detailed analytics and graphs will load here.</p>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>