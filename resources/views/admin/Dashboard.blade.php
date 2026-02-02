@extends('layouts.LayoutsAdmin')

@section('title', 'ផ្ទាំងគ្រប់គ្រង - Khmer Rental')

@section('content')
<main class="flex-1 overflow-y-auto flex flex-col min-h-screen bg-gray-50">
    <div class="p-0 max-w-[1440px] mx-auto w-full">
        
        {{-- Header --}}
        <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h2 class="text-3xl font-black text-[#121717] tracking-tight mb-2">ផ្ទាំងគ្រប់គ្រង (Dashboard)</h2>
                <p class="text-[#658683]">ទិដ្ឋភាពទូទៅនៃប្រតិបត្តិការអាជីវកម្មជួលប្រចាំថ្ងៃ</p>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-500">
                    <i class="fas fa-calendar-alt mr-1"></i>
                    {{ \Carbon\Carbon::now()->format('d M Y') }}
                </span>
            </div>
        </div>

        {{-- Room Statistics Cards --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-[#dce5e4] shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[#658683] text-sm mb-1">បន្ទប់សរុប</p>
                        <p class="text-3xl font-black text-[#121717]">{{ $totalRooms }}</p>
                    </div>
                    <div class="size-14 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                        <span class="material-symbols-outlined text-3xl">domain</span>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 p-6 rounded-2xl border border-green-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-green-600 text-sm mb-1 font-bold">បន្ទប់ទំនេរ</p>
                        <p class="text-3xl font-black text-green-700">{{ $availableRooms ?? 0 }}</p>
                    </div>
                    <div class="size-14 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                        <span class="material-symbols-outlined text-3xl">meeting_room</span>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 p-6 rounded-2xl border border-blue-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-blue-600 text-sm mb-1 font-bold">បន្ទប់មានអ្នកជួល</p>
                        <p class="text-3xl font-black text-blue-700">{{ $occupiedRooms ?? 0 }}</p>
                    </div>
                    <div class="size-14 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                        <span class="material-symbols-outlined text-3xl">group</span>
                    </div>
                </div>
            </div>

            <div class="bg-amber-50 p-6 rounded-2xl border border-amber-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-amber-600 text-sm mb-1 font-bold">កំពុងជួសជុល</p>
                        <p class="text-3xl font-black text-amber-700">{{ $maintenanceRooms ?? 0 }}</p>
                    </div>
                    <div class="size-14 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                        <span class="material-symbols-outlined text-3xl">build</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Income Cards --}}
        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <div class="bg-gradient-to-br from-[#121717] to-[#2a3a3a] p-8 rounded-3xl shadow-lg relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-gray-400 text-sm mb-2 flex items-center gap-2">
                        <i class="fas fa-calendar-check"></i>
                        ចំណូលប្រចាំខែ ({{ \Carbon\Carbon::now()->format('M Y') }})
                    </p>
                    <h3 class="text-4xl font-black text-white">${{ number_format($monthlyIncome ?? 0, 2) }}</h3>
                    <p class="text-green-400 text-sm mt-3 flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">check_circle</span> 
                        ការបង់ប្រាក់ដែលបានបញ្ជាក់
                    </p>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-[120px] text-white/5 group-hover:rotate-12 transition-transform">monitoring</span>
            </div>

            <div class="bg-white p-8 rounded-3xl border-2 border-red-100 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[#658683] text-sm mb-2 font-bold uppercase tracking-wider flex items-center gap-2">
                            <i class="fas fa-exclamation-triangle text-red-500"></i>
                            ប្រាក់មិនទាន់បង់
                        </p>
                        <h3 class="text-4xl font-black text-red-600">${{ number_format($unpaidAmount ?? 0, 2) }}</h3>
                        <p class="text-[#658683] text-sm mt-2">
                            <span class="font-bold text-red-500">{{ $pendingCount ?? 0 }}</span> ការបង់ប្រាក់រង់ចាំ
                        </p>
                    </div>
                    <div class="size-14 rounded-2xl bg-red-50 flex items-center justify-center text-red-600">
                        <span class="material-symbols-outlined text-3xl">pending_actions</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Quick Stats Row --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-users text-purple-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">អ្នកជួលសរុប</p>
                        <p class="text-xl font-bold text-gray-800">{{ $totalTenants ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-contract text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">ការជួលសកម្ម</p>
                        <p class="text-xl font-bold text-gray-800">{{ $activeRentals ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-percentage text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">អត្រាកាន់កាប់</p>
                        <p class="text-xl font-bold text-gray-800">
                            {{ $totalRooms > 0 ? round(($occupiedRooms / $totalRooms) * 100) : 0 }}%
                        </p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-door-open text-orange-600"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500">បន្ទប់ទំនេរ</p>
                        <p class="text-xl font-bold text-gray-800">
                            {{ $totalRooms > 0 ? round(($availableRooms / $totalRooms) * 100) : 0 }}%
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Room Status Grid --}}
        <div class="bg-white rounded-3xl border border-[#dce5e4] shadow-sm p-6 mb-8">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-black text-[#121717] flex items-center gap-2">
                    <span class="material-symbols-outlined">grid_view</span> ស្ថានភាពបន្ទប់
                </h3>
                <a href="{{ route('admin.rooms.index') }}" class="text-primary font-bold text-sm hover:underline flex items-center gap-1">
                    គ្រប់គ្រងបន្ទប់
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @forelse($rooms as $room)
                    <div class="p-4 rounded-2xl border-2 text-center transition-all hover:shadow-md cursor-pointer
                        {{ $room['status'] == 'available' ? 'border-green-200 bg-green-50/50 hover:border-green-300' : 
                           ($room['status'] == 'occupied' ? 'border-blue-200 bg-blue-50/50 hover:border-blue-300' : 'border-amber-200 bg-amber-50/50 hover:border-amber-300') }}">
                        <div class="h-10 w-10 mx-auto mb-2 rounded-full flex items-center justify-center
                            {{ $room['status'] == 'available' ? 'bg-green-100 text-green-600' : 
                               ($room['status'] == 'occupied' ? 'bg-blue-100 text-blue-600' : 'bg-amber-100 text-amber-600') }}">
                            <i class="fas {{ $room['status'] == 'available' ? 'fa-door-open' : ($room['status'] == 'occupied' ? 'fa-user' : 'fa-tools') }}"></i>
                        </div>
                        <p class="text-lg font-black text-[#121717]">{{ $room['no'] }}</p>
                        <p class="text-xs text-[#658683] mb-2">ជាន់ទី {{ $room['floor'] }}</p>
                        
                        @if($room['status'] == 'available')
                            <span class="px-3 py-1 bg-green-500 text-white text-[10px] font-bold rounded-full uppercase">ទំនេរ</span>
                        @elseif($room['status'] == 'occupied')
                            <span class="px-3 py-1 bg-blue-500 text-white text-[10px] font-bold rounded-full uppercase">មានអ្នកជួល</span>
                        @else
                            <span class="px-3 py-1 bg-amber-500 text-white text-[10px] font-bold rounded-full uppercase">ជួសជុល</span>
                        @endif
                    </div>
                @empty
                    <div class="col-span-full text-center py-8 text-gray-400">
                        <i class="fas fa-inbox text-4xl mb-2"></i>
                        <p>មិនមានបន្ទប់នៅឡើយទេ</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Recent Payments Table --}}
        <div class="bg-white rounded-3xl border border-[#dce5e4] shadow-sm overflow-hidden">
            <div class="p-6 border-b border-[#dce5e4] flex justify-between items-center">
                <h3 class="text-xl font-black text-[#121717] flex items-center gap-2">
                    <span class="material-symbols-outlined">history</span> ការបង់ប្រាក់ថ្មីៗ
                </h3>
                <a href="{{ route('admin.payments') }}" class="text-primary font-bold text-sm hover:underline flex items-center gap-1">
                    មើលទាំងអស់
                    <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 border-b border-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">អ្នកជួល</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">បន្ទប់</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase">សម្រាប់ខែ</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase text-right">ទឹកប្រាក់</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase text-center">ស្ថានភាព</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#dce5e4]">
                        @forelse($recentPayments ?? [] as $payment)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-9 w-9 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold text-sm">
                                            {{ strtoupper(mb_substr($payment->rental->tenant->name ?? 'N', 0, 1, 'UTF-8')) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-[#121717]">{{ $payment->rental->tenant->name ?? 'N/A' }}</p>
                                            <p class="text-xs text-[#658683]">{{ \Carbon\Carbon::parse($payment->paid_date)->format('d M Y') }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-medium text-gray-700">{{ $payment->rental->room->room_number ?? 'N/A' }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-gray-600">{{ \Carbon\Carbon::parse($payment->pay_month)->format('M Y') }}</span>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <span class="text-lg font-black text-[#121717]">${{ number_format($payment->amount_paid, 2) }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    @if($payment->status == 'paid')
                                        <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-lg tracking-wide">បង់រួច</span>
                                    @elseif($payment->status == 'pending')
                                        <span class="px-3 py-1 bg-yellow-100 text-yellow-600 text-xs font-bold rounded-lg tracking-wide">រង់ចាំ</span>
                                    @else
                                        <span class="px-3 py-1 bg-red-100 text-red-600 text-xs font-bold rounded-lg tracking-wide">ហួសកំណត់</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-gray-400">
                                    <div class="flex flex-col items-center gap-2">
                                        <i class="fas fa-inbox text-4xl"></i>
                                        <p>មិនមានការបង់ប្រាក់ថ្មីៗនៅឡើយទេ</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
