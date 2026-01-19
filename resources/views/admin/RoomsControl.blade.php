@extends('layouts.LayoutsAdmin')

@section('title', 'គ្រប់គ្រងបន្ទប់ - Khmer Rental')

@section('content')

@php
    // Define fake data directly in the front-end
    $fakeRooms = collect([
        (object)[
            'id' => 1,
            'roomNumber' => '101',
            'floor' => 1,
            'price' => 180,
            'status' => 'available',
            'description' => 'ម៉ាស៊ីនត្រជាក់, គ្រែឈើ, ទូទឹកកក...'
        ],
        (object)[
            'id' => 2,
            'roomNumber' => '102',
            'floor' => 1,
            'price' => 150,
            'status' => 'occupied',
            'description' => 'កង្ហារ, គ្រែ, បន្ទប់ទឹកក្នុង...'
        ],
        (object)[
            'id' => 3,
            'roomNumber' => '201',
            'floor' => 2,
            'price' => 200,
            'status' => 'maintenance',
            'description' => 'កំពុងលាបថ្នាំថ្មី និងដូរអំពូល'
        ],
        (object)[
            'id' => 4,
            'roomNumber' => '202',
            'floor' => 2,
            'price' => 180,
            'status' => 'available',
            'description' => 'បន្ទប់ធំទូលាយ មានបង្អួចចំហៀង'
        ],
    ]);

    // Simple search filter logic on the front-end
    $search = request('search');
    if ($search) {
        $fakeRooms = $fakeRooms->filter(function($room) use ($search) {
            return str_contains(strtolower($room->roomNumber), strtolower($search)) || 
                   str_contains(strtolower($room->description), strtolower($search));
        });
    }
@endphp

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Sans+Khmer:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    body { font-family: 'Inter', 'Noto Sans Khmer', sans-serif; }
    .premium-card {
        background: #ffffff;
        border: 1px solid #f0f2f5;
        box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.05);
    }
    table { font-size: 15px; }
    .row-fade-in { animation: fadeIn 0.5s ease forwards; }
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<main class="flex-1 overflow-y-auto flex flex-col min-h-screen bg-[#F8F9FB]">
    <div class="p-8 max-w-[1600px] mx-auto w-full">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-12">
            <div class="space-y-2">
                <div class="flex items-center gap-3 text-primary/60 mb-1">
                    <span class="text-xs uppercase tracking-[0.3em] font-bold text-blue-600">Workspace</span>
                    <span class="size-1.5 rounded-full bg-blue-200"></span>
                    <span class="text-xs uppercase tracking-[0.3em] font-bold">Property Units</span>
                </div>
                <h2 class="text-4xl font-semibold text-[#121826] tracking-tight">គ្រប់គ្រងបន្ទប់</h2>
                <p class="text-lg text-gray-500 font-light">ទិន្នន័យសាកល្បង (Local Mock Data)</p>
            </div>
            
            <button class="inline-flex items-center gap-3 bg-[#121826] text-white px-8 py-4 rounded-2xl text-base font-medium hover:bg-black hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                <span class="material-symbols-outlined text-[24px]">add_circle</span>
                បន្ថែមបន្ទប់ថ្មី
            </button>
        </div>

        <div class="premium-card rounded-3xl mb-10 flex flex-col md:flex-row gap-4 items-center bg-white">
            <form action="" method="GET" class="relative flex-1 w-full">
                <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 text-[24px]">search</span>
                <input type="text" name="search" value="{{ request('search') }}" 
                    placeholder="ស្វែងរកលេខបន្ទប់ ឬការបរិយាយ..." 
                    class="w-full pl-14 pr-6 py-4 bg-transparent border-none text-lg focus:ring-0 outline-none font-light">
            </form>
    
            <div class="flex items-center gap-3 pr-3">
                <select class="bg-gray-50 border-none text-base text-gray-700 rounded-2xl px-8 py-2 outline-none font-medium cursor-pointer">
                    <option>គ្រប់ជាន់</option>
                    <option>ជាន់ទី ១</option>
                    <option>ជាន់ទី ២</option>
                </select>
            </div>
        </div>

        <div class="premium-card rounded-[2.5rem] overflow-hidden bg-white border-none shadow-xl">
            <table class="w-full text-left">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100/80">
                        <th class="px-10 py-7 text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">ព័ត៌មានបន្ទប់</th>
                        <th class="px-10 py-7 text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">តម្លៃប្រចាំខែ</th>
                        <th class="px-10 py-7 text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">ស្ថានភាពបច្ចុប្បន្ន</th>
                        <th class="px-10 py-7 text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">បរិយាយ</th>
                        <th class="px-10 py-7 text-xs font-bold text-gray-400 uppercase tracking-[0.2em] text-right">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($fakeRooms as $room)
                    <tr class="hover:bg-blue-50/30 transition-all duration-300 group row-fade-in">
                        <td class="px-10 py-8">
                            <div class="flex flex-col gap-1">
                                <span class="text-xl font-bold text-gray-900 italic">Room {{ $room->roomNumber }}</span>
                                <span class="text-sm text-gray-500 font-medium">ជាន់ទី {{ $room->floor }}</span>
                            </div>
                        </td>
                        <td class="px-10 py-8">
                            <div class="text-xl font-bold text-[#121826] font-sans">
                                ${{ number_format($room->price, 2) }}
                            </div>
                        </td>
                        <td class="px-10 py-8">
                            @if($room->status === 'available')
                                <span class="inline-flex items-center gap-2.5 px-5 py-2 rounded-xl text-sm font-bold bg-green-100/50 text-green-600 border border-green-200/30">
                                    <span class="size-2 bg-green-500 rounded-full"></span> ទំនេរ
                                </span>
                            @elseif($room->status === 'occupied')
                                <span class="inline-flex items-center gap-2.5 px-5 py-2 rounded-xl text-sm font-bold bg-red-100/50 text-red-500 border border-red-200/30">
                                    <span class="size-2 bg-red-500 rounded-full"></span> មានអ្នកជួល
                                </span>
                            @else
                                <span class="inline-flex items-center gap-2.5 px-5 py-2 rounded-xl text-sm font-bold bg-amber-100/50 text-amber-600 border border-amber-200/30">
                                    <span class="size-2 bg-amber-500 rounded-full"></span> ជួសជុល
                                </span>
                            @endif
                        </td>
                        <td class="px-10 py-8 text-base text-gray-400 font-light max-w-[300px] truncate">
                            {{ $room->description }}
                        </td>
                        <td class="px-10 py-8 text-right">
                            <div class="flex justify-end gap-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <button class="size-12 flex items-center justify-center bg-white text-blue-600 rounded-2xl shadow-sm border border-gray-100 hover:bg-blue-600 hover:text-white transition-all">
                                    <span class="material-symbols-outlined text-[22px]">edit</span>
                                </button>
                                <button class="size-12 flex items-center justify-center bg-white text-red-500 rounded-2xl shadow-sm border border-gray-100 hover:bg-red-500 hover:text-white transition-all">
                                    <span class="material-symbols-outlined text-[22px]">delete</span>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-10 py-20 text-center text-gray-400">រកមិនឃើញទិន្នន័យ...</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection