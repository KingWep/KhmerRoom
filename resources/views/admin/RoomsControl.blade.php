@extends('layouts.LayoutsAdmin')

@section('title', 'គ្រប់គ្រងបន្ទប់ - Khmer Rental')

@section('content')

    @php
        // Define fake data directly in the front-end
        $fakeRooms = collect([
            (object) [
                'id' => 1,
                'roomNumber' => '101',
                'floor' => 1,
                'price' => 180,
                'status' => 'available',
                'description' => 'ម៉ាស៊ីនត្រជាក់, គ្រែឈើ, ទូទឹកកក...'
            ],
            (object) [
                'id' => 2,
                'roomNumber' => '102',
                'floor' => 1,
                'price' => 150,
                'status' => 'occupied',
                'description' => 'កង្ហារ, គ្រែ, បន្ទប់ទឹកក្នុង...'
            ],
            (object) [
                'id' => 3,
                'roomNumber' => '201',
                'floor' => 2,
                'price' => 200,
                'status' => 'maintenance',
                'description' => 'កំពុងលាបថ្នាំថ្មី និងដូរអំពូល'
            ],
            (object) [
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
            $fakeRooms = $fakeRooms->filter(function ($room) use ($search) {
                return str_contains(strtolower($room->roomNumber), strtolower($search)) ||
                    str_contains(strtolower($room->description), strtolower($search));
            });
        }
    @endphp

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Sans+Khmer:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', 'Noto Sans Khmer', sans-serif;
        }

        .premium-card {
            background: #ffffff;
            border: 1px solid #f0f2f5;
            box-shadow: 0 10px 30px -12px rgba(0, 0, 0, 0.05);
        }

        table {
            font-size: 15px;
        }

        .row-fade-in {
            animation: fadeIn 0.5s ease forwards;
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
    </style>

    <main class="flex-1 overflow-y-auto flex flex-col min-h-screen bg-[#F8F9FB]">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-2xl rounded-3xl overflow-hidden">

                    <div class="bg-gradient-to-r from-cyan-600 to-blue-700 px-5 py-3 flex justify-between items-center">
                        <h5 class="text-white font-bold text-xl mb-0 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                            បន្ថែមបន្ទប់ថ្មី
                        </h5>
                        <button type="button"
                            class="btn-close btn-close-white opacity-80 hover:opacity-100 transition-opacity"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ route('admin.rooms.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                            <div class="mx-6 mt-4 p-4 mb-4 text-sm text-red-800 rounded-xl bg-red-50 border border-red-200"
                                role="alert">
                                <div class="flex items-center mb-2">
                                    <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <span class="font-bold">សូមពិនិត្យកំហុសខាងក្រោម៖ (Please check errors)</span>
                                </div>
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="modal-body p-6 bg-slate-50">
                            <div class="row g-4">

                                <div class="col-md-7">
                                    <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
                                        <h6 class="text-blue-600 uppercase text-xs font-bold mb-4 tracking-widest">
                                            ព័ត៌មានទូទៅ</h6>

                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label font-medium text-slate-700">លេខបន្ទប់</label>
                                                <input type="text" name="room_number"
                                                    class="form-control border-slate-300 rounded-xl focus:border-blue-500 focus:ring-4 focus:ring-blue-100 transition-all"
                                                    placeholder="ឧទាហរណ៍: A-101" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label font-medium text-slate-700">ជាន់</label>
                                                <input type="number" min="0" name="floor"
                                                    class="form-control border-slate-300 rounded-xl" placeholder="0"
                                                    required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label font-medium text-slate-700">តម្លៃ
                                                    (ក្នុងមួយខែ)</label>
                                                <div class="input-group">
                                                    <span
                                                        class="input-group-text bg-slate-100 border-slate-300 text-slate-500 rounded-l-xl">$</span>
                                                    <input type="number" min="0" step="0.01" name="price"
                                                        class="form-control border-slate-300 rounded-r-xl" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label font-medium text-slate-700">ទំហំបន្ទប់</label>
                                                <div class="input-group">
                                                    <input type="text" name="size"
                                                        class="form-control border-slate-300 rounded-l-xl"
                                                        placeholder="ឧទាហរណ៍: 25">
                                                    <span
                                                        class="input-group-text bg-slate-100 border-slate-300 text-slate-500 rounded-r-xl">m²</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm mt-4">
                                        <label class="form-label font-medium text-slate-700">ការពិពណ៌នា</label>
                                        <textarea name="description" class="form-control border-slate-300 rounded-xl"
                                            rows="3" placeholder="បញ្ជាក់ព័ត៌មានបន្ថែមពីបន្ទប់..."></textarea>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="space-y-4">
                                        <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
                                            <label class="form-label font-medium text-slate-700">ស្ថានភាពបន្ទប់</label>
                                            <select name="status"
                                                class="form-select border-slate-300 rounded-xl cursor-pointer">
                                                <option value="available">🟢 ទំនេរ (Available)</option>
                                                <option value="occupied">🔴 មានភ្ញៀវ (Occupied)</option>
                                                <option value="maintenance">🟠 កំពុងជួសជុល (Maintenance)</option>
                                            </select>
                                        </div>
                                        <div class="bg-white p-3 rounded-2xl border border-slate-200 shadow-sm">
                                            <label class="form-label font-bold text-slate-700 text-sm mb-3 block">
                                                <i class="bi bi-box-seam me-1 text-blue-500"></i> សម្ភារៈបន្ទប់
                                            </label>

                                            <div class="grid grid-cols-2 gap-2">
                                                <label class="relative cursor-pointer group">
                                                    <input type="checkbox" name="accessories[]" value="AC"
                                                        class="peer sr-only">
                                                    <div
                                                        class="flex items-center px-3 py-2 border border-slate-200 rounded-xl text-[13px] font-medium text-slate-600 bg-white transition-all peer-checked:bg-blue-50 peer-checked:text-blue-700 peer-checked:border-blue-500 hover:border-blue-300 shadow-sm">
                                                        <span
                                                            class="me-2 text-blue-500 transition-transform group-hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M19 19H5V5h14M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2m-8 12h2v2h-2m-4-2h10V7H7m2 2h6v2H9z" />
                                                            </svg>
                                                        </span>
                                                        ម៉ាស៊ីនត្រជាក់
                                                    </div>
                                                </label>

                                                <label class="relative cursor-pointer group">
                                                    <input type="checkbox" name="accessories[]" value="Fridge"
                                                        class="peer sr-only">
                                                    <div
                                                        class="flex items-center px-3 py-2 border border-slate-200 rounded-xl text-[13px] font-medium text-slate-600 bg-white transition-all peer-checked:bg-blue-50 peer-checked:text-blue-700 peer-checked:border-blue-500 hover:border-blue-300 shadow-sm">
                                                        <span
                                                            class="me-2 text-blue-500 transition-transform group-hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M7 2h10a2 2 0 0 1 2 2v16a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2m0 2v7h10V4zm0 9v7h10v-7zm1 1v3h2v-3zm0-5v2h2V9z" />
                                                            </svg>
                                                        </span>
                                                        ទូរទឹកកក
                                                    </div>
                                                </label>

                                                <label class="relative cursor-pointer group">
                                                    <input type="checkbox" name="accessories[]" value="WiFi"
                                                        class="peer sr-only">
                                                    <div
                                                        class="flex items-center px-3 py-2 border border-slate-200 rounded-xl text-[13px] font-medium text-slate-600 bg-white transition-all peer-checked:bg-blue-50 peer-checked:text-blue-700 peer-checked:border-blue-500 hover:border-blue-300 shadow-sm">
                                                        <span
                                                            class="me-2 text-blue-500 transition-transform group-hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M12 21.05L4.44 13.5c1.45-1.45 3.32-2.18 5.19-2.2c1.87-.03 3.75.64 5.2 2.05l2.73-2.73c-2.14-2.15-4.97-3.26-7.8-3.32c-2.84-.07-5.69.94-7.87 3.05L1.44 10.5C4.36 7.58 8.18 6.13 12 6.13c3.82 0 7.64 1.45 10.56 4.37l-2.45 2.45c-2.22-2.22-5.13-3.35-8.11-3.39c-2.99-.04-6 1.05-8.31 3.25L12 21.05Z" />
                                                            </svg>
                                                        </span>
                                                        វ៉ាយហ្វាយ
                                                    </div>
                                                </label>

                                                <label class="relative cursor-pointer group">
                                                    <input type="checkbox" name="accessories[]" value="TV"
                                                        class="peer sr-only">
                                                    <div
                                                        class="flex items-center px-3 py-2 border border-slate-200 rounded-xl text-[13px] font-medium text-slate-600 bg-white transition-all peer-checked:bg-blue-50 peer-checked:text-blue-700 peer-checked:border-blue-500 hover:border-blue-300 shadow-sm">
                                                        <span
                                                            class="me-2 text-blue-500 transition-transform group-hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M21 3H3c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h5v2h8v-2h5c1.1 0 1.99-.9 1.99-2L23 5c0-1.1-.9-2-2-2m0 14H3V5h18z" />
                                                            </svg>
                                                        </span>
                                                        ទូរទស្សន៍
                                                    </div>
                                                </label>

                                                <label class="relative cursor-pointer group">
                                                    <input type="checkbox" name="accessories[]" value="WaterHeater"
                                                        class="peer sr-only">
                                                    <div
                                                        class="flex items-center px-3 py-2 border border-slate-200 rounded-xl text-[13px] font-medium text-slate-600 bg-white transition-all peer-checked:bg-blue-50 peer-checked:text-blue-700 peer-checked:border-blue-500 hover:border-blue-300 shadow-sm">
                                                        <span
                                                            class="me-2 text-blue-500 transition-transform group-hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M13 3h-2c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h2c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 16h-2V5h2zM7 7h1v2H7zm0 4h1v2H7zm0 4h1v2H7zm10-8h-1v2h1zm0 4h-1v2h1zm0 4h-1v2h1z" />
                                                            </svg>
                                                        </span>
                                                        ទឹកក្តៅ
                                                    </div>
                                                </label>

                                                <label class="relative cursor-pointer group">
                                                    <input type="checkbox" name="accessories[]" value="ExtraBed"
                                                        class="peer sr-only">
                                                    <div
                                                        class="flex items-center px-3 py-2 border border-slate-200 rounded-xl text-[13px] font-medium text-slate-600 bg-white transition-all peer-checked:bg-blue-50 peer-checked:text-blue-700 peer-checked:border-blue-500 hover:border-blue-300 shadow-sm">
                                                        <span
                                                            class="me-2 text-blue-500 transition-transform group-hover:scale-110">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                                viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M19 7h-8v7H3V5H1v15h2v-3h18v3h2v-9a4 4 0 0 0-4-4m-2 5h-4V9h4z" />
                                                            </svg>
                                                        </span>
                                                        គ្រែបន្ថែម
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
                                            <label
                                                class="form-label font-medium text-slate-700 text-sm">រូបភាពបន្ទប់</label>
                                            <div
                                                class="mt-1 flex justify-center px-4 py-4 border-2 border-slate-300 border-dashed rounded-xl hover:border-blue-400 transition-colors">
                                                <div class="space-y-1 text-center">
                                                    <svg class="mx-auto h-8 w-8 text-slate-400" stroke="currentColor"
                                                        fill="none" viewBox="0 0 48 48">
                                                        <path
                                                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                            stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <div class="flex text-sm text-slate-600">
                                                        <label
                                                            class="relative cursor-pointer bg-white rounded-md font-semibold text-blue-600 hover:text-blue-500 focus-within:outline-none">
                                                            <span>បញ្ចូលរូបភាព</span>
                                                            <input type="file" name="images" class="sr-only" multiple>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer bg-white border-t border-slate-100 p-2 gap-3">
                            <button type="button"
                                class="px-5 py-2.5 text-slate-500 font-medium hover:text-slate-800 transition-colors"
                                data-bs-dismiss="modal">បោះបង់</button>
                            <button type="submit"
                                class="px-8 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-blue-200 transition-all transform active:scale-95">
                                រក្សាទុកទិន្នន័យ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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

                <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                    class="inline-flex items-center gap-3 bg-[#121826] text-white px-3 py-3 rounded-2xl text-base font-medium hover:bg-black hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                    <span class="material-symbols-outlined text-[24px]">add_circle</span>
                    បន្ថែមបន្ទប់ថ្មី
                </button>
            </div>

            <div class="premium-card rounded-3xl mb-10 flex flex-col md:flex-row gap-4 items-center bg-white">
                <form action="" method="GET" class="relative flex-1 w-full">
                    <span
                        class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 text-[24px]">search</span>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="ស្វែងរកលេខបន្ទប់ ឬការបរិយាយ..."
                        class="w-full pl-14 pr-6 py-3 bg-transparent border-none text-lg focus:ring-0 outline-none font-light">
                </form>

                <div class="flex items-center gap-3 pr-3">
                    <select
                        class="bg-gray-50 border-none text-base text-gray-700 rounded-2xl px-8 py-2 outline-none font-medium cursor-pointer">
                        <option>គ្រប់ជាន់</option>
                        <option>ជាន់ទី ១</option>
                        <option>ជាន់ទី ២</option>
                    </select>
                </div>
            </div>
            @if(session('message'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" {{-- 2000ms=2 seconds
                    --}} x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="mb-4 p-4 bg-green-100 text-green-700 rounded-2xl border border-green-200 shadow-sm flex items-center">

                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ session('message') }}
                </div>
            @endif

            <div class="premium-card rounded-[2.5rem] overflow-hidden bg-white border-none shadow-xl">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-gray-50/50 border-b border-gray-100/80">
                            <th class="px-10 py-7 text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">ព័ត៌មានបន្ទប់
                            </th>
                            <th class="px-10 py-7 text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">តម្លៃប្រចាំខែ
                            </th>
                            <th class="px-10 py-7 text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">
                                ស្ថានភាពបច្ចុប្បន្ន</th>
                            <th class="px-10 py-7 text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">បរិយាយ</th>
                            <th class="px-10 py-7 text-xs font-bold text-gray-400 uppercase tracking-[0.2em] text-right">
                                សកម្មភាព</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @forelse($fakeRooms as $room)
                            <tr class="hover:bg-blue-50/30 transition-all duration-300 group row-fade-in">
                                <td class="px-8 py-6">
                                    <div class="flex flex-col gap-1">
                                        <span class="text-xl font-bold text-gray-900 italic">Room {{ $room->roomNumber }}</span>
                                        <span class="text-sm text-gray-500 font-medium">ជាន់ទី {{ $room->floor }}</span>
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    <div class="text-xl font-bold text-[#121826] font-sans">
                                        ${{ number_format($room->price, 2) }}
                                    </div>
                                </td>
                                <td class="px-8 py-6">
                                    @if($room->status === 'available')
                                        <span
                                            class="inline-flex items-center gap-2.5 px-5 py-2 rounded-xl text-sm font-bold bg-green-100/50 text-green-600 border border-green-200/30">
                                            <span class="size-2 bg-green-500 rounded-full"></span> ទំនេរ
                                        </span>
                                    @elseif($room->status === 'occupied')
                                        <span
                                            class="inline-flex items-center gap-2.5 px-5 py-2 rounded-xl text-sm font-bold bg-red-100/50 text-red-500 border border-red-200/30">
                                            <span class="size-2 bg-red-500 rounded-full"></span> មានអ្នកជួល
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-2.5 px-5 py-2 rounded-xl text-sm font-bold bg-amber-100/50 text-amber-600 border border-amber-200/30">
                                            <span class="size-2 bg-amber-500 rounded-full"></span> ជួសជុល
                                        </span>
                                    @endif
                                </td>
                                <td class="px-8 py-6 text-base text-gray-400 font-light max-w-[300px] truncate">
                                    {{ $room->description }}
                                </td>
                                <td class="px-8 py-6 text-right">
                                    <div
                                        class="flex justify-end gap-4 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <button
                                            class="size-12 flex items-center justify-center bg-white text-blue-600 rounded-2xl shadow-sm border border-gray-100 hover:bg-blue-600 hover:text-white transition-all">
                                            <span class="material-symbols-outlined text-[22px]">edit</span>
                                        </button>
                                        <button
                                            class="size-12 flex items-center justify-center bg-white text-red-500 rounded-2xl shadow-sm border border-gray-100 hover:bg-red-500 hover:text-white transition-all">
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