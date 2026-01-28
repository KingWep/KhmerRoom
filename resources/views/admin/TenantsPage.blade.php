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
                    <p class="text-2xl font-black dark:text-white">{{ $tenants->where('status', 'ongoing')->count() ?? 0 }}</p>
                </div>

                <div
                    class="bg-white dark:bg-[#1a2e2c] p-6 rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm transition-all hover:shadow-md">
                    <div class="flex items-center justify-between mb-4">
                        <div class="size-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-500">
                            <span class="material-symbols-outlined">person_off</span>
                        </div>
                        <span class="text-xs font-bold text-orange-500 bg-orange-500/10 px-2 py-1 rounded-full">បញ្ចប់</span>
                    </div>
                    <p class="text-[#658683] text-sm mb-1">អ្នកជួលចាកចេញ</p>
                    <p class="text-2xl font-black dark:text-white">{{ $tenants->where('status', 'completed')->count() ?? 0 }}</p>
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
                    <p class="text-2xl font-black dark:text-white">{{ $tenants->where('status', 'cancelled')->count() ?? 0 }}</p>
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
                                            {{-- <div
                                                class="size-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                                                {{ strtoupper(substr($rental->tenant->name ?? 'N', 0, 1,'UTF-8')) }}</div>
                                            <div> --}}
                                            <div
                                                class="size-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold">
                                                {{ strtoupper(mb_substr($rental->tenant->name ?? 'N', 0, 1, 'UTF-8')) }}
                                            </div>
                                                <p class="font-bold text-[#121717] dark:text-white">{{ $rental->tenant->name ?? 'N/A' }}</p>
                                                <p class="text-xs text-[#658683]">ID: T-{{ str_pad($rental->tenant->id ?? 0, 4, '0', STR_PAD_LEFT) }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="text-sm dark:text-gray-300">{{ $rental->tenant->phone ?? 'N/A' }}</p>
                                        <p class="text-xs text-[#658683]">{{ $rental->tenant->user->email ?? 'N/A' }}</p>
                                    </td>
                                    <td class="px-6 py-4 font-bold dark:text-white">{{ $rental->room->room_number ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 text-sm dark:text-gray-300">{{ \Carbon\Carbon::parse($rental->move_in_date)->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        @if($rental->status == 'ongoing')
                                            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-green-500/10 text-green-600 uppercase">សកម្ម</span>
                                        @elseif($rental->status == 'completed')
                                            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-orange-500/10 text-orange-600 uppercase">បញ្ចប់</span>
                                        @else
                                            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-red-500/10 text-red-600 uppercase">បោះបង់</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <button
                                                class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-[#658683] transition-colors"
                                                title="View Detail">
                                                <span class="material-symbols-outlined text-[20px]">visibility</span>
                                            </button>
                                            <button
                                                class="p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg text-blue-500 transition-colors"
                                                title="Edit">
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

                <div
                    class="px-6 py-4 flex items-center justify-between border-t border-[#dce5e4] dark:border-[#2a4542] bg-gray-50/50 dark:bg-[#233d3a]/30">
                    <p class="text-sm text-[#658683]">បង្ហាញពី ១ ដល់ ៤ នៃ ១,២៨៤ នាក់</p>
                    <div class="flex items-center gap-2">
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-white dark:hover:bg-[#233d3a] transition-colors">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg bg-primary text-white font-bold text-sm">1</button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-white dark:hover:bg-[#233d3a] transition-colors font-medium text-sm dark:text-white">2</button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-white dark:hover:bg-[#233d3a] transition-colors font-medium text-sm dark:text-white">3</button>
                        <span class="px-1 text-[#658683]">...</span>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-white dark:hover:bg-[#233d3a] transition-colors">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal for adding new tenant --}}
        <div id="rentalModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-xl font-bold text-gray-800">ចុះឈ្មោះអ្នកជួលថ្មី (New Rental)</h3>
                    <button id="closeRentalModal" class="text-gray-400 hover:text-gray-600">&times;</button>
                </div>
                <form id="rentalForm" action="{{ route('admin.rentals.store') }}" method="POST"
                    class="bg-white rounded-xl shadow-lg overflow-hidden">
                   @csrf
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
                                    <div>
                                        <label class="block text-sm font-semibold text-slate-600 mb-1">ជ្រើសរើសបន្ទប់ (Room)
                                            <span class="text-red-500">*</span></label>
                                        <select name="room_id" required
                                            class="form-select h-11 border-gray-200 rounded-lg bg-gray-50 focus:ring-4 focus:ring-emerald-100 font-bold text-blue-700">
                                            <option value="">-- Select Room --</option>
                                            @if(isset($availableRooms))
                                                @foreach($availableRooms as $room)
                                                    <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                                        បន្ទប់លេខ {{ $room->room_number }} (ជាន់ទី {{ $room->floor }})
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
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
                                                <input type="number" name="rent_amount" value="{{ old('rent_amount') }}"
                                                    min="0" step="0.01" required
                                                    class="form-control h-11 border-gray-200 focus:ring-4 focus:ring-emerald-100"
                                                    placeholder="0.00">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-slate-50 p-4 border-t border-gray-100 flex justify-end gap-3">
                        <button id="cancelRentalModal" type="button"
                            class="px-6 py-2.5 rounded-lg font-semibold text-slate-600 hover:bg-slate-200 transition-colors">
                            បោះបង់ (Cancel)
                        </button>
                        <button type="submit"
                            class="px-8 py-2.5 rounded-lg font-bold text-white bg-blue-600 hover:bg-blue-700 shadow-md shadow-blue-200 transition-all transform hover:-translate-y-0.5 active:scale-95">
                            រក្សាទុក (Save Rental)
                        </button>
                    </div>
                </form>
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
                const rentalForm = document.getElementById('rentalForm');

                if (!openBtn || !closeBtn || !cancelBtn || !rentalModal || !rentalForm) return;

                // Open modal
                openBtn.addEventListener('click', () => {
                    rentalModal.classList.remove('hidden');
                });

                // Close modal ×
                closeBtn.addEventListener('click', () => {
                    rentalModal.classList.add('hidden');
                    rentalForm.reset();
                });

                // Close modal Cancel
                cancelBtn.addEventListener('click', () => {
                    rentalModal.classList.add('hidden');
                    rentalForm.reset();
                });

                // Click outside modal to close
                rentalModal.addEventListener('click', (e) => {
                    if (e.target === rentalModal) {
                        rentalModal.classList.add('hidden');
                        rentalForm.reset();
                    }
                });
            });
        </script>
    @endpush
@endsection