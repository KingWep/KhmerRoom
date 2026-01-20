@extends('layouts.LayoutsAdmin')
@section('title', 'ផ្ទះជួលខ្មែរ - គ្រប់គ្រងការបង់ប្រាក់')

@section('content')
@php
    // FAKE DATA FOR TESTING - Replace these with $payments from Controller later
    $mockPayments = [
        (object)[
            'id' => 1,
            'tenant' => (object)['name' => 'សុខ វិបុល'],
            'room' => (object)['room_number' => 'A01'],
            'month' => 'មករា',
            'year' => '2024',
            'amount' => 50,
            'status' => 'paid',
            'paid_date' => '2024-01-05'
        ],
        (object)[
            'id' => 2,
            'tenant' => (object)['name' => 'ចាន់ ធារី'],
            'room' => (object)['room_number' => 'B05'],
            'month' => 'មករា',
            'year' => '2024',
            'amount' => 75,
            'status' => 'unpaid',
            'paid_date' => null
        ],
    ];

    $totalPaid = 50;
    $totalUnpaid = 75;
@endphp

<div class="space-y-6 animate-slide-up p-6">
    {{-- Header Section --}}
    <div>
        <h1 class="text-3xl font-bold flex items-center gap-2">
            <i class="fas fa-credit-card h-8 w-8 text-blue-600"></i>
            គ្រប់គ្រងការបង់ប្រាក់
        </h1>
        <p class="text-gray-500 mt-1">តាមដានការបង់ប្រាក់ប្រចាំខែ</p>
    </div>

    {{-- Summary Cards --}}
    <div class="grid md:grid-cols-2 gap-4">
        <div class="bg-green-50 border border-green-200 rounded-xl p-6 shadow-sm">
            <p class="text-sm text-green-600">បានបង់សរុប</p>
            <p class="text-3xl font-bold text-green-700">${{ number_format($totalPaid, 2) }}</p>
        </div>
        <div class="bg-red-50 border border-red-200 rounded-xl p-6 shadow-sm">
            <p class="text-sm text-red-600">មិនទាន់បង់សរុប</p>
            <p class="text-3xl font-bold text-red-700">${{ number_format($totalUnpaid, 2) }}</p>
        </div>
    </div>

    {{-- Search and Table Card --}}
    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        <div class="p-4 border-b">
            <div class="relative max-w-md">
                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                    <i class="fas fa-search"></i>
                </span>
                <input 
                    type="text" 
                    id="paymentSearch" 
                    placeholder="ស្វែងរកតាមឈ្មោះ ឬ ខែ..." 
                    class="pl-10 w-full border rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="p-4 font-semibold text-gray-700 border-b">អ្នកជួល</th>
                        <th class="p-4 font-semibold text-gray-700 border-b">បន្ទប់</th>
                        <th class="p-4 font-semibold text-gray-700 border-b">ខែ/ឆ្នាំ</th>
                        <th class="p-4 font-semibold text-gray-700 border-b">ចំនួនទឹកប្រាក់</th>
                        <th class="p-4 font-semibold text-gray-700 border-b">ស្ថានភាព</th>
                        <th class="p-4 font-semibold text-gray-700 border-b">ថ្ងៃបង់</th>
                        <th class="p-4 font-semibold text-gray-700 border-b text-right">សកម្មភាព</th>
                    </tr>
                </thead>
                <tbody id="paymentTableBody">
                    @foreach($mockPayments as $payment)
                    <tr class="border-b hover:bg-gray-50 transition-colors">
                        <td class="p-4 font-medium">{{ $payment->tenant->name }}</td>
                        <td class="p-4">បន្ទប់ {{ $payment->room->room_number }}</td>
                        <td class="p-4">{{ $payment->month }} {{ $payment->year }}</td>
                        <td class="p-4 text-blue-600 font-bold">${{ number_format($payment->amount, 2) }}</td>
                        <td class="p-4">
                            @if($payment->status === 'paid')
                                <span class="px-2 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">បង់រួច</span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold bg-yellow-100 text-yellow-700 rounded-full">មិនទាន់បង់</span>
                            @endif
                        </td>
                        <td class="p-4 text-gray-500 text-sm">{{ $payment->paid_date ?? '-' }}</td>
                        <td class="p-4 text-right">
                            @if($payment->status !== 'paid')
                                <button 
                                    onclick="openConfirmModal('{{ $payment->id }}', '{{ $payment->month }}', '{{ $payment->amount }}')"
                                    class="inline-flex items-center px-3 py-1 border border-green-600 text-green-600 rounded-md hover:bg-green-600 hover:text-white transition-all text-sm"
                                >
                                    <i class="fas fa-check mr-1 text-xs"></i>
                                    បញ្ជាក់
                                </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Confirmation Modal --}}
<div id="confirmModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white rounded-lg p-6 max-w-sm w-full shadow-xl transform transition-all">
        <h3 class="text-xl font-bold mb-4">បញ្ជាក់ការបង់ប្រាក់</h3>
        <p id="modalText" class="text-gray-600 mb-2"></p>
        <p id="modalAmount" class="text-3xl font-bold text-blue-600 mb-6"></p>
        
        <div class="flex justify-end gap-3">
            <button type="button" onclick="closeModal()" class="px-4 py-2 border rounded-md hover:bg-gray-100">បោះបង់</button>
            <button type="button" onclick="alert('Confirmed ID: ' + currentId)" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                បញ្ជាក់ការបង់ប្រាក់
            </button>
        </div>
    </div>
</div>

<script>
    let currentId = null;

    function openConfirmModal(id, month, amount) {
        currentId = id;
        const modal = document.getElementById('confirmModal');
        document.getElementById('modalText').innerText = `តើអ្នកប្រាកដថាចង់បញ្ជាក់ការបង់ប្រាក់សម្រាប់ខែ ${month} មែនទេ?`;
        document.getElementById('modalAmount').innerText = `$${amount}`;
        
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal() {
        document.getElementById('confirmModal').classList.add('hidden');
        document.getElementById('confirmModal').classList.remove('flex');
    }

    // Client-side Filter Logic
    document.getElementById('paymentSearch').addEventListener('keyup', function() {
        let filter = this.value.toUpperCase();
        let rows = document.querySelectorAll("#paymentTableBody tr");
        
        rows.forEach(row => {
            let name = row.cells[0].textContent.toUpperCase();
            let month = row.cells[2].textContent.toUpperCase();
            row.style.display = (name.includes(filter) || month.includes(filter)) ? "" : "none";
        });
    });
</script>
@endsection