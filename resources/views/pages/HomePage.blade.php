{{-- @extends('layouts.LayoutsUser')

@section('title', 'ផ្ទះជួលខ្មែរ - ទំព័រដើម')

@section('content')
    <main class="flex flex-col items-center mt-0">
        <!-- Hero Section -->
        <section class="w-full max-w-[1200px] px-4 py-6 md:px-8">
            <div class="relative overflow-hidden rounded-xl shadow-xl">
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-700 hover:scale-105"
                    data-alt="modern cambodian rental house exterior with garden"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB7rRUCloCSN0SDM80VBJGIGORTqLzBt6YU5MYxBrrzbm_yD69J14hIyEF4qXmlyqkoUMmqFfygf3b6ov6v0_a8cCO-emB6OGigKuh5WiJROEwAp8fbdciQ65mS3jZsMYde5PRoJC0SPVVUomzO4BfRdcxajnnvPWXvHBGXTKSXjyHXkFwzytUMr0j5sDjMv0bAnWE9N7yk4guOt-ht77sOhSOaRGPjUWjoIbKWSXE0TDyHsSBmAkaU9AgmlA6o5ag6fKiD_2GzZ_M");'>
                </div>
                <div
                    class="relative flex min-h-[480px] flex-col items-center justify-center gap-6 p-8 text-center md:items-start md:text-left">
                    <div class="flex max-w-[600px] flex-col gap-4">
                        <span
                            class="inline-flex w-fit items-center gap-2 rounded-full bg-primary/20 px-3 py-1 text-xs font-medium text-blue-100 font-khmer-title">
                            <span class="material-symbols-outlined text-[16px]">verified</span>
                            ទំនុកចិត្ត និងសុវត្ថិភាព
                        </span>
                        <h1
                            class="font-khmer-title text-4xl font-black leading-tight tracking-tight text-white md:text-5xl lg:text-6xl drop-shadow-sm">
                            បន្ទប់ជួលដែលមាន<br /><span class="text-primary">ផាសុកភាព</span> និងសុវត្ថិភាព
                        </h1>
                        <h2
                            class="font-khmer-body text-base font-normal leading-relaxed text-slate-200 md:text-lg drop-shadow-sm">
                            ទីកន្លែងស្នាក់នៅដ៏ស្ងប់ស្ងាត់ មានសុវត្ថិភាព ២៤ម៉ោង និងតម្លៃសមរម្យសម្រាប់អ្នក។
                            ផ្តល់ជូននូវទឹក ភ្លើងរដ្ឋ និងអ៊ីនធឺណិតល្បឿនលឿន។ ចំណតធំទូលាយ។
                        </h2>
                        <div class="mt-4 flex flex-col gap-3 sm:flex-row">
                            <button
                                class="flex h-12 min-w-[160px] items-center justify-center gap-2 rounded-lg bg-primary hover:bg-blue-600 transition-all px-6 text-white text-base font-bold font-khmer-title shadow-lg shadow-blue-500/30">
                                <span class="material-symbols-outlined">search</span>
                                <span>មើលបន្ទប់ជួល</span>
                            </button>
                            <button
                                class="flex h-12 min-w-[160px] items-center justify-center gap-2 rounded-lg bg-white/10 hover:bg-white/20 transition-all px-6 text-white text-base font-bold font-khmer-title backdrop-blur-md border border-white/20">
                                <span class="material-symbols-outlined">call</span>
                                <span>ទាក់ទងយើង</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="w-full max-w-[1200px] px-4 py-2 md:px-8">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <!-- Stat Cards (no dark/bg-slate) -->
                <div
                    class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 items-center justify-center rounded-full bg-blue-100 text-primary">
                            <span class="material-symbols-outlined">apartment</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium font-khmer-title">ចំនួនបន្ទប់សរុប</p>
                    </div>
                    <p class="text-[#0d141b] text-3xl font-bold leading-tight font-display pl-1">២០
                        <span class="text-lg font-normal text-slate-400 font-khmer-body">បន្ទប់</span>
                    </p>
                </div>
                <div
                    class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 items-center justify-center rounded-full bg-green-100 text-green-600">
                            <span class="material-symbols-outlined">door_open</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium font-khmer-title">ចំនួនបន្ទប់ទំនេរ</p>
                    </div>
                    <p class="text-[#0d141b] text-3xl font-bold leading-tight font-display pl-1">៥
                        <span class="text-lg font-normal text-slate-400 font-khmer-body">បន្ទប់</span>
                    </p>
                </div>
                <div
                    class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 items-center justify-center rounded-full bg-orange-100 text-orange-600">
                            <span class="material-symbols-outlined">payments</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium font-khmer-title">តម្លៃចាប់ពី</p>
                    </div>
                    <p class="text-[#0d141b] text-3xl font-bold leading-tight font-display pl-1">
                        $៦០<span class="text-lg font-normal text-slate-400">/ខែ</span></p>
                </div>
                <div
                    class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 items-center justify-center rounded-full bg-purple-100 text-purple-600">
                            <span class="material-symbols-outlined">wifi</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium font-khmer-title">សេវាកម្ម</p>
                    </div>
                    <p class="text-[#0d141b] text-lg font-bold leading-tight font-khmer-body pt-2 pl-1">
                        ហ្វ្រី Wi-Fi &amp; ទឹក</p>
                </div>
            </div>
        </section>

        <!-- Popular Rooms -->
        <section class="w-full max-w-[1200px] px-4 pt-10 pb-4 md:px-8" id="rooms">
            <div class="flex items-center justify-between">
                <h2 class="text-[#0d141b] text-2xl font-bold leading-tight font-khmer-title flex items-center gap-2">
                    <span class="h-8 w-1.5 rounded-full bg-primary block"></span>
                    បន្ទប់ពេញនិយម
                </h2>
                <a class="text-primary text-sm font-bold hover:underline flex items-center gap-1 font-khmer-title" href="#">
                    មើលទាំងអស់ <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </section>

        <!-- Room Grid -->
        <section class="w-full max-w-[1200px] px-4 pb-12 md:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($rooms as $room)
                    <div
                        class="group relative overflow-hidden rounded-2xl bg-white shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-500">

                        <div class="relative aspect-[4/3] w-full overflow-hidden">
                            <img src="{{ $room->image_url ?? 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&q=80&w=800' }}"
                                alt="{{ $room->name }}"
                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" />

                            @if($room->status == 'available')
                                <div class="absolute top-4 right-4 z-10">
                                    <span
                                        class="flex items-center gap-1.5 rounded-full bg-white/95 backdrop-blur-sm px-3 py-1 text-xs font-bold text-emerald-600 shadow-sm border border-emerald-100">
                                        <span class="relative flex h-2 w-2">
                                            <span
                                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                        </span>
                                        ទំនេរ
                                    </span>
                                </div>
                            @endif
                        </div>

                        <div class="p-5">
                            <div class="mb-3 flex items-start justify-between">
                                <div>
                                    <h3
                                        class="text-lg font-bold text-slate-900 font-khmer-title group-hover:text-primary transition-colors">
                                        {{ $room->name }}
                                    </h3>
                                    <div class="flex items-center text-slate-400 mt-1">
                                        <span class="material-symbols-outlined text-sm">location_on</span>
                                        <span class="text-xs font-khmer-body">{{ $room->floor }}</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="block text-xl font-black text-primary">${{ $room->price }}</span>
                                    <span class="text-[10px] uppercase tracking-wider text-slate-400">ក្នុងមួយខែ</span>
                                </div>
                            </div>

                            <p class="mb-5 text-sm leading-relaxed text-slate-500 font-khmer-body line-clamp-2">
                                {{ $room->description }}
                            </p>

                            <div class="grid grid-cols-3 gap-2 border-t border-slate-50 pt-4">
                                <div
                                    class="flex flex-col items-center justify-center rounded-xl bg-slate-50 p-2 transition-colors group-hover:bg-slate-100">
                                    <span class="material-symbols-outlined text-slate-600 text-lg">square_foot</span>
                                    <span class="mt-1 text-[10px] font-medium text-slate-500">{{ $room->size }} m²</span>
                                </div>
                                <div
                                    class="flex flex-col items-center justify-center rounded-xl bg-slate-50 p-2 transition-colors group-hover:bg-slate-100">
                                    <span class="material-symbols-outlined text-slate-600 text-lg">bed</span>
                                    <span class="mt-1 text-[10px] font-medium text-slate-500">{{ $room->bed_count }} គ្រែ</span>
                                </div>
                                <div
                                    class="flex flex-col items-center justify-center rounded-xl bg-slate-50 p-2 transition-colors group-hover:bg-slate-100">
                                    <span class="material-symbols-outlined text-slate-600 text-lg">
                                        {{ $room->has_ac ? 'ac_unit' : 'mode_fan' }}
                                    </span>
                                    <span class="mt-1 text-[10px] font-medium text-slate-500">
                                        {{ $room->has_ac ? 'ម៉ាស៊ីនត្រជាក់' : 'កង្ហារ' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
@endsection --}}



@extends('layouts.LayoutsUser')

@section('title', 'ផ្ទះជួលខ្មែរ - ទំព័រដើម')

@section('content')
    <main class="flex flex-col items-center mt-0">
        <section class="w-full max-w-[1200px] px-4 py-6 md:px-8">
            <div class="relative overflow-hidden rounded-xl shadow-xl">
                <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-700 hover:scale-105"
                    style='background-image: url("https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&q=80&w=1200");'>
                    <div class="absolute inset-0 bg-slate-900/40"></div>
                </div>
                <div class="relative flex min-h-[480px] flex-col items-center justify-center gap-6 p-8 text-center md:items-start md:text-left">
                    <div class="flex max-w-[600px] flex-col gap-4">
                        <span class="inline-flex w-fit items-center gap-2 rounded-full bg-primary/20 px-3 py-1 text-xs font-medium text-blue-100 font-khmer-title backdrop-blur-sm">
                            <span class="material-symbols-outlined text-[16px]">verified</span>
                            ទំនុកចិត្ត និងសុវត្ថិភាព
                        </span>
                        <h1 class="font-khmer-title text-4xl font-black leading-tight tracking-tight text-white md:text-5xl lg:text-6xl drop-shadow-md">
                            បន្ទប់ជួលដែលមាន<br /><span class="text-primary">ផាសុកភាព</span> និងសុវត្ថិភាព
                        </h1>
                        <h2 class="font-khmer-body text-base font-normal leading-relaxed text-slate-200 md:text-lg drop-shadow-sm">
                            ទីកន្លែងស្នាក់នៅដ៏ស្ងប់ស្ងាត់ មានសុវត្ថិភាព ២៤ម៉ោង និងតម្លៃសមរម្យសម្រាប់អ្នក។
                            ផ្តល់ជូននូវទឹក ភ្លើងរដ្ឋ និងអ៊ីនធឺណិតល្បឿនលឿន។
                        </h2>
                        <div class="mt-4 flex flex-col gap-3 sm:flex-row">
                            <a href="#rooms" class="flex h-12 min-w-[160px] items-center justify-center gap-2 rounded-lg bg-primary hover:bg-blue-600 transition-all px-6 text-white text-base font-bold font-khmer-title shadow-lg shadow-blue-500/30">
                                <span class="material-symbols-outlined">search</span>
                                <span>មើលបន្ទប់ជួល</span>
                            </a>
                            <button class="flex h-12 min-w-[160px] items-center justify-center gap-2 rounded-lg bg-white/10 hover:bg-white/20 transition-all px-6 text-white text-base font-bold font-khmer-title backdrop-blur-md border border-white/20">
                                <span class="material-symbols-outlined">call</span>
                                <span>ទាក់ទងយើង</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="w-full max-w-[1200px] px-4 py-2 md:px-8">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 items-center justify-center rounded-full bg-blue-100 text-primary">
                            <span class="material-symbols-outlined">apartment</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium font-khmer-title">ចំនួនបន្ទប់សរុប</p>
                    </div>
                    <p class="text-[#0d141b] text-3xl font-bold leading-tight font-display pl-1">
                        {{ $totalRooms }} <span class="text-lg font-normal text-slate-400 font-khmer-body">បន្ទប់</span>
                    </p>
                </div>

                <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 items-center justify-center rounded-full bg-green-100 text-green-600">
                            <span class="material-symbols-outlined">door_open</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium font-khmer-title">ចំនួនបន្ទប់ទំនេរ</p>
                    </div>
                    <p class="text-[#0d141b] text-3xl font-bold leading-tight font-display pl-1">
                        {{ $availableRooms }} <span class="text-lg font-normal text-slate-400 font-khmer-body">បន្ទប់</span>
                    </p>
                </div>

                <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 items-center justify-center rounded-full bg-orange-100 text-orange-600">
                            <span class="material-symbols-outlined">payments</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium font-khmer-title">តម្លៃចាប់ពី</p>
                    </div>
                    <p class="text-[#0d141b] text-3xl font-bold leading-tight font-display pl-1">
                        ${{ $minPrice }}<span class="text-lg font-normal text-slate-400">/ខែ</span>
                    </p>
                </div>

                <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center gap-3">
                        <div class="flex size-10 items-center justify-center rounded-full bg-purple-100 text-purple-600">
                            <span class="material-symbols-outlined">wifi</span>
                        </div>
                        <p class="text-slate-500 text-sm font-medium font-khmer-title">សេវាកម្ម</p>
                    </div>
                    <p class="text-[#0d141b] text-lg font-bold leading-tight font-khmer-body pt-2 pl-1">
                        ហ្វ្រី Wi-Fi & ចំណត​ម៉ូតូ
                    </p>
                </div>
            </div>
        </section>

        <section class="w-full max-w-[1200px] px-4 pt-10 pb-4 md:px-8" id="rooms">
            <div class="flex items-center justify-between">
                <h2 class="text-[#0d141b] text-2xl font-bold leading-tight font-khmer-title flex items-center gap-2">
                    <span class="h-8 w-1.5 rounded-full bg-primary block"></span>
                    បន្ទប់ពេញនិយម
                </h2>
                <a class="text-primary text-sm font-bold hover:underline flex items-center gap-1 font-khmer-title" href="#">
                    មើលទាំងអស់ <span class="material-symbols-outlined text-sm">arrow_forward</span>
                </a>
            </div>
        </section>

        <section class="w-full max-w-[1200px] px-4 pb-12 md:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @forelse($rooms as $room)
                    <div class="group relative overflow-hidden rounded-2xl bg-white shadow-sm border border-slate-100 hover:shadow-xl hover:-translate-y-1.5 transition-all duration-500">
                        <div class="relative aspect-[4/3] w-full overflow-hidden">
                            <img src="{{ $room->image_url ?? 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&q=80&w=800' }}"
                                alt="{{ $room->name }}"
                                class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110" />
                            <div class="absolute top-4 right-4 z-10">
                                <span class="flex items-center gap-1.5 rounded-full bg-white/95 backdrop-blur-sm px-3 py-1 text-xs font-bold text-emerald-600 shadow-sm border border-emerald-100">
                                    <span class="relative flex h-2 w-2">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                    </span>
                                    {{ $room->status == 'available' ? 'ទំនេរ' : ($room->status =='occupied' ? 'មានអ្នកស្នាក់នៅ' : 'កំពុងជួសជុល' )}}
                                </span>    
                            </div>
                        </div>

                        <div class="p-3">
                            <div class="mb-3 flex items-start justify-between">
                                <div>
                                    <h3 class="text-lg font-bold text-slate-900 font-khmer-title group-hover:text-primary transition-colors">
                                        {{ $room->name }}
                                    </h3>
                                    <div class="flex items-center text-slate-400 mt-1">
                                        <span class="material-symbols-outlined text-sm">location_on</span>
                                        <span class="text-xs font-khmer-body">{{ $room->floor }}</span>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="block text-xl font-black text-primary">${{ $room->price }}</span>
                                    <span class="text-[10px] uppercase tracking-wider text-slate-400">ក្នុងមួយខែ</span>
                                </div>
                            </div>

                            <p class="mb-5 text-sm leading-relaxed text-slate-500 font-khmer-body line-clamp-2">
                                {{ $room->description }}
                            </p>
                            <div class="grid grid-cols-2 gap-y-2 mb-4 border-t border-slate-50 pt-1">
                                @if($room->accessories && is_array($room->accessories))
                                    @foreach($room->accessories as $item)
                                        <div class="flex items-center group/item">
                                            <div class="w-7 h-7 rounded-lg bg-slate-50 flex items-center justify-center text-blue-500 group-hover/item:bg-blue-50 group-hover/item:text-blue-600 transition-colors">
                                                @switch($item)
                                                    @case('AC')
                                                        <span class="material-symbols-outlined text-lg">ac_unit</span>
                                                        @break
                                                    @case('WiFi')
                                                        <span class="material-symbols-outlined text-lg">wifi</span>
                                                        @break
                                                    @case('ExtraBed')
                                                        <span class="material-symbols-outlined text-lg">bed</span>
                                                        @break
                                                    @case('Fridge')
                                                        <span class="material-symbols-outlined text-lg">kitchen</span>
                                                        @break
                                                    @case('TV')
                                                        <span class="material-symbols-outlined text-lg">tv</span>
                                                        @break
                                                    @case('WaterHeater')
                                                        <span class="material-symbols-outlined text-lg">water_heater</span>
                                                        @break
                                                    @default
                                                        <span class="material-symbols-outlined text-lg">check_circle</span>
                                                @endswitch
                                            </div>
                                            <span class="ms-3 text-xs font-semibold text-slate-600 font-khmer-body">
                                                @switch($item)
                                                    @case('AC') ម៉ាស៊ីនត្រជាក់ @break
                                                    @case('WiFi') វ៉ាយហ្វាយ @break
                                                    @case('ExtraBed') គ្រែបន្ថែម @break
                                                    @case('Fridge') ទូរទឹកកក @break
                                                    @case('TV') ទូរទស្សន៍ @break
                                                    @case('WaterHeater') ម៉ាស៊ីនទឹកក្តៅ @break
                                                    @default {{ $item }}
                                                @endswitch
                                            </span>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-12 text-center">
                        <p class="text-slate-400 font-khmer-body">មិនទាន់មានបន្ទប់សម្រាប់ជួលនៅឡើយទេ...</p>
                    </div>
                @endforelse
            </div>
        </section>
    </main>
@endsection