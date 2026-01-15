@extends('layouts.LayoutsUser')
@section('title','ផ្ទះជួលខ្មែរ - ទំនាក់ទំនង')
@section('content')
    <!-- Main Content -->
    <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Heading & Intro -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-slate-900 mb-2">បញ្ជីបន្ទប់ជួល</h2>
            <p class="text-slate-500 max-w-2xl text-base">
                សូមពិនិត្យមើលស្ថានភាពបន្ទប់ និងតម្លៃជួលប្រចាំខែនៅខាងក្រោម។ លោកអ្នកអាចប្រើប្រាស់ Filter
                ដើម្បីស្វែងរកបន្ទប់តាមជាន់ ឬតាមស្ថានភាពជាក់ស្តែង។
            </p>
        </div>
        <!-- Filters Section -->
        <div
            class="bg-white  rounded-xl p-4 shadow-sm border border-slate-200 mb-8">
            <div class="flex flex-col md:flex-row gap-4 items-start md:items-end justify-between">
                <!-- Filter Groups -->
                <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                    <!-- Floor Filter -->
                    <div class="flex flex-col gap-1.5 w-full sm:w-48">
                        <label
                            class="text-xs font-semibold uppercase tracking-wide text-slate-500  ml-1">ជាន់
                            (Floor)</label>
                        <div class="relative">
                            <select
                                class="w-full pl-3 pr-10 py-2.5 bg-slate-50  border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary appearance-none cursor-pointer text-slate-700  font-medium">
                                <option>ទាំងអស់ (All Floors)</option>
                                <option>ជាន់ទី ១ (1st Floor)</option>
                                <option>ជាន់ទី ២ (2nd Floor)</option>
                                <option>ជាន់ទី ៣ (3rd Floor)</option>
                                <option>ជាន់ទី ៤ (4th Floor)</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-[20px]">keyboard_arrow_down</span>
                        </div>
                    </div>
                    <!-- Status Filter -->
                    <div class="flex flex-col gap-1.5 w-full sm:w-48">
                        <label
                            class="text-xs font-semibold uppercase tracking-wide text-slate-500  ml-1">ស្ថានភាព
                            (Status)</label>
                        <div class="relative">
                            <select
                                class="w-full pl-3 pr-10 py-2.5 bg-slate-50  border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary appearance-none cursor-pointer text-slate-700  font-medium">
                                <option>ទាំងអស់ (All Status)</option>
                                <option>ទំនេរ (Available)</option>
                                <option>ជួលរួច (Rented)</option>
                            </select>
                            <span
                                class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none text-[20px]">keyboard_arrow_down</span>
                        </div>
                    </div>
                </div>
                <!-- Search/Summary -->
                <div class="w-full md:w-auto flex items-center justify-between md:justify-end gap-3">
                    <div class="hidden md:block text-sm text-slate-500  font-medium text-right">
                        បង្ហាញ <span class="text-slate-900 font-bold">12</span> បន្ទប់
                    </div>
                    <div class="relative w-full md:w-64">
                        <input
                            class="w-full pl-10 pr-4 py-2.5 bg-slate-50  border border-slate-200 rounded-lg text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary text-slate-700  placeholder:text-slate-400"
                            placeholder="ស្វែងរកលេខបន្ទប់..." type="text" />
                        <span
                            class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-[20px]">search</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Room Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-10">
            <!-- Card 1: Available -->
            <div
                class="group bg-white  rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md hover:border-primary/50 transition-all duration-300 flex flex-col">
                <div class="relative h-40 bg-slate-100  overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                        data-alt="Bright modern apartment room interior"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD5FMlLAk8Lav46ONIB9gWVRfxNvLKxc53oMYuDPrd8BV-12opOj407oFLwsYdMtLBUd03uABPBd4khdViuzmRuuFpiXqNHfcQheBFD6UZvmCXhumIx8A3OIDkEjnYXkRaVxDTJcsbtWY7LCzQqrBq8Hq9cN0PiIgXLwWjaKFwQCNyxFvaU9aIXThPGLeHV3IHhGp2TQusIFfTD1sEUd9vWGOSP5cUUPPyK4LJL7z81Q8ggHGwDi0BhVtcr_cpsZVMJMRNrzS2Ap0k");'>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200 /30 ">
                            <span class="size-1.5 rounded-full bg-green-600 "></span>
                            ទំនេរ
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/60 to-transparent">
                    </div>
                    <div class="absolute bottom-3 left-4 text-white font-display text-2xl font-bold tracking-tight">
                        បន្ទប់ 101
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-3 flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                តម្លៃជួល</p>
                            <p class="text-primary text-xl font-bold font-display">$80 <span
                                    class="text-sm text-slate-500  font-normal">/ ខែ</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                ជាន់ទី</p>
                            <p class="text-slate-700  font-bold">1</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-3 border-t border-slate-100 flex gap-2">
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">bed</span>
                            <span>1 គ្រែ</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">wc</span>
                            <span>បន្ទប់ទឹកក្នុង</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">ac_unit</span>
                            <span>ម៉ាស៊ីនត្រជាក់</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 2: Rented -->
            <div
                class="group bg-white  rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col opacity-90 hover:opacity-100">
                <div class="relative h-40 bg-slate-100  overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center grayscale-[50%] group-hover:grayscale-0 transition-all duration-500"
                        data-alt="Cozy apartment bedroom with soft lighting"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDghItKxsMC59gRZyW7wWODQDQdeCPMEU-00SIYP5uVng_kARKV8-N09QVjexcgN3i6WuUQEj_vbLzlkxgfNlf4SRPiHc6i89t0r2r76JmuHrnfscHOCB61h-Vfr3YPHkq24Jp3Ta-cMB0ZW17fedN474jwSR44wuFxv9nUKVr-7e_evZi5zxXlQL4q6LajS8EVdLW_tiVCcT7wWqxPrPFs8V2DhD8C53Q8BD3IVMyRwiMKdMqUARYbkfWeUHhC4YHAKsxQ5KjpzPA");'>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200 0 ark:border-red-800">
                            <span class="size-1.5 rounded-full bg-red-600 </span>
                            ជួលរួច
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/60 to-transparent">
                    </div>
                    <div class="absolute bottom-3 left-4 text-white font-display text-2xl font-bold tracking-tight">
                        បន្ទប់ 102
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-3 flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                តម្លៃជួល</p>
                            <p class="text-slate-700  text-xl font-bold font-display">$80 <span
                                    class="text-sm text-slate-500  font-normal">/ ខែ</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                ជាន់ទី</p>
                            <p class="text-slate-700  font-bold">1</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-3 border-t border-slate-100 flex gap-2">
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">bed</span>
                            <span>1 គ្រែ</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">wc</span>
                            <span>បន្ទប់ទឹកក្នុង</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 3: Available -->
            <div
                class="group bg-white  rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md hover:border-primary/50 transition-all duration-300 flex flex-col">
                <div class="relative h-40 bg-slate-100  overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                        data-alt="Clean minimal apartment interior design"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAPdgYqSLW7Ud9q6onJQ0c_NZs6lyF19ABfLecbPG-LeQ5AXJB-nziD_PsqvJ9vWFr8mMBtA_Y8i1z9n2X4cJethPUnlFFBe5nyBFCBckW4BkVc4dLN89WdTuxV1Yq1rP9Rgx0LqCkDfN2qk-iUROjd63Ff3F26XZ86e9enzs58zaE-RlDnnFrf6WepAaExyKeTWZ5AYNQbLZ9BUj-k9BpoxFgLDFmSffFLh1JIs6n6IuziTWWijGliDT_EAWbT2RJQDiAiR8Yo-ws");'>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200 /30 ">
                            <span class="size-1.5 rounded-full bg-green-600 "></span>
                            ទំនេរ
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/60 to-transparent">
                    </div>
                    <div class="absolute bottom-3 left-4 text-white font-display text-2xl font-bold tracking-tight">
                        បន្ទប់ 201
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-3 flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                តម្លៃជួល</p>
                            <p class="text-primary text-xl font-bold font-display">$95 <span
                                    class="text-sm text-slate-500  font-normal">/ ខែ</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                ជាន់ទី</p>
                            <p class="text-slate-700  font-bold">2</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-3 border-t border-slate-100 flex gap-2">
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">balcony</span>
                            <span>រានហាល</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">wifi</span>
                            <span>WiFi</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 4: Rented -->
            <div
                class="group bg-white  rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col opacity-90 hover:opacity-100">
                <div class="relative h-40 bg-slate-100  overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center grayscale-[50%] group-hover:grayscale-0 transition-all duration-500"
                        data-alt="Modern living room with sofa"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDCiLJZfbOCmnNYBiNbnDNLu6D_ncFm6gj6sNwVQmzIkvurBmFK0mCeDh_Mk63fVhVsA4CCjSXKS3VTEROTBYM6s4dKdcMtRAT-35lQEwAQ315aRabp0N5NwhGvcFcSmWG-JMEsjplFpZ8VYO3anedX_cvMOwgUizq10i-JENqK4hjHroRrardyo7ny-zGavO0dIQ27iiPvEXPr_97sooh_isgYTrFF2ZmXXTdvPuUR5tMAPVU5PlD6nAzS2dMMcDiq-la_-I4ezKU");'>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200 0 ark:border-red-800">
                            <span class="size-1.5 rounded-full bg-red-600 </span>
                            ជួលរួច
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/60 to-transparent">
                    </div>
                    <div class="absolute bottom-3 left-4 text-white font-display text-2xl font-bold tracking-tight">
                        បន្ទប់ 202
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-3 flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                តម្លៃជួល</p>
                            <p class="text-slate-700  text-xl font-bold font-display">$90 <span
                                    class="text-sm text-slate-500  font-normal">/ ខែ</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                ជាន់ទី</p>
                            <p class="text-slate-700  font-bold">2</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-3 border-t border-slate-100 flex gap-2">
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">wifi</span>
                            <span>WiFi</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 5: Available -->
            <div
                class="group bg-white  rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md hover:border-primary/50 transition-all duration-300 flex flex-col">
                <div class="relative h-40 bg-slate-100  overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                        data-alt="Small studio apartment room"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAxF4vaTJlzwhE7cTFjSUV-DPdLg0-U9VpZdQWd24Sn37zptypImsHK0BiNjT_uPORm4kj1Ek8ublliHG44aBTAL0PnygccIUaU5mEqSoo0recvVkb6ODGnC2bCd0x9JSt30og3oPwfra4La399-WbHCwztloacOUE25Rog8M2rbdVmaADb7w618qBTddnxSIhplmZf-oNxRjWyB0J4PY0SIH2K0ZfnzIIJfeaC5bP6HayhzSRyanF1zmIV_jRD17GyPl3ITPLtwB0");'>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200 /30 ">
                            <span class="size-1.5 rounded-full bg-green-600 "></span>
                            ទំនេរ
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/60 to-transparent">
                    </div>
                    <div class="absolute bottom-3 left-4 text-white font-display text-2xl font-bold tracking-tight">
                        បន្ទប់ 301
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-3 flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                តម្លៃជួល</p>
                            <p class="text-primary text-xl font-bold font-display">$75 <span
                                    class="text-sm text-slate-500  font-normal">/ ខែ</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                ជាន់ទី</p>
                            <p class="text-slate-700  font-bold">3</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-3 border-t border-slate-100 flex gap-2">
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">stairs</span>
                            <span>ជាន់ខ្ពស់</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 6: Available -->
            <div
                class="group bg-white  rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md hover:border-primary/50 transition-all duration-300 flex flex-col">
                <div class="relative h-40 bg-slate-100  overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                        data-alt="Corner view of apartment"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDinSfKcUV5jF87gpuakYuLDUVDHlWx6_fgnQAmK_PmQM3nQPwKhsNtkK3Ibi7EjY25Hsbk0lD6vRGOKK42BdbA_HrFmXuuU0KoOT88LlwN2I4tqlxZ6x54oWI0XwFgfng0llNXZkfRLRG1Hqdl-QIs4AynK4GbhHljUQePWgtjs2nb-FixO3iI-3zj0ToC6QuJZRQu43_pRq-czuvlOJiASoxb8LO-P0k0ueDh6fVwO4mK2wQLIlcFSoOkZyhH-w9pCuMVOO6hY38");'>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200 /30 ">
                            <span class="size-1.5 rounded-full bg-green-600 "></span>
                            ទំនេរ
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/60 to-transparent">
                    </div>
                    <div class="absolute bottom-3 left-4 text-white font-display text-2xl font-bold tracking-tight">
                        បន្ទប់ 302
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-3 flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                តម្លៃជួល</p>
                            <p class="text-primary text-xl font-bold font-display">$75 <span
                                    class="text-sm text-slate-500  font-normal">/ ខែ</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                ជាន់ទី</p>
                            <p class="text-slate-700  font-bold">3</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-3 border-t border-slate-100 flex gap-2">
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">stairs</span>
                            <span>ជាន់ខ្ពស់</span>
                        </div>
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">local_parking</span>
                            <span>ចំណតម៉ូតូ</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 7: Rented -->
            <div
                class="group bg-white  rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col opacity-90 hover:opacity-100">
                <div class="relative h-40 bg-slate-100  overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center grayscale-[50%] group-hover:grayscale-0 transition-all duration-500"
                        data-alt="Simple bedroom setup"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDhPGPhDNJrqTDw_1-B_AGUP-dRo1FHOiaXSvca4ytYTHKA_rUR0QZTISSbuGdovMdBgEbBt1Eob32zH-6xHyTRRM0uGtEQ52PJsfNVi84fG2NKyJtEnx6qOb_-l0AxY0li7ZLBx8y5TvUefGnWWpP4eZPaVPGhhSndTMTqaWrpS2hFn32TcuGJ-AsvUfhYPmIwVB6Af9OA8tkGm40BLq1cZmxUyaG_LbGImPJwvUeiO_ioIzEajhb5EjHPdZK2C1QHTm-aX_JcsZ8");'>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-red-100 text-red-700 border border-red-200 0 ark:border-red-800">
                            <span class="size-1.5 rounded-full bg-red-600 </span>
                            ជួលរួច
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/60 to-transparent">
                    </div>
                    <div class="absolute bottom-3 left-4 text-white font-display text-2xl font-bold tracking-tight">
                        បន្ទប់ 401
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-3 flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                តម្លៃជួល</p>
                            <p class="text-slate-700  text-xl font-bold font-display">$65 <span
                                    class="text-sm text-slate-500  font-normal">/ ខែ</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                ជាន់ទី</p>
                            <p class="text-slate-700  font-bold">4</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-3 border-t border-slate-100 flex gap-2">
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">wb_sunny</span>
                            <span>មានពន្លឺ</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card 8: Available -->
            <div
                class="group bg-white  rounded-xl overflow-hidden border border-slate-200 shadow-sm hover:shadow-md hover:border-primary/50 transition-all duration-300 flex flex-col">
                <div class="relative h-40 bg-slate-100  overflow-hidden">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover:scale-105"
                        data-alt="Modern interior room"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDd55FfmaiIdKPZ9oaUphN1eCFtxGQFK-Go48AVTYQArtgvya-ee5Q_DYtr0GHtFjZmWKsJ-CwLyUci2b9kBTe-bmy7xDuI3pn-6bJ4FU8QwDTUV8ed54zabLQhrk0CjpFyodHA7jxfog4lK77kYkTUiyUyLnJsM1W9IlhXd0MnZZ6N3jve8sYJbjVpjYAHQsXQ4yrjS_npTSE8oXNpotNjlj_2OVJikLISO-5Yp0peHEPEVBN0rBOcw6MlnliTzjn69TEHrFSfzUo");'>
                    </div>
                    <div class="absolute top-3 right-3">
                        <span
                            class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700 border border-green-200 /30 ">
                            <span class="size-1.5 rounded-full bg-green-600 "></span>
                            ទំនេរ
                        </span>
                    </div>
                    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-black/60 to-transparent">
                    </div>
                    <div class="absolute bottom-3 left-4 text-white font-display text-2xl font-bold tracking-tight">
                        បន្ទប់ 402
                    </div>
                </div>
                <div class="p-4 flex flex-col gap-3 flex-1">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                តម្លៃជួល</p>
                            <p class="text-primary text-xl font-bold font-display">$65 <span
                                    class="text-sm text-slate-500  font-normal">/ ខែ</span></p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-slate-500  font-medium uppercase tracking-wide">
                                ជាន់ទី</p>
                            <p class="text-slate-700  font-bold">4</p>
                        </div>
                    </div>
                    <div class="mt-auto pt-3 border-t border-slate-100 flex gap-2">
                        <div class="flex items-center gap-1.5 text-slate-500  text-xs">
                            <span class="material-symbols-outlined text-[16px]">roofing</span>
                            <span>ដំបូល</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="flex justify-center items-center gap-2 mb-12">
            <button
                class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white  text-slate-500  hover:border-primary hover:text-primary transition-colors disabled:opacity-50"
                disabled="">
                <span class="material-symbols-outlined text-[18px]">chevron_left</span>
            </button>
            <button
                class="flex items-center justify-center size-9 rounded-lg border border-primary bg-primary text-white font-bold text-sm">1</button>
            <button
                class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white  text-slate-700  hover:border-primary hover:text-primary transition-colors text-sm">2</button>
            <button
                class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white  text-slate-700  hover:border-primary hover:text-primary transition-colors text-sm">3</button>
            <button
                class="flex items-center justify-center size-9 rounded-lg border border-slate-200 bg-white  text-slate-500  hover:border-primary hover:text-primary transition-colors">
                <span class="material-symbols-outlined text-[18px]">chevron_right</span>
            </button>
        </div>
    </main>
@endsection