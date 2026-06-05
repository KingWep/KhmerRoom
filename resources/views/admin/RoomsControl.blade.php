@extends('layouts.LayoutsAdmin')

@section('title', 'គ្រប់គ្រងបន្ទប់ - Khmer Rental')

@section('content')

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Noto+Sans+Khmer:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <main class="flex-1 overflow-y-auto flex flex-col min-h-screen bg-[#F8F9FB]">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-2xl rounded-xl overflow-hidden">
                    <div class=" bg-blue-500 px-5 py-3 flex justify-between items-center">
                        <h5 id="modalTitle" class="text-white font-bold text-xl mb-0 flex items-center gap-2">
                            បន្ថែមបន្ទប់ថ្មី
                        </h5>

                        <button  data-bs-dismiss="modal" type="button" class="text-white/80 hover:text-white transition-colors"
                            onclick="closeModal()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 font-bold" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <form id="roomForm" action="{{ route('admin.rooms.create') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" id="formMethod" value="POST">
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
                                                <input type="number" min="0" max="4" name="floor"
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
                                            
                                            <!-- Image Preview Container -->
                                            <div id="imagePreviewContainer" class="hidden mb-3">
                                                <div class="relative rounded-xl overflow-hidden border-2 border-blue-400 shadow-md">
                                                    <img id="imagePreview" src="" alt="Preview" class="w-full h-48 object-cover">
                                                    <button type="button" onclick="clearImagePreview()"
                                                        class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-2 shadow-lg transition-all">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <!-- File Upload Area -->
                                            <div id="uploadArea"
                                                class="mt-1 flex justify-center px-4 py-4 border-2 border-slate-300 border-dashed rounded-xl hover:border-blue-400 transition-colors cursor-pointer">
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
                                                            <input type="file" id="roomImageInput" name="images" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                                        </label>
                                                    </div>
                                                    <p class="text-xs text-slate-500">PNG, JPG, JPEG up to 10MB</p>
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
                            <button id="submitBtn" type="submit"
                                class="px-8 py-2.5 bg-blue-500 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-xl shadow-lg shadow-blue-200 transition-all transform active:scale-95">
                                រក្សាទុកទិន្នន័យ
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="w-full">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-8 mb-3">
                <div class="space-y-2">
                    <div class="flex items-center gap-3 text-primary/60 mb-1">
                        <span class="text-xs uppercase tracking-[0.3em] font-bold text-blue-600">Workspace</span>
                        <span class="size-1.5 rounded-full bg-blue-200"></span>
                        <span class="text-xs uppercase tracking-[0.3em] font-bold">Property Units</span>
                    </div>
                    <h2 class="text-2xl font-semibold text-[#121826] tracking-tight">គ្រប់គ្រងបន្ទប់</h2>
                    <p class="text-lg text-gray-500 font-light">ទិន្នន័យសាកល្បង (Local Mock Data)</p>
                </div>
                <button data-bs-toggle="modal" data-bs-target="#exampleModal"
                    class="inline-flex items-center gap-3 bg-[#121826] text-white px-3 py-2 rounded-xl text-base font-medium hover:bg-black hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                    <span class="material-symbols-outlined text-[18px]">add_circle</span>
                    បន្ថែមបន្ទប់ថ្មី
                </button>
            </div>
            {{-- <div class="premium-card rounded-3xl mb-10 flex flex-col md:flex-row gap-4 items-center bg-white"> --}}
                <form action="{{ request()->url() }}" method="GET"
                    class="premium-card rounded-3xl mb-10 flex flex-col md:flex-row gap-4 items-center bg-white shadow-sm border border-gray-100">
                    <div class="relative flex-1 w-full">
                        <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-gray-400 text-[18px]">search</span>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="ស្វែងរកលេខបន្ទប់ ឬការបរិយាយ..." oninput="debounceSearch(this)"
                            class="w-full pl-14 pr-6 py-3 bg-transparent border-none text-lg focus:ring-0 outline-none font-light">
                    </div>

                    <div class="flex items-center gap-2 pr-3">
                        <select name="floor" onchange="this.form.submit()"
                            class="bg-gray-50 text-base text-gray-700 rounded-2xl px-4 py-2 outline-none font-medium cursor-pointer border border-slate-100">
                            <option value="">គ្រប់ជាន់ (All)</option>
                            <option value="1" {{ request('floor') == '1' ? 'selected' : '' }}>ជាន់ទី ១</option>
                            <option value="2" {{ request('floor') == '2' ? 'selected' : '' }}>ជាន់ទី ២</option>
                            <option value="3" {{ request('floor') == '3' ? 'selected' : '' }}>ជាន់ទី ៣</option>
                            <option value="4" {{ request('floor') == '4' ? 'selected' : '' }}>ជាន់ទី 4</option>
                        </select>

                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-2xl font-medium shadow-sm hover:bg-blue-700">
                            Search
                        </button>
                    </div>
                </form>
                {{--
            </div> --}}
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
            <div class="overflow-hidden bg-white border border-gray-100 shadow-sm rounded-xl relative">
                <div class="relative">

                    <div id="roomsTableWrapper" class="overflow-x-auto">
                        <table class="min-w-[900px] w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-blue-500 ">
                                <th class="px-4 py-3 text-md font-bold tracking-wider text-white uppercase">ព័ត៌មានបន្ទប់
                                </th>
                                <th class="px-4 py-3 text-md font-bold tracking-wider text-white uppercase">តម្លៃប្រចាំខែ
                                </th>
                                <th class="px-4 py-3 text-md font-bold tracking-wider text-white uppercase">
                                    ស្ថានភាព</th>
                                <th class="px-4 py-3 text-md font-bold tracking-wider text-white uppercase">បរិយាយ
                                </th>
                                <th class="px-4 py-3 text-ms font-bold tracking-wider text-right text-white uppercase">
                                    សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($rooms as $room)
                                <tr class="transition-colors hover:bg-gray-50/50">
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-4">
                                            <div class="w-14 h-14 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                                @if($room->images)
                                                    <img src="{{ $room->images }}" alt="Room {{ $room->room_number }}" class="w-full h-full object-cover">
                                                @else
                                                    <div class="w-full h-full flex items-center justify-center text-gray-400">No Image</div>
                                                @endif
                                            </div>
                                            <div class="min-w-0">
                                                <p class="text-base font-bold text-gray-900 truncate">Room {{ $room->room_number }} <span class="text-sm text-gray-500">· Floor {{ $room->floor }}</span></p>
                                                <div class="mt-2 flex flex-wrap gap-1">
                                                    @if($room->accessories)
                                                        @foreach($room->accessories as $acc)
                                                            <span class="text-xs bg-slate-100 text-slate-700 px-2 py-0.5 rounded-full border border-slate-200">{{ $acc }}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3">
                                        <span class="text-lg font-bold text-gray-900">
                                            ${{ number_format($room->price, 2) }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3">
                                        @php
                                            $statusClasses = [
                                                'available' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                                                'occupied' => 'bg-rose-50 text-rose-700 border-rose-100',
                                                'maintenance' => 'bg-amber-50 text-amber-700 border-amber-100'
                                            ];
                                            $statusLabels = [
                                                'available' => 'ទំនេរ',
                                                'occupied' => 'មិនទំនេរ',
                                                'maintenance' => 'ជួសជុល'
                                            ];
                                            $currentClass = $statusClasses[$room->status] ?? 'bg-gray-50 text-gray-600';
                                        @endphp
                                        <span
                                            class="inline-flex items-center px-4 text-center py-1 text-sm font-semibold border rounded-lg {{ $currentClass }}">
                                            {{ $statusLabels[$room->status] ?? $room->status }}
                                        </span>
                                    </td>

                                    <td class="px-4 py-3">
                                        <p class="text-sm text-gray-600 max-w-[200px] line-clamp-2">
                                            {{ $room->description ?: 'No description provided' }}
                                        </p>
                                    </td>

                                    <td class="px-4 py-3">
                                        <div class="flex justify-end gap-2">
                                            <button type="button" class="inline-flex items-center gap-2 px-3 py-2 bg-yellow-50 text-yellow-700 rounded-lg font-semibold btn-edit-room"
                                                data-id="{{ $room->id }}" data-room_number="{{ $room->room_number }}"
                                                data-floor="{{ $room->floor }}" data-price="{{ $room->price }}"
                                                data-size="{{ $room->size }}" data-status="{{ $room->status }}"
                                                data-description="{{ $room->description }}"
                                                data-accessories='@json($room->accessories)'>
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </button>
                                            <form action="{{ route('admin.rooms.delete', $room->id) }}" method="POST"
                                                class="delete-form inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="inline-flex items-center gap-2 px-3 py-2 bg-red-50 text-red-600 rounded-lg font-semibold delete-btn">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-12 text-center text-gray-400">
                                        រកមិនឃើញទិន្នន័យ...
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </div>

                </div>

                {{-- Pagination --}}
                @if($rooms->hasPages())
                <div class="px-6 py-4 flex flex-col md:flex-row items-center justify-between gap-4 border-t border-gray-100 bg-white">
                    <div class="text-sm text-slate-600">
                        បង្ហាញ <span class="font-bold text-slate-900">{{ $rooms->firstItem() ?? 0 }}</span>
                        - <span class="font-bold text-slate-900">{{ $rooms->lastItem() ?? 0 }}</span>
                        នៃ <span class="font-bold text-slate-900">{{ $rooms->total() }}</span> បន្ទប់
                    </div>

                    <div class="flex items-center gap-2">
                        @if ($rooms->onFirstPage())
                            <button disabled class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white text-slate-300 cursor-not-allowed">
                                <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                            </button>
                        @else
                            <a href="{{ $rooms->appends(['search' => request('search'), 'floor' => request('floor')])->previousPageUrl() }}" class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white text-slate-500 hover:border-primary hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[18px]">chevron_left</span>
                            </a>
                        @endif

                        @foreach ($rooms->getUrlRange(1, $rooms->lastPage()) as $page => $url)
                            @if ($page == $rooms->currentPage())
                                <button class="flex items-center justify-center size-9 rounded-lg border border-primary bg-primary text-white font-bold text-sm">{{ $page }}</button>
                            @else
                                <a href="{{ $url }}" class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white text-slate-700 hover:border-primary hover:text-primary transition-colors text-sm">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($rooms->hasMorePages())
                            <a href="{{ $rooms->appends(['search' => request('search'), 'floor' => request('floor')])->nextPageUrl() }}" class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white text-slate-500 hover:border-primary hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                            </a>
                        @else
                            <button disabled class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white text-slate-300 cursor-not-allowed">
                                <span class="material-symbols-outlined text-[18px]">chevron_right</span>
                            </button>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Image Preview Functions
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                // Validate file size (10MB max)
                if (file.size > 10 * 1024 * 1024) {
                    Swal.fire({
                        icon: 'error',
                        title: 'ឯកសារធំពេក!',
                        text: 'សូមជ្រើសរើសរូបភាពតូចជាង 10MB',
                        confirmButtonText: 'យល់ព្រម'
                    });
                    event.target.value = '';
                    return;
                }
                
                // Validate file type
                if (!file.type.startsWith('image/')) {
                    Swal.fire({
                        icon: 'error',
                        title: 'ប្រភេទឯកសារមិនត្រឹមត្រូវ!',
                        text: 'សូមជ្រើសរើសរូបភាពប៉ុណ្ណោះ (PNG, JPG, JPEG)',
                        confirmButtonText: 'យល់ព្រម'
                    });
                    event.target.value = '';
                    return;
                }
                
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                    document.getElementById('imagePreviewContainer').classList.remove('hidden');
                    document.getElementById('uploadArea').classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        }
        
        function clearImagePreview() {
            document.getElementById('roomImageInput').value = '';
            document.getElementById('imagePreview').src = '';
            document.getElementById('imagePreviewContainer').classList.add('hidden');
            document.getElementById('uploadArea').classList.remove('hidden');
        }
        
        // Debounce search input
        let timeout = null;
        function debounceSearch(input) {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                if (input.form) input.form.submit();
            }, 500);
        }
        // Open edit modal
        $(document).on('click', '.btn-edit-room', function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            // Set form action and method
            $('#roomForm').attr('action', `/admin/rooms/${id}`);
            $('#formMethod').val('PATCH');
            // Set modal title & submit button
            $('#modalTitle').html('កែប្រែបន្ទប់');
            $('#submitBtn').text('កែប្រែ');
            // Fill inputs
            $('input[name="room_number"]').val($(this).data('room_number'));
            $('input[name="floor"]').val($(this).data('floor'));
            $('input[name="price"]').val($(this).data('price'));
            $('input[name="size"]').val($(this).data('size'));
            $('select[name="status"]').val($(this).data('status'));
            $('textarea[name="description"]').val($(this).data('description'));
            // Fill checkboxes
            let accessories = $(this).data('accessories') || [];
            $('input[name="accessories[]"]').prop('checked', false);
            accessories.forEach(item => {
                $(`input[name="accessories[]"][value="${item}"]`).prop('checked', true);
            });
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('exampleModal'));
            modal.show();
        });
        // Reset modal on close
        $(document).ready(function () {
            $('#exampleModal').on('hidden.bs.modal', function () {
                // Reset form
                $('#roomForm')[0].reset();
                $('#roomForm select').prop('selectedIndex', 0);
                $('input[name="accessories[]"]').prop('checked', false);
                // Reset action & method
                $('#roomForm').attr('action', "{{ route('admin.rooms.create') }}");
                $('#formMethod').val('POST');
                // Reset title & submit button
                $('#modalTitle').html('បន្ថែមបន្ទប់ថ្មី');
                $('#submitBtn').text('រក្សាទុកទិន្នន័យ');
                // Clear image preview
                clearImagePreview();
            });
        });
        // Delete button with SweetAlert2
        $(document).on('click', '.delete-btn', function (e) {
            e.preventDefault();
            const form = $(this).closest('.delete-form');
            Swal.fire({
                title: 'តើអ្នកប្រាកដទេ?',
                text: "ទិន្នន័យនេះនឹងត្រូវលុបជាអចិន្ត្រៃយ៍!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'បាទ/ចាស លុបវា!',
                cancelButtonText: 'បោះបង់',
                reverseButtons: true,
                showClass: { popup: 'animate__animated animate__fadeInDown' },
                hideClass: { popup: 'animate__animated animate__fadeOutUp' }
            }).then((result) => {
                if (result.isConfirmed) form.submit();
            });
        });
    </script>
@endpush