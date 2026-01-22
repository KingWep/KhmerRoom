@extends('layouts.LayoutsUser')
@section('title', 'ផ្ទះជួលខ្មែរ - ទំនាក់ទំនង')
@section('content')
    <!-- Main Content -->
    <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Heading & Intro -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-slate-900 mb-2">បញ្ជីបន្ទប់ជួល</h2>
            <p class="text-slate-500 max-w-2xl text-base">
                សូមពិនិត្យមើលស្ថានភាពបន្ទប់ និងតម្លៃជួលប្រចាំខែនៅខាងក្រោម។ លោកអ្នកអាចប្រើប្រាស់ Filter
                ដើម្បីស្វែងរកបន្ទប់តាមជាន់ ឬតាមស្ថានភាពជាក់ស្តែង។
            </p>
        </div>
        <!-- Filters Section -->
        <div class="bg-white  rounded-xl p-4 shadow-sm border border-slate-200 mb-8">
            <div class="flex flex-col md:flex-row gap-4 items-start md:items-end justify-between">
                <!-- Filter Groups -->
                <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                    <!-- Floor Filter -->
                    <div class="flex flex-col gap-1.5 w-full sm:w-48">
                        <label class="text-xs font-semibold uppercase tracking-wide text-slate-500  ml-1">ជាន់
                            (Floor)</label>
                        <div class="relative">
                            <select
                                class="w-full pl-3 pr-10 py-2.5 bg-slate-50  border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary appearance-none cursor-pointer text-slate-700  font-medium">
                                <option>ទាំងអស់ (All Floors)</option>
                                <option>ជាន់ទី ១ (1st Floor)</option>
                                <option>ជាន់ទី ២ (2nd Floor)</option>
                                <option>ជាន់ទី ៣ (3rd Floor)</option>
                                <option>ជាន់ទី ៤ (4th Floor)</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-[20px]"></span>
                        </div>
                    </div>
                    <!-- Status Filter -->
                    <div class="flex flex-col gap-1.5 w-full sm:w-48">
                        <label class="text-xs font-semibold uppercase tracking-wide text-slate-500  ml-1">ស្ថានភាព
                            (Status)</label>
                        <div class="relative">
                            <select
                                class="w-full pl-3 pr-10 py-2.5 bg-slate-50  border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary appearance-none cursor-pointer text-slate-700  font-medium">
                                <option>ទាំងអស់ (All Status)</option>
                                <option>ទំនេរ (Available)</option>
                                <option>ជួលរួច (Rented)</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-[20px]"></span>
                        </div>
                    </div>
                </div>
                <!-- Search/Summary -->
                <div class="w-full md:w-auto flex items-center justify-between md:justify-end gap-3">
                    <div class="hidden md:block text-sm text-slate-500  font-medium text-right">
                        បង្ហាញ <span class="text-slate-900 font-bold">12</span> បន្ទប់
                    </div>
                    <div class="relative w-full md:w-64">
                        <input
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50  border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary text-slate-700  placeholder:text-slate-400"
                            placeholder="ស្វែងរកលេខបន្ទប់..." type="text" />
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Rooms Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($rooms as $room)
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-slate-100 flex flex-col h-full">
                
                <div class="relative aspect-[5/3] overflow-hidden">
                    @if($room->images)
                        <img src="{{ $room->images }}" alt="Room {{ $room->room_number }}" 
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">គ្មានរូបភាព</div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-80"></div>
                    <div class="absolute top-4 left-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-xl text-[10px] font-bold uppercase tracking-widest backdrop-blur-md {{ $room->status == 'available' ? 'bg-emerald-500/90 text-white' : 'bg-rose-500/90 text-white' }}">
                            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse me-2"></span>
                            {{ $room->status == 'available' ? 'ទំនេរ' : 'មិនទំនេរ' }}
                        </span>
                    </div>

                    <div class="absolute bottom-4 left-5 right-5">
                        <h3 class="text-white text-xl font-bold tracking-tight">
                            {{ $room->name }}
                        </h3>
                        <div class="flex items-center gap-2 mt-1 text-slate-300 text-xs">
                            <span>ជាន់ទី {{ $room->floor ?? '1' }}</span>
                            <span class="w-1 h-1 rounded-full bg-slate-500"></span>
                            <span>{{ $room->size ?? '25' }} m²</span>
                        </div>
                    </div>
                </div>

                <div class="p-6 flex flex-col flex-grow">
                    <p class="text-md font-bold text-slate-400 uppercase  mb-4">សម្ភារៈក្នុងបន្ទប់</p>
                    <div class="grid grid-cols-2 gap-y-3 mb-6">
                        @if($room->accessories)
                            @foreach($room->accessories as $item)
                                <div class="flex items-center group/item">
                                    <div class="w-5 h-5 rounded-lg bg-slate-50 flex items-center justify-center text-blue-500 group-hover/item:bg-blue-50 group-hover/item:text-blue-600 transition-colors">
                                        @if($item == 'AC')
                                            <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M19 19H5V5h14M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m-8 12h2v2h-2m-4-2h10V7H7m2 2h6v2H9z" /></svg>
                                        @elseif($item == 'WiFi')
                                            <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M12 21.05L4.44 13.5c1.45-1.45 3.32-2.18 5.19-2.2c1.87-.03 3.75.64 5.2 2.05l2.73-2.73c-2.14-2.15-4.97-3.26-7.8-3.32c-2.84-.07-5.69.94-7.87 3.05L1.44 10.5C4.36 7.58 8.18 6.13 12 6.13c3.82 0 7.64 1.45 10.56 4.37l-2.45 2.45c-2.22-2.22-5.13-3.35-8.11-3.39c-2.99-.04-6 1.05-8.31 3.25L12 21.05Z" /></svg>
                                        @elseif($item == 'ExtraBed')
                                            <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M19 7h-8v7H3V5H1v15h2v-3h18v3h2v-9a4 4 0 0 0-4-4m-2 5h-4V9h4z" /></svg>
                                        @elseif($item == 'Fridge')
                                            <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M7 2h10a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2m0 2v7h10V4zm0 9v7h10v-7zm1 1v3h2v-3zm0-5v2h2V9z" /></svg>
                                        @elseif($item == 'TV')
                                            <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M21 3H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h5v2h8v-2h5c1.1 0 1.99-.9 1.99-2L23 5c0-1.1-.9-2-2-2m0 14H3V5h18z" /></svg>
                                        @elseif($item == 'WaterHeater')
                                            <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="currentColor" d="M13 3h-2c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h2c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 16h-2V5h2zM7 7h1v2H7zm0 4h1v2H7zm0 4h1v2H7zm10-8h-1v2h1zm0 4h-1v2h1zm0 4h-1v2h1z" /></svg>
                                        @endif
                                    </div>
                                    <span class="ms-3 text-xs font-semibold text-slate-600">
                                        @switch($item)
                                            @case('AC') ម៉ាស៊ីនត្រជាក់ @break
                                            @case('WiFi') វ៉ាយហ្វាយ @break
                                            @case('ExtraBed') គ្រែបន្ថែម @break
                                            @case('Fridge') ទូរទឹកកក @break
                                            @case('TV') ទូរទស្សន៍ @break
                                            @case('WaterHeater') ទឹកក្តៅ @break
                                            @default {{ $item }}
                                        @endswitch
                                    </span>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="mt-auto pt-2 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1">តម្លៃស្នាក់នៅ</span>
                            <div class="flex items-baseline gap-1">
                                <span class="text-2xl font-black text-blue-600">${{ number_format($room->price, 0) }}</span>
                                <span class="text-xs font-medium text-slate-400">/ខែ</span>
                            </div>
                        </div>

                        <a href="#" class="h-12 w-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center shadow-lg shadow-blue-200 hover:bg-blue-700 hover:shadow-blue-300 transition-all duration-300 group-hover:rotate-12">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center gap-2 mt-5 mb-12">
            <button
                class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white  text-slate-500  hover:border-primary hover:text-primary transition-colors disabled:opacity-50"
                disabled="">
                <span class="material-symbols-outlined text-[18px]">chevron_left</span>
            </button>
            <button
                class="flex items-center justify-center size-9 rounded-lg border border-primary bg-primary text-white font-bold text-sm">1</button>
            <button
                class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white  text-slate-700  hover:border-primary hover:text-primary transition-colors text-sm">2</button>
            <button
                class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white  text-slate-700  hover:border-primary hover:text-primary transition-colors text-sm">3</button>
            <button
                class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white  text-slate-500  hover:border-primary hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-[18px]">chevron_right</span>
            </button>
        </div>
    </main>
@endsection