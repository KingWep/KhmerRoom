@extends('layouts.LayoutsUser')
@section('title', $room->name . ' - ផ្ទះជួលខ្មែរ')
@section('content')

<main class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

    <!-- Room Hero -->
    <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-200 mb-8">
        <div class="relative w-full h-96 md:h-[500px]">
            @if($room->images)
                <img src="{{ $room->images }}" alt="Room {{ $room->room_number }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-slate-200 flex items-center justify-center text-slate-400">
                    គ្មានរូបភាព
                </div>
            @endif

            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

            <div class="absolute bottom-6 left-6 text-white">
                <h1 class="text-3xl md:text-5xl font-bold">{{ $room->name }}</h1>
                <p class="text-sm md:text-base mt-1">ជាន់ទី {{ $room->floor ?? 'មិនបានកំណត់' }} • {{ $room->size }} m²</p>
            </div>

            <span class="absolute top-6 left-6 inline-flex items-center px-3 py-1 rounded-xl text-xs font-bold uppercase tracking-widest 
                {{ $room->status == 'available' ? 'bg-emerald-500 text-white' : ($room->status == 'occupied' ? 'bg-rose-500 text-white' : 'bg-yellow-500 text-white') }}">
                {{ $room->status == 'available' ? 'ទំនេរ' : ($room->status == 'occupied' ? 'មានអ្នកស្នាក់នៅ' : 'កំពុងជួសជុល') }}
            </span>
        </div>
    </div>

    <!-- Room Details & Accessories -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Left Column: Details -->
        <div class="md:col-span-2 flex flex-col gap-6">

            <!-- Description -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h2 class="text-xl font-bold text-slate-800 mb-4">ព័ត៌មានបន្ទប់</h2>
                <p class="text-slate-600 text-sm leading-relaxed">{{ $room->description ?? 'គ្មានព័ត៌មានបន្ថែម' }}</p>
            </div>

            <!-- Accessories -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200">
                <h2 class="text-xl font-bold text-slate-800 mb-4">សម្ភារៈក្នុងបន្ទប់</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 gap-4">
                    @if($room->accessories)
                        @foreach($room->accessories as $item)
                            <div class="flex items-center gap-2 bg-slate-50 px-3 py-2 rounded-lg">
                                <div class="w-6 h-6 flex items-center justify-center text-blue-500">
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
                                <span class="text-sm text-slate-600 font-medium">
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
            </div>
        </div>

        <!-- Right Column: Price & Back Button -->
        <div class="flex flex-col gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-200 sticky top-8">
                <h2 class="text-xl font-bold text-slate-800 mb-4">តម្លៃស្នាក់នៅ</h2>
                <div class="flex items-baseline gap-2 mb-6">
                    <span class="text-3xl md:text-4xl font-extrabold text-blue-600">${{ number_format($room->price, 0) }}</span>
                    <span class="text-sm font-medium text-slate-400">/ខែ</span>
                </div>

                <!-- Back to Rooms List Button -->
                <a href="{{ route('public.rooms') }}" 
                   class="w-full inline-flex items-center justify-center gap-2 px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all">
                    <span class="material-symbols-outlined">arrow_back</span>
                    ត្រលប់ទៅបញ្ជីបន្ទប់
                </a>
            </div>
        </div>
    </div>
</main>

@endsection
