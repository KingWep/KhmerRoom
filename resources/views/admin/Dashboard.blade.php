@extends('layouts.LayoutsAdmin')

@section('title', 'ផ្ទាំងគ្រប់គ្រង - Khmer Rental')

@section('content')
<main class="flex-1 overflow-y-auto flex flex-col min-h-screen bg-gray-50">
    <div class="p-8 max-w-[1440px] mx-auto w-full">
        
        <div class="mb-8">
            <h2 class="text-3xl font-black text-[#121717] tracking-tight mb-2">ផ្ទាំងគ្រប់គ្រង (Dashboard)</h2>
            <p class="text-[#658683]">ទិដ្ឋភាពទូទៅនៃប្រតិបត្តិការអាជីវកម្មជួលប្រចាំថ្ងៃ</p>
        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-[#dce5e4] shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-[#658683] text-sm mb-1">បន្ទប់សរុប</p>
                        <p class="text-3xl font-black text-[#121717]">48</p>
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
                        <p class="text-3xl font-black text-green-700">12</p>
                    </div>
                    <div class="size-14 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                        <span class="material-symbols-outlined text-3xl">meeting_room</span>
                    </div>
                </div>
            </div>

            <div class="bg-red-50 p-6 rounded-2xl border border-red-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-red-600 text-sm mb-1 font-bold">បន្ទប់មានអ្នកជួល</p>
                        <p class="text-3xl font-black text-red-700">34</p>
                    </div>
                    <div class="size-14 rounded-full bg-red-100 flex items-center justify-center text-red-600">
                        <span class="material-symbols-outlined text-3xl">group</span>
                    </div>
                </div>
            </div>

            <div class="bg-amber-50 p-6 rounded-2xl border border-amber-200 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-amber-600 text-sm mb-1 font-bold">កំពុងជួសជុល</p>
                        <p class="text-3xl font-black text-amber-700">2</p>
                    </div>
                    <div class="size-14 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                        <span class="material-symbols-outlined text-3xl">build</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-6 mb-8">
            <div class="bg-[#121717] p-8 rounded-3xl shadow-lg relative overflow-hidden group">
                <div class="relative z-10">
                    <p class="text-gray-400 text-sm mb-2">ចំណូលប្រចាំខែ</p>
                    <h3 class="text-4xl font-black text-white">$4,250.00</h3>
                    <p class="text-green-400 text-xs mt-2 flex items-center gap-1">
                        <span class="material-symbols-outlined text-sm">trending_up</span> បានបង់រួចអស់
                    </p>
                </div>
                <span class="material-symbols-outlined absolute -right-4 -bottom-4 text-[120px] text-white/5 group-hover:rotate-12 transition-transform">monitoring</span>
            </div>

            <div class="bg-white p-8 rounded-3xl border-2 border-red-100 shadow-sm">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-[#658683] text-sm mb-2 font-bold uppercase tracking-wider">ប្រាក់មិនទាន់បង់</p>
                        <h3 class="text-4xl font-black text-red-600">$840.00</h3>
                        <p class="text-[#658683] text-sm mt-2">8 ការបង់ប្រាក់រង់ចាំ</p>
                    </div>
                    <div class="size-14 rounded-2xl bg-red-50 flex items-center justify-center text-red-600">
                        <span class="material-symbols-outlined text-3xl">error</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-[#dce5e4] shadow-sm p-6 mb-8">
            <h3 class="text-xl font-black text-[#121717] mb-6 flex items-center gap-2">
                <span class="material-symbols-outlined">grid_view</span> ស្ថានភាពបន្ទប់
            </h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @php
                    $rooms = [
                        ['no' => '101', 'floor' => '1', 'status' => 'available'],
                        ['no' => '102', 'floor' => '1', 'status' => 'occupied'],
                        ['no' => '103', 'floor' => '1', 'status' => 'maintenance'],
                        ['no' => '104', 'floor' => '1', 'status' => 'occupied'],
                    ];
                @endphp
                @foreach($rooms as $room)
                    <div class="p-5 rounded-2xl border-2 text-center transition-all hover:shadow-md 
                        {{ $room['status'] == 'available' ? 'border-green-100 bg-green-50/50' : 
                           ($room['status'] == 'occupied' ? 'border-red-100 bg-red-50/50' : 'border-amber-100 bg-amber-50/50') }}">
                        <p class="text-lg font-black text-[#121717]">បន្ទប់ {{ $room['no'] }}</p>
                        <p class="text-xs text-[#658683] mb-3">ជាន់ទី {{ $room['floor'] }}</p>
                        
                        @if($room['status'] == 'available')
                            <span class="px-3 py-1 bg-green-500 text-white text-[10px] font-bold rounded-full uppercase">ទំនេរ</span>
                        @elseif($room['status'] == 'occupied')
                            <span class="px-3 py-1 bg-red-500 text-white text-[10px] font-bold rounded-full uppercase">មានអ្នកជួល</span>
                        @else
                            <span class="px-3 py-1 bg-amber-500 text-white text-[10px] font-bold rounded-full uppercase">ជួសជុល</span>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bg-white rounded-3xl border border-[#dce5e4] shadow-sm overflow-hidden">
            <div class="p-6 border-b border-[#dce5e4] flex justify-between items-center">
                <h3 class="text-xl font-black text-[#121717] flex items-center gap-2">
                    <span class="material-symbols-outlined">history</span> ការបង់ប្រាក់ថ្មីៗ
                </h3>
                <a href="#" class="text-primary font-bold text-sm hover:underline">មើលទាំងអស់</a>
            </div>
            <div class="p-0">
                <table class="w-full text-left">
                    <tbody class="divide-y divide-[#dce5e4]">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <p class="font-bold text-[#121717]">សៅ វិបុល</p>
                                <p class="text-xs text-[#658683]">បន្ទប់ 102 - មករា 2026</p>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="text-lg font-black text-[#121717]">$250</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span class="px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-lg tracking-wide">PAID</span>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection