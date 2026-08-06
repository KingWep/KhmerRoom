@extends('layouts.LayoutsAdmin')
@section('title', 'ផ្ទះជួលខ្មែរ - គ្រប់គ្រងការបង់ប្រាក់')

@section('content')
    <div class="p-6 space-y-6 animate-fade-in">
        
        {{-- Success Message --}}
        @if(session('success'))
            <div class="relative bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-4 shadow-sm animate-slide-in" role="alert">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-green-100">
                            <i class="fas fa-check-circle text-green-600 text-lg"></i>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-sm font-bold text-green-800">ជោគជ័យ!</h3>
                        <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="flex-shrink-0 text-green-400 hover:text-green-600 transition-colors">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
            </div>
        @endif

        {{-- Error Message --}}
        @if(session('error'))
            <div class="relative bg-gradient-to-r from-red-50 to-rose-50 border border-red-200 rounded-2xl p-4 shadow-sm animate-slide-in" role="alert">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-red-100">
                            <i class="fas fa-exclamation-circle text-red-600 text-lg"></i>
                        </div>
                    </div>
                    <div class="flex-grow">
                        <h3 class="text-sm font-bold text-red-800">មានបញ្ហា!</h3>
                        <p class="text-sm text-red-700 mt-1">{{ session('error') }}</p>
                    </div>
                    <button type="button" onclick="this.parentElement.parentElement.remove()" class="flex-shrink-0 text-red-400 hover:text-red-600 transition-colors">
                        <i class="fas fa-times fa-lg"></i>
                    </button>
                </div>
            </div>
        @endif

        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    <i class="fas fa-wallet text-blue-600"></i>
                    គ្រប់គ្រងការបង់ប្រាក់
                </h1>
                <p class="text-gray-500 text-sm">តាមដាន និងកត់ត្រាការបង់ប្រាក់ប្រចាំខែរបស់អតិថិជន</p>
            </div>
            {{-- Button to Open Modal --}}
            <button type="button" data-bs-toggle="modal" data-bs-target="#paymentModal"
                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all shadow-sm font-medium">
                <i class="fas fa-plus mr-2"></i> បញ្ចូលការបង់ប្រាក់ថ្មី
            </button>
        </div>

        {{-- Summary Statistics --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-2xl border-l-4 border-green-500 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">បានបង់សរុប</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">${{ number_format($totalPaid, 2) }}</p>
                    </div>
                    <div class="h-12 w-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <i class="fas fa-check-circle fa-lg"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border-l-4 border-yellow-500 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">កំពុងរង់ចាំ</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">${{ number_format($totalUnpaid, 2) }}</p>
                    </div>
                    <div class="h-12 w-12 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600">
                        <i class="fas fa-clock fa-lg"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border-l-4 border-blue-500 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">ចំនួនប្រតិបត្តិការ</p>
                        <p class="text-2xl font-bold text-gray-800 mt-1">{{ $payments->count() }} ដង</p>
                    </div>
                    <div class="h-12 w-12 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                        <i class="fas fa-exchange-alt fa-lg"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Table Section --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-4 bg-gray-50 border-b flex flex-col md:flex-row justify-between gap-4">
                <div class="relative w-full md:w-96">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" id="paymentSearch" placeholder="ស្វែងរកឈ្មោះអ្នកជួល ឬលេខបន្ទប់..."
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all">
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 text-sm uppercase tracking-wider">
                            <th class="px-6 py-4 font-semibold">អ្នកជួល & បន្ទប់</th>
                            <th class="px-6 py-4 font-semibold">សម្រាប់ខែ</th>
                            <th class="px-6 py-4 font-semibold">ទឹកប្រាក់</th>
                            <th class="px-6 py-4 font-semibold">ស្ថានភាព</th>
                            <th class="px-6 py-4 font-semibold">ថ្ងៃបង់</th>
                            <th class="px-6 py-4 font-semibold text-right">សកម្មភាព</th>
                        </tr>
                    </thead>
                    <tbody id="paymentTableBody" class="divide-y divide-gray-100">
                        @forelse($payments as $payment)
                            <tr class="hover:bg-blue-50/30 transition-colors group text-sm">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-gray-800">{{ $payment->rental->tenant->name ?? 'N/A' }}</div>
                                    <div class="text-xs text-gray-500">បន្ទប់ {{ $payment->rental->room->room_number ?? 'N/A' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 font-medium text-gray-700">
                                    {{ \Carbon\Carbon::parse($payment->pay_month)->format('M Y') }}
                                </td>
                                <td class="px-6 py-4 font-bold text-blue-600">
                                    ${{ number_format($payment->amount_paid, 2) }}
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $statusClasses = [
                                            'paid' => 'bg-green-100 text-green-700',
                                            'pending' => 'bg-yellow-100 text-yellow-700',
                                            'overdue' => 'bg-red-100 text-red-700'
                                        ];
                                        $statusLabels = ['paid' => 'បង់រួច', 'pending' => 'រង់ចាំ', 'overdue' => 'ហួសកំណត់'];
                                    @endphp
                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-bold {{ $statusClasses[$payment->status] ?? 'bg-gray-100' }}">
                                        {{ $statusLabels[$payment->status] ?? $payment->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500">
                                    {{ \Carbon\Carbon::parse($payment->paid_date)->format('d-m-Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <!-- Edit Button -->
                                        <button type="button" 
                                            class="inline-flex items-center gap-1.5 px-3 py-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition-all duration-200 font-medium text-sm border border-blue-200 hover:border-blue-300 hover:shadow-sm"
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editPaymentModal{{ $payment->id }}"
                                            title="កែប្រែ">
                                            <i class="fas fa-edit text-sm"></i>
                                            <span>កែប្រែ</span>
                                        </button>

                                        <!-- Delete Button - SweetAlert2 -->
                                        <button type="button" 
                                            class="inline-flex items-center gap-1.5 px-3 py-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition-all duration-200 font-medium text-sm border border-red-200 hover:border-red-300 hover:shadow-sm btn-delete-payment"
                                            data-id="{{ $payment->id }}"
                                            data-tenant="{{ $payment->rental->tenant->name ?? 'N/A' }}"
                                            data-room="{{ $payment->rental->room->room_number ?? 'N/A' }}"
                                            data-month="{{ \Carbon\Carbon::parse($payment->pay_month)->format('M Y') }}"
                                            data-amount="${{ number_format($payment->amount_paid, 2) }}"
                                            data-url="{{ route('admin.payments.destroy', $payment->id) }}"
                                            title="លុប">
                                            <i class="fas fa-trash-alt text-sm"></i>
                                            <span>លុប</span>
                                        </button>
                                    </div>
                                </td>
                                
                            </tr>

                            {{-- Edit Payment Modal for each payment --}}
                            <div class="modal fade" id="editPaymentModal{{ $payment->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content border-none rounded-2xl shadow-2xl">
                                        <div class="modal-header bg-blue-600 text-white rounded-t-2xl p-4">
                                            <h5 class="modal-title font-bold flex items-center gap-2">
                                                <i class="fas fa-edit"></i> កែប្រែការបង់ប្រាក់
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body p-6 bg-gray-50">
                                                <div class="grid grid-cols-1 gap-4">
                                                    <!-- Current Rental Info (Display Only) -->
                                                    <div class="bg-blue-50 border border-blue-200 rounded-xl p-4">
                                                        <label class="block text-sm font-bold text-gray-700 mb-2">
                                                            <i class="fas fa-user mr-1"></i> អ្នកជួល & បន្ទប់បច្ចុប្បន្ន
                                                        </label>
                                                        <div class="flex items-center gap-3">
                                                            <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                                                                <i class="fa-solid fa-circle-user"></i>
                                                            </div>
                                                            <div>
                                                                <p class="font-bold text-gray-800">{{ $payment->rental->tenant->name ?? 'N/A' }}</p>
                                                                <p class="text-sm text-gray-500">បន្ទប់ {{ $payment->rental->room->room_number ?? 'N/A' }}</p>
                                                            </div>
                                                        </div>
                                                        <!-- Hidden input to keep rental_id -->
                                                        <input type="hidden" name="rental_id" value="{{ $payment->rental_id }}">
                                                    </div>

                                                    <!-- Month Selection -->
                                                    <div>
                                                        <label class="block text-sm font-bold text-gray-700 mb-1">សម្រាប់ខែ</label>
                                                        <input type="month" name="pay_month" value="{{ $payment->pay_month }}"
                                                            class="w-full border-gray-300 rounded-xl focus:ring-blue-500 shadow-sm px-3 py-2"
                                                            required>
                                                    </div>

                                                    <!-- Paid Date -->
                                                    <div>
                                                        <label class="block text-sm font-bold text-gray-700 mb-1">ថ្ងៃបង់ប្រាក់</label>
                                                        <input type="date" name="paid_date" value="{{ $payment->paid_date }}"
                                                            class="w-full border-gray-300 rounded-xl focus:ring-blue-500 shadow-sm px-3 py-2"
                                                            required>
                                                    </div>

                                                    <!-- Amount and Status -->
                                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                        <div>
                                                            <label class="block text-sm font-bold text-gray-700 mb-1">ចំនួនទឹកប្រាក់ ($)</label>
                                                            <div class="relative">
                                                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">$</span> 
                                                                <input type="number" step="0.01" name="amount_paid" value="{{ $payment->amount_paid }}"
                                                                    class="w-full pl-8 border-gray-300 rounded-xl focus:ring-blue-500 shadow-sm px-3 py-2"
                                                                    placeholder="0.00" required>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <label class="block text-sm font-bold text-gray-700 mb-1">ស្ថានភាព</label>
                                                            <select name="status" class="w-full border-gray-300 rounded-xl focus:ring-blue-500 shadow-sm px-3 py-2">
                                                                <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>បង់រួច (Paid)</option>
                                                                <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>កំពុងរង់ចាំ (Pending)</option>
                                                                <option value="overdue" {{ $payment->status == 'overdue' ? 'selected' : '' }}>ហួសកំណត់ (Overdue)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer bg-white rounded-b-2xl px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                                                <button type="button"
                                                    class="inline-flex items-center gap-2 px-5 py-2.5 text-gray-600 font-semibold bg-gray-100 hover:bg-gray-200 rounded-xl transition-all duration-200"
                                                    data-bs-dismiss="modal">
                                                    <i class="fas fa-times"></i>
                                                    បោះបង់
                                                </button>
                                                <button type="submit"
                                                    class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-xl hover:from-blue-700 hover:to-blue-800 shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-xl hover:shadow-blue-500/40 hover:-translate-y-0.5">
                                                    <i class="fas fa-save"></i>
                                                    រក្សាទុក
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center text-gray-400 italic">មិនទាន់មានទិន្នន័យនៅឡើយ...
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- Pagination --}}
            @if($payments->hasPages())
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-600">
                    បង្ហាញ {{ $payments->firstItem() }} ដល់ {{ $payments->lastItem() }} នៃ {{ $payments->total() }} ទិន្នន័យ
                </div>
                <div class="flex items-center gap-2">
                    {{-- Previous Page Link --}}
                    @if ($payments->onFirstPage())
                        <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </span>
                    @else
                        <a href="{{ $payments->appends(['search' => request('search')])->previousPageUrl() }}" class="px-3 py-2 text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif

                    {{-- Page Numbers --}}
                    @foreach ($payments->getUrlRange(1, $payments->lastPage()) as $page => $url)
                        @if ($page == $payments->currentPage())
                            <span class="px-4 py-2 bg-blue-600 text-white font-bold rounded-lg">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-4 py-2 text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">{{ $page }}</a>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($payments->hasMorePages())
                        <a href="{{ $payments->appends(['search' => request('search')])->nextPageUrl() }}" class="px-3 py-2 text-gray-600 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <span class="px-3 py-2 text-gray-400 bg-gray-100 rounded-lg cursor-not-allowed">
                            <i class="fas fa-chevron-right"></i>
                        </span>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>

    {{-- Payment Modal --}}
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-none rounded-2xl shadow-2xl">
                <div class="modal-header bg-blue-600 text-white rounded-t-2xl p-4">
                    <h5 class="modal-title font-bold flex items-center gap-2">
                        <i class="fas fa-file-invoice-dollar"></i> បញ្ចូលព័ត៌មានបង់ប្រាក់
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('admin.payments.store') }}" method="POST">
                    @csrf
                    <div class="modal-body p-6 bg-gray-50">
                        <div class="grid grid-cols-1 gap-4">
                            <!-- Month Selection -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">សម្រាប់ខែ</label>
                                <input type="month" name="pay_month" id="pay_month"
                                    class="w-full border-gray-300 rounded-xl focus:ring-blue-500 shadow-sm px-3 py-2"
                                    required>
                                <small class="text-gray-500 text-xs">ជ្រើសរើសខែជាមុនសិន ដើម្បីមើលការជួលដែលមាន</small>
                            </div>

                            <!-- Rental Selection -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">ជ្រើសរើសការជួល (Rental)</label>
                                <select name="rental_id"  id="rentalFilter" onchange="filterByRental(this.value)"
                                    class="block w-full pl-3 pr-3 py-2 border border-gray-300 rounded-xl leading-5 bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-all">
                                    <option value="">-- ជ្រើសរើសការជួលទាំងអស់ --</option>
                                    @foreach($activeRentals as $rental)
                                        <option value="{{ $rental->id }}" data-paid-months='@json($rental->paid_months)'
                                            data-price="{{ $rental->rent_amount_numeric }}">
                                            {{ $rental->tenant->name }} (បន្ទប់ {{ $rental->room->room_number }})
                                        </option>
                                    @endforeach
                                </select>
                                <small id="rentalInfo" class="text-blue-600 text-xs font-medium"></small>
                                @if($activeRentals->isEmpty())
                                    <small class="text-red-600 text-xs font-medium block mt-1">⚠️ មិនមានការជួលសកម្មនៅឡើយទេ។
                                        សូមបង្កើតការជួលជាមុនសិន។</small>
                                @endif
                            </div>

                            <!-- Paid Date -->
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">ថ្ងៃបង់ប្រាក់</label>
                                <input type="date" name="paid_date"
                                    class="w-full border-gray-300 rounded-xl focus:ring-blue-500 shadow-sm px-3 py-2"
                                    value="{{ date('Y-m-d') }}" required>
                            </div>

                            <!-- Amount and Status -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">ចំនួនទឹកប្រាក់ ($)</label>
                                    <div class="relative">
                                        <span
                                            class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500">$</span>
                                        <input type="number" step="0.01" name="amount_paid" id="amount_paid"
                                            class="w-full pl-8 border-gray-300 rounded-xl focus:ring-blue-500 shadow-sm px-3 py-2"
                                            placeholder="0.00" required>
                                    </div>
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">ស្ថានភាព</label>
                                    <select name="status"
                                        class="w-full border-gray-300 rounded-xl focus:ring-blue-500 shadow-sm px-3 py-2">
                                        <option value="paid">បង់រួច (Paid)</option>
                                        <option value="pending" selected>កំពុងរង់ចាំ (Pending)</option>
                                        <option value="overdue">ហួសកំណត់ (Overdue)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-white rounded-b-2xl px-6 py-4 flex justify-end gap-3 border-t border-gray-100">
                        <button type="button"
                            class="inline-flex items-center gap-2 px-5 py-2.5 text-gray-600 font-semibold bg-gray-100 hover:bg-gray-200 rounded-xl transition-all duration-200"
                            data-bs-dismiss="modal">
                            <i class="fas fa-times"></i>
                            បោះបង់
                        </button>
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-2.5 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-bold rounded-xl hover:from-blue-700 hover:to-blue-800 shadow-lg shadow-blue-500/30 transition-all duration-200 hover:shadow-xl hover:shadow-blue-500/40 hover:-translate-y-0.5">
                            <i class="fas fa-plus-circle"></i>
                            បញ្ចូលការបង់ប្រាក់
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const payMonthInput = document.getElementById('pay_month');
            const rentalSelect = document.getElementById('rentalFilter');
            const rentalInfo = document.getElementById('rentalInfo');
            const amountInput = document.getElementById('amount_paid');
            const paymentSearch = document.getElementById('paymentSearch');
            const paymentTableBody = document.getElementById('paymentTableBody');

            // Search functionality for Tenants and Rooms
            paymentSearch.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase().trim();
                const rows = paymentTableBody.querySelectorAll('tr');

                rows.forEach(row => {
                    // Get tenant name and room number from the first cell
                    const tenantNameEl = row.querySelector('div.font-bold.text-gray-800');
                    const roomNumberEl = row.querySelector('div.text-xs.text-gray-500');
                    
                    const tenantName = tenantNameEl ? tenantNameEl.textContent.toLowerCase() : '';
                    const roomNumber = roomNumberEl ? roomNumberEl.textContent.toLowerCase() : '';

                    // Check if search term matches either tenant name or room number
                    const matches = tenantName.includes(searchTerm) || roomNumber.includes(searchTerm);

                    // Show or hide the row
                    row.style.display = matches ? '' : 'none';
                });

                // Show "no results" message if all rows are hidden
                const visibleRows = Array.from(rows).filter(row => row.style.display !== 'none');
                if (searchTerm && visibleRows.length === 0) {
                    paymentTableBody.innerHTML = '<tr><td colspan="6" class="px-6 py-8 text-center text-gray-500"><i class="fas fa-search mr-2"></i>គ្មានលទ្ធផលស្វែងរក</td></tr>';
                } else if (!searchTerm && visibleRows.length === 0) {
                    // Restore original table if search is cleared but no payments exist
                    location.reload();
                }
            });

            // 1. Month selection: hide rentals already paid for selected month
            payMonthInput.addEventListener('change', function () {
                const selectedMonth = this.value; // YYYY-MM
                if (!selectedMonth) {
                    rentalSelect.disabled = true;
                    rentalSelect.value = '';
                    rentalInfo.textContent = '';
                    amountInput.value = '';
                    return;
                }

                rentalSelect.disabled = false;
                let availableCount = 0;

                Array.from(rentalSelect.options).forEach((option, index) => {
                    if (index === 0) return; // skip placeholder
                    const paidMonths = JSON.parse(option.dataset.paidMonths || '[]');
                    const isAlreadyPaid = paidMonths.includes(selectedMonth);

                    if (isAlreadyPaid) {
                        option.style.display = 'none';
                        option.disabled = true;
                    } else {
                        option.style.display = 'block';
                        option.disabled = false;
                        availableCount++;
                    }
                });

                rentalSelect.value = '';
                amountInput.value = '';

                // Feedback message
                if (availableCount === 0) {
                    rentalInfo.textContent = '⚠️ គ្មានការជួលដែលមិនទាន់បង់សម្រាប់ខែនេះទេ';
                    rentalInfo.className = 'text-red-600 text-xs font-medium block mt-1';
                } else {
                    rentalInfo.textContent = `✓ មានការជួល ${availableCount} អាចជ្រើសរើសបាន`;
                    rentalInfo.className = 'text-green-600 text-xs font-medium block mt-1';
                }
            });

            // 2. Auto-fill amount when rental is selected
            rentalSelect.addEventListener('change', function () {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value && selectedOption.dataset.price) {
                    amountInput.value = selectedOption.dataset.price;
                } else {
                    amountInput.value = '';
                }
            });
        });
    </script>

    {{-- SweetAlert2 Delete Payment Handler --}}
    <script>
        document.addEventListener('click', function(e) {
            const btn = e.target.closest('.btn-delete-payment');
            if (!btn) return;
            e.preventDefault();

            const tenant = btn.dataset.tenant;
            const room = btn.dataset.room;
            const month = btn.dataset.month;
            const amount = btn.dataset.amount;
            const url = btn.dataset.url;

            Swal.fire({
                title: 'តើអ្នកប្រាកដទេ?',
                // html: `
                //     <div style="text-align:left; font-size:14px; color:#475569; line-height:1.8;">
                //         <div style="display:flex; justify-content:space-between; padding:4px 0;"><span>អ្នកជួល:</span> <strong>${tenant}</strong></div>
                //         <div style="display:flex; justify-content:space-between; padding:4px 0;"><span>បន្ទប់:</span> <strong>${room}</strong></div>
                //         <div style="display:flex; justify-content:space-between; padding:4px 0;"><span>ខែ:</span> <strong>${month}</strong></div>
                //         <div style="display:flex; justify-content:space-between; padding:4px 0;"><span>ទឹកប្រាក់:</span> <strong style="color:#2563eb;">${amount}</strong></div>
                //     </div>
                //     <p style="color:#ef4444; font-size:12px; margin-top:12px;">⚠️ សកម្មភាពនេះមិនអាចត្រឡប់វិញបានទេ!</p>
                // `,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'បាទ/ចាស លុបវា!',
                cancelButtonText: 'បោះបង់',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-xl px-6 py-2.5 font-bold',
                    cancelButton: 'rounded-xl px-6 py-2.5 font-bold',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Create and submit a hidden form
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = url;
                    form.innerHTML = `
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">
                    `;
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        });
    </script>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        .animate-slide-in {
            animation: slideIn 0.4s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
@endsection