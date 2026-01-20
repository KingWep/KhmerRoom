@extends('layouts.LayoutsAdmin')
@section('title', 'ផ្ទះជួលខ្មែរ - របាយការណ៍')

@section('content')
@php
    // MOCK DATA FOR CHARTS & TABLES
    $khmerMonths = ['មករា', 'កុម្ភៈ', 'មីនា', 'មេសា'];
    $monthlyIncome = [450, 520, 480, 600]; // Fake income per month
    
    $roomStatus = [
        ['name' => 'ទំនេរ', 'value' => 5, 'color' => '#22c55e'],
        ['name' => 'មានអ្នកជួល', 'value' => 15, 'color' => '#ef4444'],
        ['name' => 'កំពុងជួសជុល', 'value' => 2, 'color' => '#f59e0b'],
    ];

    $totalIncome = array_sum($monthlyIncome);
    $avgIncome = $totalIncome / count($monthlyIncome);
@endphp

<div class="space-y-6 animate-slide-up p-6">
    {{-- Header --}}
    <div>
        <h1 class="text-3xl font-bold flex items-center gap-2">
            <i class="fas fa-chart-line h-8 w-8 text-blue-600"></i>
            របាយការណ៍
        </h1>
        <p class="text-gray-500 mt-1">របាយការណ៍ប្រចាំខែ និងប្រចាំឆ្នាំ</p>
    </div>

    {{-- Summary Cards --}}
    <div class="grid md:grid-cols-2 gap-4">
        <div class="bg-gradient-to-r from-yellow-500 to-orange-600 rounded-xl p-6 text-white shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80">ចំណូលសរុប (ឆ្នាំ​ 2024)</p>
                    <p class="text-4xl font-bold">${{ number_format($totalIncome, 2) }}</p>
                </div>
                <i class="fas fa-trending-up text-5xl opacity-30"></i>
            </div>
        </div>

        <div class="bg-white border rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">ចំណូលជាមធ្យមប្រចាំខែ</p>
                    <p class="text-4xl font-bold text-blue-600">${{ number_format($avgIncome, 2) }}</p>
                </div>
                <i class="fas fa-calendar-alt text-5xl text-gray-200"></i>
            </div>
        </div>
    </div>

    {{-- Charts Row --}}
    <div class="grid md:grid-cols-2 gap-6">
        {{-- Bar Chart --}}
        <div class="bg-white border rounded-xl p-6 shadow-sm">
            <h3 class="font-bold mb-4 text-gray-700">ចំណូលប្រចាំខែ</h3>
            <div style="height: 300px;">
                <canvas id="incomeChart"></canvas>
            </div>
        </div>

        {{-- Pie Chart --}}
        <div class="bg-white border rounded-xl p-6 shadow-sm">
            <h3 class="font-bold mb-4 text-gray-700">ការបែងចែកស្ថានភាពបន្ទប់</h3>
            <div style="height: 300px;">
                <canvas id="roomChart"></canvas>
            </div>
        </div>
    </div>

    {{-- Table Card --}}
    <div class="bg-white border rounded-xl shadow-sm overflow-hidden">
        <div class="p-4 border-b">
            <h3 class="font-bold text-gray-700">សង្ខេបប្រចាំខែ</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="p-4 font-semibold">ខែ</th>
                        <th class="p-4 font-semibold text-right">បានបង់</th>
                        <th class="p-4 font-semibold text-right">មិនទាន់បង់</th>
                        <th class="p-4 font-semibold text-right">សរុប</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($khmerMonths as $index => $month)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-4 font-medium">{{ $month }} 2024</td>
                        <td class="p-4 text-right text-green-600 font-bold">${{ $monthlyIncome[$index] }}</td>
                        <td class="p-4 text-right text-red-500 font-bold">$20.00</td>
                        <td class="p-4 text-right font-bold text-gray-800">${{ $monthlyIncome[$index] + 20 }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
            datasets: [{
                label: 'ចំណូល ($)',
                data: {!! json_encode($monthlyIncome) !!},
                backgroundColor: '#f59e0b',
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: { y: { beginAtZero: true } }
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
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });
</script>
@endsection