<aside class="w-72 bg-white dark:bg-[#1a2e2c] border-r border-[#dce5e4] dark:border-[#2a4542] flex flex-col shrink-0">
    <div class="p-6 flex flex-col gap-8">
        <div class="flex items-center gap-3">
            <div class="size-10 rounded-xl bg-primary flex items-center justify-center text-white">
                <span class="material-symbols-outlined text-2xl">apartment</span>
            </div>
            <div class="flex flex-col">
                <h1 class="text-[#121717] dark:text-white text-base font-bold leading-tight">Khmer Rental</h1>
                <p class="text-primary text-xs font-semibold uppercase tracking-wider">Admin Portal</p>
            </div>
        </div>
        <nav class="flex flex-col gap-1">
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors group"
                href="{{ route('admin.dashboard') }}">
                <span class="material-symbols-outlined text-[#658683] group-hover:text-primary">dashboard</span>
                <span class="text-[#121717] dark:text-gray-200 text-sm font-medium">ផ្ទាំងគ្រប់គ្រង</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors group"
                href="{{ route('admin.tenants') }}">
                <span class="material-symbols-outlined text-[#658683] group-hover:text-primary">group</span>
                <span class="text-[#121717] dark:text-gray-200 text-sm font-medium">បញ្ជីអ្នកជួល</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors group"
                href="{{ route('admin.rooms') }}">
                <span class="material-symbols-outlined text-[#658683] group-hover:text-primary">meeting_room</span>
                <span class="text-[#121717] dark:text-gray-200 text-sm font-medium">បន្ទប់</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors group"
                href="#">
                <span class="material-symbols-outlined text-[#658683] group-hover:text-primary">payments</span>
                <span class="text-[#121717] dark:text-gray-200 text-sm font-medium">ការបង់ប្រាក់</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors group"
                href="#">
                <span class="material-symbols-outlined text-[#658683] group-hover:text-primary">description</span>
                <span class="text-[#121717] dark:text-gray-200 text-sm font-medium">របាយការណ៍</span>
            </a>
            <div class="my-4 border-t border-[#dce5e4] dark:border-[#2a4542]"></div>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors group"
                href="#">
                <span class="material-symbols-outlined text-[#658683] group-hover:text-primary">settings</span>
                <span class="text-[#121717] dark:text-gray-200 text-sm font-medium">ការកំណត់</span>
            </a>
        </nav>
    </div>
    <div class="mt-auto p-6">
        <div class="bg-background-light dark:bg-[#233d3a] rounded-xl p-4 flex items-center gap-3">
            @auth
                <img src="{{ auth()->user()->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
                    class="size-10 rounded-full object-cover border-2 border-primary shadow-sm" alt="User Profile">

                <div class="flex flex-col">
                    <p class="text-xs font-bold dark:text-white truncate max-w-[100px]">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-[#658683] truncate max-w-[100px]">Admin</p>
                </div>

                <form action="{{ route('public.home') }}" method="GET" class="ml-auto">
                    @csrf
                    <button type="submit"
                        class="flex items-center justify-center p-1 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors group">
                        <span
                            class="material-symbols-outlined text-xl text-[#658683] group-hover:text-red-500">logout</span>
                    </button>
                </form>
            @endauth
        </div>
    </div>
</aside>