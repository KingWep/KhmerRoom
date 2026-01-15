@extends('layouts.LayoutsAdmin')

@section('title', 'ផ្ទះជួលខ្មែរ - ទំព័រដើម')

@section('content')
<!-- Main Content -->
    <main class="flex-1 overflow-y-auto flex flex-col min-h-screen">
        <div class="p-8 max-w-[1440px] mx-auto w-full">
            <div class="mb-8">
                <h2 class="text-3xl font-black text-[#121717] dark:text-white tracking-tight mb-2">បញ្ជីអ្នកជួល
                    (Tenant List)</h2>
                <p class="text-[#658683] dark:text-gray-400">គ្រប់គ្រង និងតាមដានព័ត៌មានរបស់អ្នកជួលទាំងអស់ក្នុងប្រព័ន្ធ</p>
            </div>

            <!-- Stats Overview -->
            <div class="grid grid-cols-4 gap-6 mb-8">
                <div
                    class="bg-white dark:bg-[#1a2e2c] p-6 rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div class="size-12 rounded-xl bg-primary/10 flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">groups</span>
                        </div>
                        <span class="text-xs font-bold text-green-500 bg-green-500/10 px-2 py-1 rounded-full">+12%</span>
                    </div>
                    <p class="text-[#658683] text-sm mb-1">អ្នកជួលសរុប</p>
                    <p class="text-2xl font-black dark:text-white">1,284</p>
                </div>
                <div
                    class="bg-white dark:bg-[#1a2e2c] p-6 rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="size-12 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-500">
                            <span class="material-symbols-outlined">how_to_reg</span>
                        </div>
                        <span class="text-xs font-bold text-blue-500 bg-blue-500/10 px-2 py-1 rounded-full">សកម្ម</span>
                    </div>
                    <p class="text-[#658683] text-sm mb-1">អ្នកជួលសកម្ម</p>
                    <p class="text-2xl font-black dark:text-white">1,120</p>
                </div>
                <div
                    class="bg-white dark:bg-[#1a2e2c] p-6 rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="size-12 rounded-xl bg-orange-500/10 flex items-center justify-center text-orange-500">
                            <span class="material-symbols-outlined">person_off</span>
                        </div>
                        <span class="text-xs font-bold text-orange-500 bg-orange-500/10 px-2 py-1 rounded-full">អតីត</span>
                    </div>
                    <p class="text-[#658683] text-sm mb-1">អ្នកជួលចាកចេញ</p>
                    <p class="text-2xl font-black dark:text-white">164</p>
                </div>
                <div
                    class="bg-white dark:bg-[#1a2e2c] p-6 rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm">
                    <div class="flex items-center justify-between mb-4">
                        <div
                            class="size-12 rounded-xl bg-purple-500/10 flex items-center justify-center text-purple-500">
                            <span class="material-symbols-outlined">pending_actions</span>
                        </div>
                        <span class="text-xs font-bold text-red-500 bg-red-500/10 px-2 py-1 rounded-full">ជិតដល់ថ្ងៃ</span>
                    </div>
                    <p class="text-[#658683] text-sm mb-1">កិច្ចសន្យាជិតផុតកំណត់</p>
                    <p class="text-2xl font-black dark:text-white">42</p>
                </div>
            </div>

            <!-- Table Container -->
            <div
                class="bg-white dark:bg-[#1a2e2c] rounded-2xl border border-[#dce5e4] dark:border-[#2a4542] shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="bg-background-light dark:bg-[#233d3a] border-b border-[#dce5e4] dark:border-[#2a4542]">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683]">
                                    ឈ្មោះអ្នកជួល (Tenant)</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683]">
                                    ព័ត៌មានទំនាក់ទំនង (Contact)</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683]">
                                    លេខបន្ទប់ (Room)</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683]">
                                    ថ្ងៃចូលស្នាក់នៅ (Move-in)</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683]">
                                    ស្ថានភាព (Status)</th>
                                <th
                                    class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-[#658683] text-right">
                                    សកម្មភាព (Actions)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#dce5e4] dark:divide-[#2a4542]">
                            <!-- Tenant rows remain the same as your original code -->
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div
                    class="px-6 py-4 flex items-center justify-between border-t border-[#dce5e4] dark:border-[#2a4542]">
                    <p class="text-sm text-[#658683]">បង្ហាញពី ១ ដល់ ៤ នៃ ១,២៨៤ នាក់</p>
                    <div class="flex items-center gap-2">
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors">
                            <span class="material-symbols-outlined">chevron_left</span>
                        </button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg bg-primary text-white font-bold text-sm">1</button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors font-medium text-sm">2</button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors font-medium text-sm">3</button>
                        <span class="px-1 text-[#658683]">...</span>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors font-medium text-sm">12</button>
                        <button
                            class="size-9 flex items-center justify-center rounded-lg border border-[#dce5e4] dark:border-[#2a4542] hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors">
                            <span class="material-symbols-outlined">chevron_right</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection    