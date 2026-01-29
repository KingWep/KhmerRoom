@extends('layouts.LayoutsAdmin')

@section('title', 'ផ្ទះជួលខ្មែរ - បញ្ជីអ្នកជួល')

@section('content')
    <main class="flex-1 overflow-y-auto flex flex-col min-h-screen">
        <div class="p-8 max-w-[1440px] mx-auto w-full">

            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined">check_circle</span>
                        <p class="font-semibold">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg">
                    <div class="flex items-center gap-2">
                        <span class="material-symbols-outlined">error</span>
                        <p class="font-semibold">{{ session('error') }}</p>
                    </div>
                </div>
            @endif

            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
                <div>
                    <h2 class="text-3xl font-black text-[#121717] dark:text-white tracking-tight mb-2">
                        បញ្ជីអ្នកជួល (Tenant List)
                    </h2>
                    <p class="text-[#658683] dark:text-gray-400">គ្រប់គ្រង និងតាមដានព័ត៌មានរបស់អ្នកជួលទាំងអស់ក្នុងប្រព័ន្ធ
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <button id="openRentalModal"
                        class="flex items-center gap-2 px-6 py-2.5 rounded-xl bg-primary hover:bg-primary/90 transition-all text-white font-bold text-sm shadow-sm shadow-primary/20">
                        <span class="material-symbols-outlined text-[20px]">person_add</span>
                        ចុះឈ្មោះអ្នកជួលថ្មី
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div
                    class="bg-white dark:bg-[#1a2e2c] p-6 rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <div class="size-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">groups</span>
                        </div>
                        <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded-full">សរុប</span>
                    </div>
                    <p class="text-[#658683] text-sm mb-1">អ្នកជួលសរុប</p>
                    <p class="text-2xl font-black dark:text-white">{{ $tenants->count() ?? 0 }}</p>
                </div>

                <div
                    class="bg-white dark:bg-[#1a2e2c] p-6 rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <div class="size-12 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-500">
                            <span class="material-symbols-outlined">how_to_reg</span>
                        </div>
                        <span class="text-xs font-bold text-blue-500 bg-blue-500/10 px-2 py-1 rounded-full">សកម្ម</span>
                    </div>
                    <p class="text-[#658683] text-sm mb-1">អ្នកជួលសកម្ម</p>
                    <p class="text-2xl font-black dark:text-white">{{ $tenants->where('status', 'ongoing')->count() ?? 0 }}
                    </p>
                </div>

                <div
                    class="bg-white dark:bg-[#1a2e2c] p-6 rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <div class="size-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-500">
                            <span class="material-symbols-outlined">person_off</span>
                        </div>
                        <span
                            class="text-xs font-bold text-orange-500 bg-orange-500/10 px-2 py-1 rounded-full">បញ្ចប់</span>
                    </div>
                    <p class="text-[#658683] text-sm mb-1">អ្នកជួលចាកចេញ</p>
                    <p class="text-2xl font-black dark:text-white">
                        {{ $tenants->where('status', 'completed')->count() ?? 0 }}
                    </p>
                </div>

                <div
                    class="bg-white dark:bg-[#1a2e2c] p-6 rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <div class="size-12 rounded-xl bg-purple-500/10 flex items-center justify-center text-purple-500">
                            <span class="material-symbols-outlined">pending_actions</span>
                        </div>
                        <span class="text-xs font-bold text-red-500 bg-red-500/10 px-2 py-1 rounded-full">បោះបង់</span>
                    </div>
                    <p class="text-[#658683] text-sm mb-1">កិច្ចសន្យាបោះបង់</p>
                    <p class="text-2xl font-black dark:text-white">
                        {{ $tenants->where('status', 'cancelled')->count() ?? 0 }}
                    </p>
                </div>
            </div>

            <div
                class="bg-white dark:bg-[#1a2e2c] rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm overflow-hidden text-nowrap">
                <div
                    class="p-6 border-b border-[#dce5e4] dark:border-[#2a4542] flex flex-col md:flex-row gap-4 items-center justify-between bg-gray-50/50 dark:bg-[#233d3a]/30">
                    <div class="relative w-full md:w-96">
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-[#658683]">search</span>
                        <input type="text" placeholder="ស្វែងរកឈ្មោះ ឬលេខបន្ទប់..."
                            class="w-full pl-10 pr-4 py-2.5 bg-white dark:bg-[#1a2e2c] border border-[#dce5e4] dark:border-[#2a4542] rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-sm dark:text-white">
                    </div>

                    <div class="flex items-center gap-3 w-full md:w-auto">
                        <select
                            class="bg-white dark:bg-[#1a2e2c] border border-[#dce5e4] dark:border-[#2a4542] rounded-xl px-4 py-2.5 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-primary/20 dark:text-white">
                            <option>ស្ថានភាពទាំងអស់</option>
                            <option>សកម្ម</option>
                            <option>អតីត</option>
                        </select>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="bg-background-light dark:bg-[#233d3a] border-b border-[#dce5e4] dark:border-[#2a4542]">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683]">ឈ្មោះអ្នកជួល
                                    (Tenant)</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683]">
                                    ព័ត៌មានទំនាក់ទំនង (Contact)</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683]">លេខបន្ទប់
                                    (Room)</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683]">
                                    ថ្ងៃចូលស្នាក់នៅ (Move-in)</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683]">ស្ថានភាព
                                    (Status)</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683] text-right">
                                    សកម្មភាព (Actions)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#dce5e4] dark:divide-[#2a4542]">
                            @forelse($tenants ?? [] as $rental)
                                            <tr class="hover:bg-gray-50 dark:hover:bg-[#233d3a]/50 transition-colors">
                                                <td class="px-6 py-4">
                                                    <div class="flex items-center gap-3">
                                                        <div
                                                            class="size-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                                                            {{ strtoupper(mb_substr($rental->tenant->name ?? 'N', 0, 1, 'UTF-8')) }}
                                                        </div>
                                                        <p class="font-bold text-[#121717] dark:text-white">
                                                            {{ $rental->tenant->name ?? 'N/A' }}
                                                        </p>
                                                        <p class="text-xs text-[#658683]">ID:
                                                            T-{{ str_pad($rental->tenant->id ?? 0, 4, '0', STR_PAD_LEFT) }}</p>
                                                    </div>
                                </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm dark:text-gray-300">{{ $rental->tenant->phone ?? 'N/A' }}</p>
                                    <p class="text-xs text-[#658683]">{{ $rental->tenant->user->email ?? 'N/A' }}</p>
                                </td>
                                <td class="px-6 py-4 font-bold dark:text-white">{{ $rental->room->room_number ?? 'N/A' }}</td>
                                <td class="px-6 py-4 text-sm dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($rental->move_in_date)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($rental->status == 'ongoing')
                                        <span
                                            class="px-3 py-1 rounded-full text-[10px] font-bold bg-green-500/10 text-green-600 uppercase">សកម្ម</span>
                                    @elseif($rental->status == 'completed')
                                        <span
                                            class="px-3 py-1 rounded-full text-[10px] font-bold bg-orange-500/10 text-orange-600 uppercase">បញ្ចប់</span>
                                    @else
                                        <span
                                            class="px-3 py-1 rounded-full text-[10px] font-bold bg-red-500/10 text-red-600 uppercase">បោះបង់</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <button
                                            class="view-rental-btn p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-[#658683] transition-colors"
                                            data-rental-id="{{ $rental->id }}" title="View Detail">
                                            <span class="material-symbols-outlined text-[20px]">visibility</span>
                                        </button>
                                        <button
                                            class="edit-rental-btn p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-blue-500 transition-colors"
                                            data-rental-id="{{ $rental->id }}" title="Edit">
                                            <span class="material-symbols-outlined text-[20px]">edit</span>
                                        </button>
                                    </div>
                                </td>
                                </tr>
                            @empty
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-[#658683]">
                            <div class="flex flex-col items-center gap-2">
                                <span class="material-symbols-outlined text-4xl">person_off</span>
                                <p>មិនមានអ្នកជួលនៅឡើយទេ (No tenants found)</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($tenants->hasPages())
                <div
                    class="px-6 py-4 flex flex-col md:flex-row items-center justify-between gap-4 border-t border-[#dce5e4] dark:border-[#2a4542] bg-gray-50/50 dark:bg-[#233d3a]/30">
                    <p class="text-sm text-[#658683]">
                        បង្ហាញ {{ $tenants->firstItem() }} ដល់ {{ $tenants->lastItem() }} នៃ {{ $tenants->total() }} នាក់
                    </p>
                    <div class="flex items-center gap-2">
                        {{-- Previous Page Link --}}
                        @if ($tenants->onFirstPage())
                            <span
                                class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] text-gray-400 cursor-not-allowed">
                                <span class="material-symbols-outlined">chevron_left</span>
                            </span>
                        @else
                            <a href="{{ $tenants->previousPageUrl() }}"
                                class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-white dark:hover:bg-[#233d3a] transition-colors">
                                <span class="material-symbols-outlined">chevron_left</span>
                            </a>
                        @endif

                        {{-- Page Numbers --}}
                        @foreach ($tenants->getUrlRange(1, $tenants->lastPage()) as $page => $url)
                            @if ($page == $tenants->currentPage())
                                <span
                                    class="size-9 flex items-center justify-center rounded-lg bg-primary text-white font-bold text-sm">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}"
                                    class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-white dark:hover:bg-[#233d3a] transition-colors font-medium text-sm dark:text-white">{{ $page }}</a>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($tenants->hasMorePages())
                            <a href="{{ $tenants->nextPageUrl() }}"
                                class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-white dark:hover:bg-[#233d3a] transition-colors">
                                <span class="material-symbols-outlined">chevron_right</span>
                            </a>
                        @else
                            <span
                                class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] text-gray-400 cursor-not-allowed">
                                <span class="material-symbols-outlined">chevron_right</span>
                            </span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
        </div>
        {{-- Modal for adding/editing/viewing tenant --}}
        <div id="rentalModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-0 opacity-0 invisible transition-all duration-300 ease-in-out">
            <div id="rentalModalContent"
                class="bg-white dark:bg-[#1a2e2c] rounded-lg shadow-xl w-full max-w-4xl overflow-hidden transform scale-95 transition-all duration-300 ease-in-out">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-[#2a4542] flex justify-between items-center">
                    <h3 id="modalTitle" class="text-xl font-bold text-gray-800 dark:text-white">ចុះឈ្មោះអ្នកជួលថ្មី (New
                        Rental)</h3>
                    <button id="closeRentalModal" class="text-gray-400 hover:text-gray-600 text-3xl">&times;</button>
                </div>
                <form id="rentalForm" action="{{ route('admin.rentals.store') }}" method="POST"
                    class="bg-white dark:bg-[#1a2e2c] rounded-xl shadow-lg overflow-hidden">
                    @csrf
                    <input type="hidden" id="formMethod" name="_method" value="">
                    <input type="hidden" id="rentalId" name="rental_id" value="">

                    <div class="p-6">
                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                                <ul class="list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row g-5">
                            <div class="col-md-6">
                                <div class="flex items-center gap-3 mb-6">
                                    <div class="bg-blue-500 p-2.5 rounded-xl shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white"
                                            class="bi bi-person-badge" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                            <path
                                                d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z" />
                                        </svg>
                                    </div>
                                    <h5 class="font-bold text-slate-700 mb-0">ព័ត៌មានអ្នកជួល (Tenant Info)</h5>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">ឈ្មោះ (Full Name)
                                            <span class="text-red-500">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}" required
                                            class="form-control h-11 border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all"
                                            placeholder="e.g. Sok Dara">
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">លេខទូរស័ព្ទ (Phone)
                                            <span class="text-red-500">*</span></label>
                                        <input type="text" name="phone" value="{{ old('phone') }}" required
                                            class="form-control h-11 border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all"
                                            placeholder="012 345 678">
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-6">
                                            <label class="block text-sm font-semibold text-slate-600 mb-1">ភេទ
                                                (Gender)</label>
                                            <select name="gender"
                                                class="form-select h-11 border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-100">
                                                <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>ប្រុស
                                                    (Male)</option>
                                                <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>ស្រី
                                                    (Female)</option>
                                                <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>ផ្សេងៗ
                                                    (Other)</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">អាសយដ្ឋាន
                                            (Address)</label>
                                        <textarea name="address" rows="3" required
                                            class="form-control border-gray-200 rounded-lg focus:ring-4 focus:ring-blue-100"
                                            placeholder="Current living address...">{{ old('address') }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 lg:border-l border-gray-100 lg:pl-10">
                                <div class="space-y-4">
                                    <!-- Room Selection (for new rentals) -->
                                    <div id="roomSelectContainer">
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">ជ្រើសរើសបន្ទប់ (Room)
                                            <span class="text-red-500">*</span></label>
                                        <select name="room_id" id="roomSelect" required
                                            class="form-select h-11 border-gray-200 rounded-lg bg-gray-50 focus:ring-4 focus:ring-emerald-100 font-bold text-blue-700">
                                            <option value="">-- Select Room --</option>
                                            @if(isset($availableRooms))
                                                @foreach($availableRooms as $room)
                                                    <option value="{{ $room->id }}" data-available="true"
                                                        data-room-number="{{ $room->room_number }}" data-floor="{{ $room->floor }}"
                                                        {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                                        បន្ទប់លេខ {{ $room->room_number }} (ជាន់ទី {{ $room->floor }})
                                                    </option>
                                                @endforeach
                                            @endif
                                            @if(isset($allRooms))
                                                @foreach($allRooms as $room)
                                                    @if(!$availableRooms->contains('id', $room->id))
                                                        <option value="{{ $room->id }}" data-available="false"
                                                            data-room-number="{{ $room->room_number }}" data-floor="{{ $room->floor }}"
                                                            style="display:none;">
                                                            បន្ទប់លេខ {{ $room->room_number }} (ជាន់ទី {{ $room->floor }})
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>

                                    <!-- Room Display (for editing - read only) -->
                                    <div id="roomDisplayContainer" style="display: none;">
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">បន្ទប់បច្ចុប្បន្ន
                                            (Current Room)</label>
                                        <div class=" border-blue-200 rounded-lg p-4">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="size-12 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-600">
                                                    <span class="material-symbols-outlined">meeting_room</span>
                                                </div>
                                                <div>
                                                    <p id="roomDisplayText" class="font-bold text-gray-800">បន្ទប់លេខ -
                                                        (ជាន់ទី -)</p>
                                                    <p class="text-xs text-gray-500">មិនអាចផ្លាស់ប្តូរបន្ទប់បានទេ</p>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="room_id" id="roomIdHidden" value="">
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class="col-6">
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">ថ្ងៃចូលនៅ
                                            (Move-in)</label>
                                        <input type="date" name="move_in_date"
                                            value="{{ old('move_in_date', date('Y-m-d')) }}" required
                                            class="form-control h-11 border-gray-200 rounded-lg focus:ring-4 focus:ring-emerald-100">
                                    </div>
                                    <div class="col-6">
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">ថ្ងៃចាកចេញ
                                            (Move-out)</label>
                                        <input type="date" name="move_out_date" value="{{ old('move_out_date') }}"
                                            class="form-control h-11 border-gray-200 rounded-lg focus:ring-4 focus:ring-emerald-100">
                                    </div>
                                    <div class="col-12">
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">ថ្លៃឈ្នួល/ខែ ($)
                                            <span class="text-red-500">*</span></label>
                                        <div class="input-group">
                                            <span
                                                class="input-group-text bg-gray-50 border-gray-200 text-slate-500 font-bold">$</span>
                                            <input type="number" name="rent_amount" value="{{ old('rent_amount') }}" min="0"
                                                step="0.01" required
                                                class="form-control h-11 border-gray-200 focus:ring-4 focus:ring-emerald-100"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                    <div class="col-12" id="statusField" style="display: none;">
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">ស្ថានភាព (Status)
                                            <span class="text-red-500">*</span></label>
                                        <select name="status" id="statusSelect"
                                            class="form-select h-11 border-gray-200 rounded-lg focus:ring-4 focus:ring-emerald-100">
                                            <option value="ongoing">សកម្ម (Ongoing)</option>
                                            <option value="completed">បញ្ចប់ (Completed)</option>
                                            <option value="cancelled">បោះបង់ (Cancelled)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="bg-slate-50 dark:bg-[#233d3a] p-4 border-t border-gray-100 dark:border-[#2a4542] flex justify-end gap-3">
                            <button id="cancelRentalModal" type="button"
                                class="px-6 py-2.5 rounded-lg font-semibold text-slate-600 dark:text-gray-300 hover:bg-slate-200 dark:hover:bg-gray-700 transition-colors">
                                បោះបង់ (Cancel)
                            </button>
                            <button id="submitBtn" type="submit"
                                class="px-8 py-2.5 rounded-lg font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-md shadow-blue-200 transition-all transform hover:-translate-y-0.5 active:scale-95">
                                រក្សាទុក (Save Rental)
                            </button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        </div>

        {{-- View Details Modal --}}
        <div id="viewModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-0 opacity-0 invisible transition-all duration-300 ease-in-out">
            <div id="viewModalContent"
                class="bg-white dark:bg-[#1a2e2c] rounded-2xl shadow-2xl w-full max-w-4xl overflow-hidden transform scale-95 transition-all duration-300 ease-in-out max-h-[90vh] overflow-y-auto">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-primary to-blue-600 px-8 py-6 flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <div class="size-14 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-3xl">person</span>
                        </div>
                        <div>
                            <h3 class="text-2xl font-black text-white">ព័ត៌មានលម្អិតអ្នកជួល</h3>
                            <p class="text-white/80 text-sm">Rental Details Information</p>
                        </div>
                    </div>
                    <button id="closeViewModal"
                        class="text-white/80 hover:text-white text-4xl transition-colors">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="p-8">
                    <!-- Tenant Information Card -->
                    <div
                        class="bg-gradient-to-br from-blue-50 to-indigo-50 dark:from-[#233d3a] dark:to-[#1a2e2c] rounded-2xl p-6 mb-6 border border-blue-100 dark:border-[#2a4542]">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="bg-blue-500 p-3 rounded-xl shadow-lg">
                                <span class="material-symbols-outlined text-white text-2xl">badge</span>
                            </div>
                            <h4 class="text-xl font-black text-gray-800 dark:text-white">ព័ត៌មានអ្នកជួល (Tenant Information)
                            </h4>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex items-start gap-4">
                                <div
                                    class="size-12 rounded-xl bg-blue-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-blue-600">person</span>
                                </div>
                                <div>
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        ឈ្មោះពេញ (Full Name)</p>
                                    <p id="viewTenantName" class="text-lg font-bold text-gray-800 dark:text-white">-</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="size-12 rounded-xl bg-green-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-green-600">call</span>
                                </div>
                                <div>
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        លេខទូរស័ព្ទ (Phone)</p>
                                    <p id="viewTenantPhone" class="text-lg font-bold text-gray-800 dark:text-white">-</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="size-12 rounded-xl bg-purple-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-purple-600">wc</span>
                                </div>
                                <div>
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        ភេទ (Gender)</p>
                                    <p id="viewTenantGender" class="text-lg font-bold text-gray-800 dark:text-white">-</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="size-12 rounded-xl bg-orange-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-orange-600">mail</span>
                                </div>
                                <div>
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        អ៊ីមែល (Email)</p>
                                    <p id="viewTenantEmail"
                                        class="text-lg font-bold text-gray-800 dark:text-white break-all">-</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 md:col-span-2">
                                <div
                                    class="size-12 rounded-xl bg-red-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-red-600">home</span>
                                </div>
                                <div class="flex-1">
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        អាសយដ្ឋាន (Address)</p>
                                    <p id="viewTenantAddress" class="text-lg font-bold text-gray-800 dark:text-white">-</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rental Information Card -->
                    <div
                        class="bg-gradient-to-br from-emerald-50 to-teal-50 dark:from-[#233d3a] dark:to-[#1a2e2c] rounded-2xl p-6 mb-6 border border-emerald-100 dark:border-[#2a4542]">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="bg-emerald-500 p-3 rounded-xl shadow-lg">
                                <span class="material-symbols-outlined text-white text-2xl">apartment</span>
                            </div>
                            <h4 class="text-xl font-black text-gray-800 dark:text-white">ព័ត៌មានការជួល (Rental Information)
                            </h4>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="flex items-start gap-4">
                                <div
                                    class="size-12 rounded-xl bg-emerald-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-emerald-600">meeting_room</span>
                                </div>
                                <div>
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        លេខបន្ទប់ (Room Number)</p>
                                    <p id="viewRoomNumber" class="text-lg font-bold text-gray-800 dark:text-white">-</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="size-12 rounded-xl bg-yellow-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-yellow-600">payments</span>
                                </div>
                                <div>
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        ថ្លៃជួល/ខែ (Rent/Month)</p>
                                    <p id="viewRentAmount" class="text-lg font-bold text-gray-800 dark:text-white">-</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="size-12 rounded-xl bg-blue-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-blue-600">login</span>
                                </div>
                                <div>
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        ថ្ងៃចូលស្នាក់នៅ (Move-in Date)</p>
                                    <p id="viewMoveInDate" class="text-lg font-bold text-gray-800 dark:text-white">-</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="size-12 rounded-xl bg-red-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-red-600">logout</span>
                                </div>
                                <div>
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        ថ្ងៃចាកចេញ (Move-out Date)</p>
                                    <p id="viewMoveOutDate" class="text-lg font-bold text-gray-800 dark:text-white">-</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="size-12 rounded-xl bg-indigo-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-indigo-600">info</span>
                                </div>
                                <div>
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        ស្ថានភាព (Status)</p>
                                    <div id="viewStatus"></div>
                                </div>
                            </div>

                            <div class="flex items-start gap-4">
                                <div
                                    class="size-12 rounded-xl bg-pink-500/10 flex items-center justify-center flex-shrink-0">
                                    <span class="material-symbols-outlined text-pink-600">tag</span>
                                </div>
                                <div>
                                    <p
                                        class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">
                                        លេខសម្គាល់ (Rental ID)</p>
                                    <p id="viewRentalId" class="text-lg font-bold text-gray-800 dark:text-white">-</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div
                    class="bg-gray-50 dark:bg-[#233d3a] px-8 py-5 border-t border-gray-200 dark:border-[#2a4542] flex justify-end gap-3">
                    <button id="closeViewModalBtn" type="button"
                        class="px-6 py-2.5 rounded-xl font-semibold text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-700 transition-all">
                        បិទ (Close)
                    </button>
                </div>
            </div>
        </div>
    </main>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const openBtn = document.getElementById('openRentalModal');
                const closeBtn = document.getElementById('closeRentalModal');
                const cancelBtn = document.getElementById('cancelRentalModal');
                const rentalModal = document.getElementById('rentalModal');
                const rentalModalContent = document.getElementById('rentalModalContent');
                const rentalForm = document.getElementById('rentalForm');
                const modalTitle = document.getElementById('modalTitle');
                const submitBtn = document.getElementById('submitBtn');
                const formMethod = document.getElementById('formMethod');
                const rentalId = document.getElementById('rentalId');
                const statusField = document.getElementById('statusField');
                const statusSelect = document.getElementById('statusSelect');
                const roomSelect = document.getElementById('roomSelect');

                // View Modal Elements
                const viewModal = document.getElementById('viewModal');
                const viewModalContent = document.getElementById('viewModalContent');
                const closeViewModal = document.getElementById('closeViewModal');
                const closeViewModalBtn = document.getElementById('closeViewModalBtn');
                const editFromViewBtn = document.getElementById('editFromViewBtn');

                if (!openBtn || !closeBtn || !cancelBtn || !rentalModal || !rentalForm) return;

                let currentRentalData = null;

                // Function to open modal with animation
                function openModal() {
                    rentalModal.classList.remove('invisible');
                    // Trigger reflow to ensure transition works
                    rentalModal.offsetHeight;
                    rentalModal.classList.remove('opacity-0', 'bg-opacity-0');
                    rentalModal.classList.add('opacity-100', 'bg-opacity-50');
                    rentalModalContent.classList.remove('scale-95');
                    rentalModalContent.classList.add('scale-100');
                    document.body.style.overflow = 'hidden';
                }

                // Function to close modal with animation
                function closeModal() {
                    rentalModal.classList.remove('opacity-100', 'bg-opacity-50');
                    rentalModal.classList.add('opacity-0', 'bg-opacity-0');
                    rentalModalContent.classList.remove('scale-100');
                    rentalModalContent.classList.add('scale-95');
                    setTimeout(() => {
                        rentalModal.classList.add('invisible');
                        document.body.style.overflow = '';
                        resetModal();
                    }, 300);
                }

                // Function to open view modal with animation
                function openViewModal() {
                    viewModal.classList.remove('invisible');
                    viewModal.offsetHeight;
                    viewModal.classList.remove('opacity-0', 'bg-opacity-0');
                    viewModal.classList.add('opacity-100', 'bg-opacity-50');
                    viewModalContent.classList.remove('scale-95');
                    viewModalContent.classList.add('scale-100');
                    document.body.style.overflow = 'hidden';
                }

                // Function to close view modal with animation
                function closeViewModalFunc() {
                    viewModal.classList.remove('opacity-100', 'bg-opacity-50');
                    viewModal.classList.add('opacity-0', 'bg-opacity-0');
                    viewModalContent.classList.remove('scale-100');
                    viewModalContent.classList.add('scale-95');
                    setTimeout(() => {
                        viewModal.classList.add('invisible');
                        document.body.style.overflow = '';
                        currentRentalData = null;
                    }, 300);
                }

                // Function to populate view modal with rental data
                function populateViewModal(rental) {
                    currentRentalData = rental;

                    // Tenant Information
                    document.getElementById('viewTenantName').textContent = rental.tenant.name || '-';
                    document.getElementById('viewTenantPhone').textContent = rental.tenant.phone || '-';

                    const genderMap = {
                        'male': 'ប្រុស (Male)',
                        'female': 'ស្រី (Female)',
                        'other': 'ផ្សេងៗ (Other)'
                    };
                    document.getElementById('viewTenantGender').textContent = genderMap[rental.tenant.gender] || '-';
                    document.getElementById('viewTenantEmail').textContent = rental.tenant.user?.email || '-';
                    document.getElementById('viewTenantAddress').textContent = rental.tenant.address || '-';

                    // Rental Information
                    document.getElementById('viewRoomNumber').textContent = `បន្ទប់លេខ ${rental.room.room_number} (ជាន់ទី ${rental.room.floor})`;
                    document.getElementById('viewRentAmount').textContent = `$${parseFloat(rental.rent_amount).toFixed(2)}`;
                    document.getElementById('viewMoveInDate').textContent = new Date(rental.move_in_date).toLocaleDateString('km-KH', { year: 'numeric', month: 'long', day: 'numeric' });
                    document.getElementById('viewMoveOutDate').textContent = rental.move_out_date ? new Date(rental.move_out_date).toLocaleDateString('km-KH', { year: 'numeric', month: 'long', day: 'numeric' }) : 'មិនទាន់កំណត់ (Not set)';
                    document.getElementById('viewRentalId').textContent = `R-${String(rental.id).padStart(4, '0')}`;

                    // Status Badge
                    const statusContainer = document.getElementById('viewStatus');
                    let statusBadge = '';
                    if (rental.status === 'ongoing') {
                        statusBadge = '<span class="px-4 py-2 rounded-full text-sm font-bold bg-green-500/20 text-green-700 dark:text-green-400 uppercase inline-flex items-center gap-2"><span class="size-2 rounded-full bg-green-500 animate-pulse"></span>សកម្ម (Active)</span>';
                    } else if (rental.status === 'completed') {
                        statusBadge = '<span class="px-4 py-2 rounded-full text-sm font-bold bg-orange-500/20 text-orange-700 dark:text-orange-400 uppercase">បញ្ចប់ (Completed)</span>';
                    } else {
                        statusBadge = '<span class="px-4 py-2 rounded-full text-sm font-bold bg-red-500/20 text-red-700 dark:text-red-400 uppercase">បោះបង់ (Cancelled)</span>';
                    }
                    statusContainer.innerHTML = statusBadge;
                }

                // Function to reset modal to create mode
                function resetModal() {
                    modalTitle.textContent = 'ចុះឈ្មោះអ្នកជួលថ្មី (New Rental)';
                    submitBtn.textContent = 'រក្សាទុក (Save Rental)';
                    rentalForm.action = '{{ route('admin.rentals.store') }}';
                    formMethod.value = '';
                    rentalId.value = '';
                    statusField.style.display = 'none';
                    rentalForm.reset();
                    setFormReadonly(false);

                    // Show room select, hide room display
                    document.getElementById('roomSelectContainer').style.display = 'block';
                    document.getElementById('roomDisplayContainer').style.display = 'none';
                    roomSelect.required = true;

                    // Show only available rooms for new rentals
                    Array.from(roomSelect.options).forEach(option => {
                        if (option.value === '') {
                            option.style.display = 'block';
                        } else if (option.getAttribute('data-available') === 'true') {
                            option.style.display = 'block';
                        } else {
                            option.style.display = 'none';
                        }
                    });
                }

                // Function to set form readonly
                function setFormReadonly(readonly) {
                    const inputs = rentalForm.querySelectorAll('input, select, textarea');
                    inputs.forEach(input => {
                        if (readonly) {
                            input.setAttribute('readonly', 'readonly');
                            input.setAttribute('disabled', 'disabled');
                        } else {
                            input.removeAttribute('readonly');
                            input.removeAttribute('disabled');
                        }
                    });

                    if (readonly) {
                        submitBtn.style.display = 'none';
                    } else {
                        submitBtn.style.display = 'block';
                    }
                }

                // Function to populate form with rental data
                function populateForm(rental, mode = 'edit') {
                    document.querySelector('input[name="name"]').value = rental.tenant.name || '';
                    document.querySelector('input[name="phone"]').value = rental.tenant.phone || '';
                    document.querySelector('select[name="gender"]').value = rental.tenant.gender || 'male';
                    document.querySelector('textarea[name="address"]').value = rental.tenant.address || '';

                    // Show and set status field
                    statusField.style.display = 'block';
                    statusSelect.value = rental.status || 'ongoing';

                    if (mode === 'view') {
                        modalTitle.textContent = 'មើលព័ត៌មានអ្នកជួល (View Rental Details)';
                        setFormReadonly(true);
                        // Show room display in view mode
                        document.getElementById('roomSelectContainer').style.display = 'none';
                        document.getElementById('roomDisplayContainer').style.display = 'block';
                        document.getElementById('roomDisplayText').textContent = `បន្ទប់លេខ ${rental.room.room_number} (ជាន់ទី ${rental.room.floor})`;
                        document.getElementById('roomIdHidden').value = rental.room_id || '';
                        roomSelect.required = false;
                    } else if (mode === 'edit') {
                        modalTitle.textContent = 'កែប្រែព័ត៌មានអ្នកជួល (Edit Rental)';
                        submitBtn.textContent = 'ធ្វើបច្ចុប្បន្នភាព (Update)';
                        rentalForm.action = `/admin/rentals/${rental.id}`;
                        formMethod.value = 'PATCH';
                        rentalId.value = rental.id;
                        setFormReadonly(false);

                        // In edit mode, show room as display only (not changeable)
                        document.getElementById('roomSelectContainer').style.display = 'none';
                        document.getElementById('roomDisplayContainer').style.display = 'block';
                        document.getElementById('roomDisplayText').textContent = `បន្ទប់លេខ ${rental.room.room_number} (ជាន់ទី ${rental.room.floor})`;
                        document.getElementById('roomIdHidden').value = rental.room_id || '';
                        roomSelect.required = false;
                    }

                    document.querySelector('input[name="move_in_date"]').value = rental.move_in_date || '';
                    document.querySelector('input[name="move_out_date"]').value = rental.move_out_date || '';
                    document.querySelector('input[name="rent_amount"]').value = rental.rent_amount || '';
                }

                // Open modal for new rental
                openBtn.addEventListener('click', () => {
                    resetModal();
                    openModal();
                });

                // View rental details
                document.querySelectorAll('.view-rental-btn').forEach(btn => {
                    btn.addEventListener('click', async () => {
                        const rentalId = btn.getAttribute('data-rental-id');
                        try {
                            const response = await fetch(`/admin/rentals/${rentalId}`);
                            const rental = await response.json();
                            populateViewModal(rental);
                            openViewModal();
                        } catch (error) {
                            console.error('Error fetching rental:', error);
                            alert('មានបញ្ហាក្នុងការទាញយកទិន្នន័យ (Error loading data)');
                        }
                    });
                });

                // Edit rental
                document.querySelectorAll('.edit-rental-btn').forEach(btn => {
                    btn.addEventListener('click', async () => {
                        const rentalId = btn.getAttribute('data-rental-id');
                        try {
                            const response = await fetch(`/admin/rentals/${rentalId}`);
                            const rental = await response.json();
                            resetModal();
                            populateForm(rental, 'edit');
                            openModal();
                        } catch (error) {
                            console.error('Error fetching rental:', error);
                            alert('មានបញ្ហាក្នុងការទាញយកទិន្នន័យ (Error loading data)');
                        }
                    });
                });

                // Close modal ×
                closeBtn.addEventListener('click', () => {
                    closeModal();
                });

                // Close modal Cancel
                cancelBtn.addEventListener('click', () => {
                    closeModal();
                });

                // Click outside modal to close
                rentalModal.addEventListener('click', (e) => {
                    if (e.target === rentalModal) {
                        closeModal();
                    }
                });

                // Close view modal handlers
                closeViewModal.addEventListener('click', () => {
                    closeViewModalFunc();
                });

                closeViewModalBtn.addEventListener('click', () => {
                    closeViewModalFunc();
                });

                // Click outside view modal to close
                viewModal.addEventListener('click', (e) => {
                    if (e.target === viewModal) {
                        closeViewModalFunc();
                    }
                });

                // Edit from view modal
                editFromViewBtn.addEventListener('click', () => {
                    if (currentRentalData) {
                        closeViewModalFunc();
                        setTimeout(() => {
                            resetModal();
                            populateForm(currentRentalData, 'edit');
                            openModal();
                        }, 350);
                    }
                });
            });
        </script>
    @endpush
@endsection