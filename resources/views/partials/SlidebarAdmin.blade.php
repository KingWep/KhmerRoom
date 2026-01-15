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
               href="#">
               <span class="material-symbols-outlined text-[#658683] group-hover:text-primary">dashboard</span>
               <span class="text-[#121717] dark:text-gray-200 text-sm font-medium">ផ្ទាំងគ្រប់គ្រង</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors group"
               href="/tenants">
               <span class="material-symbols-outlined text-[#658683] group-hover:text-primary">group</span>
               <span class="text-[#121717] dark:text-gray-200 text-sm font-medium">បញ្ជីអ្នកជួល</span>
            </a>
            <a class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-background-light dark:hover:bg-[#233d3a] transition-colors group"
               href="#">
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
            <div class="size-10 rounded-full bg-cover bg-center border-2 border-primary"
                 style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBZsEECGUxxTLb2HD33LycPwkVcrRLeJ7bLOTRJSphpfDh1Joy5q7UC4Y6kTUmYrwIHFZ9zNVFlhsXfk9jqr1-z1DlLKZfzxnBfVR-p_beluOZU2EjmCOMTip7z12-Lbp2u4QxhfXGT2qq-vGzfGbtigKp7yviEhAkSUxylnZdgiH_s0W2IF1nTc_oyZbZj1xN7paqq0-NZouIN6KQFBgiXxc_dKuHho35IsnU1jDzaCEYEKvb8rmCILLfWCNJAY8p50rZQerzRgCMR')">
            </div>
            <div class="flex flex-col">
                <p class="text-xs font-bold dark:text-white">Admin User</p>
                <p class="text-[10px] text-[#658683]">Super Admin</p>
            </div>
            <span class="material-symbols-outlined ml-auto text-sm text-[#658683]">logout</span>
        </div>
    </div>
</aside>



<script>
  // Select all sidebar links
  const sidebarLinks = document.querySelectorAll('aside nav a');

  sidebarLinks.forEach(link => {
    link.addEventListener('click', function(e) {
      e.preventDefault(); // Prevent default navigation (optional, remove if actual navigation happens)

      // Remove active classes from all links
      sidebarLinks.forEach(l => {
        l.classList.remove('bg-primary/10', 'text-primary', 'border', 'border-primary/20', 'font-bold');
        l.classList.add('hover:bg-background-light', 'dark:hover:bg-[#233d3a]', 'text-[#121717]', 'dark:text-gray-200', 'font-medium');
      });

      // Add active classes to clicked link
      this.classList.add('bg-primary/10', 'text-primary', 'border', 'border-primary/20', 'font-bold');
      this.classList.remove('hover:bg-background-light', 'dark:hover:bg-[#233d3a]', 'text-[#121717]', 'dark:text-gray-200', 'font-medium');

      // Optional: Navigate to the link's href
      window.location.href = this.href;
    });
  });
</script>

