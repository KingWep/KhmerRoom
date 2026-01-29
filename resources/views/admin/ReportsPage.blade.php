@extends('layouts.LayoutsAdmin')
@section('title', 'ផ្ទះជួលខ្មែរ - របាយការណ៍')

@section('content')
<div class="space-y-6 animate-slide-up p-6">
    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold flex items-center gap-3">
                <div class="h-12 w-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-chart-line text-blue-600 text-xl"></i>
                </div>
                របាយការណ៍
            </h1>
            <p class="text-gray-500 mt-1">របាយការណ៍ប្រចាំខែ និងប្រចាំឆ្នាំ {{ $currentYear }}</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="window.print()" class="inline-flex items-center gap-2 px-4 py-2.5 bg-green-300 hover:bg-green-500 text-gray-700 rounded-xl transition-all font-medium">
                <i class="fas fa-print"></i>
                បោះពុម្ព
            </button>
        </div>
    </div>

    {{-- Quick Stats Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center gap-3">
                <div class="h-11 w-11 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-door-open text-blue-600"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">បន្ទប់សរុប</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalRooms }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center gap-3">
                <div class="h-11 w-11 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-green-600"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">អ្នកជួលសរុប</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalTenants }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center gap-3">
                <div class="h-11 w-11 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-file-contract text-purple-600"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">ការជួលសកម្ម</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $activeRentals }}</p>
                </div>
            </div>
        </div>
        <div class="bg-white border border-gray-100 rounded-xl p-5 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex items-center gap-3">
                <div class="h-11 w-11 bg-orange-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-receipt text-orange-600"></i>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">ការបង់ប្រាក់ ({{ $currentYear }})</p>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalPayments }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="grid md:grid-cols-3 gap-4">
        <div class="bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl p-6 text-white shadow-lg shadow-green-500/30">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80 font-medium">ចំណូលបានបង់ ({{ $currentYear }})</p>
                    <p class="text-4xl font-black mt-1">${{ number_format($totalIncome, 2) }}</p>
                    <p class="text-xs opacity-70 mt-2">
                        <i class="fas fa-check-circle mr-1"></i>
                        ការបង់ប្រាក់ដែលបានបញ្ជាក់
                    </p>
                </div>
                <div class="h-16 w-16 bg-white/20 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-wallet text-3xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl p-6 text-white shadow-lg shadow-orange-500/30">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80 font-medium">កំពុងរង់ចាំ ({{ $currentYear }})</p>
                    <p class="text-4xl font-black mt-1">${{ number_format($totalPending, 2) }}</p>
                    <p class="text-xs opacity-70 mt-2">
                        <i class="fas fa-clock mr-1"></i>
                        ការបង់ប្រាក់មិនទាន់បញ្ជាក់
                    </p>
                </div>
                <div class="h-16 w-16 bg-white/20 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-hourglass-half text-3xl"></i>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 text-white shadow-lg shadow-blue-500/30">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80 font-medium">ចំណូលជាមធ្យមប្រចាំខែ</p>
                    <p class="text-4xl font-black mt-1">${{ number_format($avgIncome, 2) }}</p>
                    <p class="text-xs opacity-70 mt-2">
                        <i class="fas fa-chart-bar mr-1"></i>
                        គណនាពីខែដែលមានទិន្នន័យ
                    </p>
                </div>
                <div class="h-16 w-16 bg-white/20 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-calculator text-3xl"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Charts Row --}}
    <div class="grid md:grid-cols-2 gap-6">
        {{-- Bar Chart --}}
        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-700 flex items-center gap-2">
                    <i class="fas fa-chart-bar text-blue-500"></i>
                    ចំណូលប្រចាំខែ ({{ $currentYear }})
                </h3>
            </div>
            <div style="height: 320px;">
                <canvas id="incomeChart"></canvas>
            </div>
        </div>

        {{-- Pie Chart --}}
        <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-700 flex items-center gap-2">
                    <i class="fas fa-chart-pie text-purple-500"></i>
                    ការបែងចែកស្ថានភាពបន្ទប់
                </h3>
            </div>
            <div style="height: 320px;">
                <canvas id="roomChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Monthly Summary Table --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-700 flex items-center gap-2">
                <i class="fas fa-table text-green-500"></i>
                សង្ខេបប្រចាំខែ ({{ $currentYear }})
            </h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50">
                    <tr class="border-b border-gray-100">
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">ខែ</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm text-right">បានបង់</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm text-right">មិនទាន់បង់</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm text-right">សរុប</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($khmerMonths as $index => $month)
                    <tr class="border-b border-gray-50 hover:bg-blue-50/30 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-800">
                            <span class="inline-flex items-center gap-2">
                                <span class="h-8 w-8 bg-gray-100 rounded-lg flex items-center justify-center text-xs font-bold text-gray-500">{{ $index + 1 }}</span>
                                {{ $month }} {{ $currentYear }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="text-green-600 font-bold">${{ number_format($monthlyIncome[$index], 2) }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="text-yellow-600 font-bold">${{ number_format($monthlyPending[$index], 2) }}</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="font-bold text-gray-800">${{ number_format($monthlyTotal[$index], 2) }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr class="border-t-2 border-gray-200">
                        <td class="px-6 py-4 font-bold text-gray-800">សរុបទាំងអស់</td>
                        <td class="px-6 py-4 text-right font-bold text-green-600 text-lg">${{ number_format($totalIncome, 2) }}</td>
                        <td class="px-6 py-4 text-right font-bold text-yellow-600 text-lg">${{ number_format($totalPending, 2) }}</td>
                        <td class="px-6 py-4 text-right font-bold text-blue-600 text-lg">${{ number_format($totalIncome + $totalPending, 2) }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    {{-- Recent Payments Table --}}
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">
        <div class="p-5 border-b border-gray-100 flex items-center justify-between">
            <h3 class="font-bold text-gray-700 flex items-center gap-2">
                <i class="fas fa-history text-blue-500"></i>
                ការបង់ប្រាក់ថ្មីៗ
            </h3>
            <a href="{{ route('admin.payments') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium flex items-center gap-1">
                មើលទាំងអស់
                <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50">
                    <tr class="border-b border-gray-100">
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">អ្នកជួល</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">បន្ទប់</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">សម្រាប់ខែ</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm text-right">ទឹកប្រាក់</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">ស្ថានភាព</th>
                        <th class="px-6 py-4 font-semibold text-gray-600 text-sm">ថ្ងៃបង់</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentPayments as $payment)
                    <tr class="border-b border-gray-50 hover:bg-blue-50/30 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="h-9 w-9 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold text-sm">
                                    {{ strtoupper(mb_substr($payment->rental->tenant->name ?? 'N', 0, 1, 'UTF-8')) }}
                                </div>
                                <span class="font-medium text-gray-800">{{ $payment->rental->tenant->name ?? 'N/A' }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600">{{ $payment->rental->room->room_number ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ \Carbon\Carbon::parse($payment->pay_month)->format('M Y') }}</td>
                        <td class="px-6 py-4 text-right font-bold text-blue-600">${{ number_format($payment->amount_paid, 2) }}</td>
                        <td class="px-6 py-4">
                            @if($payment->status == 'paid')
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">បង់រួច</span>
                            @elseif($payment->status == 'pending')
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-yellow-100 text-yellow-700">រង់ចាំ</span>
                            @else
                                <span class="px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700">ហួសកំណត់</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-gray-500 text-sm">{{ \Carbon\Carbon::parse($payment->paid_date)->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-400">
                            <div class="flex flex-col items-center gap-2">
                                <i class="fas fa-inbox text-4xl"></i>
                                <p>មិនមានទិន្នន័យការបង់ប្រាក់នៅឡើយទេ</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        @if($recentPayments->hasPages())
        <div class="px-6 py-4 flex flex-col md:flex-row items-center justify-between gap-4 border-t border-gray-100 bg-gray-50/50">
            <p class="text-sm text-gray-500">
                បង្ហាញ {{ $recentPayments->firstItem() }} ដល់ {{ $recentPayments->lastItem() }} នៃ {{ $recentPayments->total() }} ការបង់ប្រាក់
            </p>
            <div class="flex items-center gap-2">
                {{-- Previous Page Link --}}
                @if ($recentPayments->onFirstPage())
                    <span class="size-9 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </span>
                @else
                    <a href="{{ $recentPayments->previousPageUrl() }}" class="size-9 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-white transition-colors">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </a>
                @endif

                {{-- Page Numbers --}}
                @foreach ($recentPayments->getUrlRange(1, $recentPayments->lastPage()) as $page => $url)
                    @if ($page == $recentPayments->currentPage())
                        <span class="size-9 flex items-center justify-center rounded-lg bg-blue-600 text-white font-bold text-sm">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="size-9 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-white transition-colors font-medium text-sm text-gray-700">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($recentPayments->hasMorePages())
                    <a href="{{ $recentPayments->nextPageUrl() }}" class="size-9 flex items-center justify-center rounded-lg border border-gray-200 hover:bg-white transition-colors">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </a>
                @else
                    <span class="size-9 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </span>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>

{{-- Chart.js Scripts --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Income Bar Chart
    const ctxIncome = document.getElementById('incomeChart').getContext('2d');
    new Chart(ctxIncome, {
        type: 'bar',
        data: {
            labels: {!! json_encode($khmerMonths) !!},
            datasets: [
                {
                    label: 'បានបង់ ($)',
                    data: {!! json_encode($monthlyIncome) !!},
                    backgroundColor: '#22c55e',
                    borderRadius: 6
                },
                {
                    label: 'រង់ចាំ ($)',
                    data: {!! json_encode($monthlyPending) !!},
                    backgroundColor: '#f59e0b',
                    borderRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                }
            },
            scales: { 
                y: { 
                    beginAtZero: true,
                    grid: {
                        color: '#f3f4f6'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });

    // Room Pie Chart
    const ctxRoom = document.getElementById('roomChart').getContext('2d');
    new Chart(ctxRoom, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode(array_column($roomStatus, 'name')) !!},
            datasets: [{
                data: {!! json_encode(array_column($roomStatus, 'value')) !!},
                backgroundColor: {!! json_encode(array_column($roomStatus, 'color')) !!},
                borderWidth: 0,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%',
            plugins: {
                legend: { 
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                }
            }
        }
    });
</script>

<style>
    .animate-slide-up {
        animation: slideUp 0.5s ease-out;
    }
    
    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    @media print {
        .no-print {
            display: none !important;
        }
    }
</style>
@endsection
