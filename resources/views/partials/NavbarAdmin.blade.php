<header class="h-20 bg-white dark:bg-[#1a2e2c] border-b border-[#dce5e4] dark:border-[#2a4542] p-5 flex items-center justify-between sticky top-0 z-10">
    <div class="flex items-center gap-4">
        <nav class="flex items-center gap-2 text-sm">
            <a class="text-[#658683] hover:text-primary" href="#">ទំព័រដើម</a>
            <span class="text-[#658683] text-xs">/</span>
            <span class="text-[#121717] dark:text-white font-semibold">@yield('page-title', 'Page')</span>
        </nav>
    </div>
    <div class="flex items-center gap-6">
        <div class="relative">
            <h3>សួស្តី, អ្នកគ្រប់គ្រង់</h3>
        </div>
        <button
            class="relative size-11 flex items-center justify-center bg-background-light dark:bg-[#233d3a] rounded-xl text-[#121717] dark:text-white">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-3 right-3 size-2 bg-red-500 rounded-full border-2 border-white dark:border-[#233d3a]"></span>
        </button>
    </div>
</header>
