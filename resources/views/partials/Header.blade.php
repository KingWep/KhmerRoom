<!DOCTYPE html>
<html lang="km">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ផ្ទះជួលខ្មែរ - Khmer Rental Rooms</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Battambang:wght@400;700&amp;family=Kantumruy+Pro:wght@400;500;600;700&amp;family=Plus+Jakarta+Sans:wght@400;500;700&amp;display=swap"
        rel="stylesheet" />
    <!-- Material Symbols -->
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        "primary": "#137fec",
                        "background-light": "#f6f7f8",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"],
                        "khmer-title": ["Kantumruy Pro", "sans-serif"],
                        "khmer-body": ["Battambang", "sans-serif"],
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
</head>

<body class="bg-background-light text-slate-900 font-khmer-body">
    <div class="relative flex w-full flex-col overflow-x-hidden mt-[65px]">
        <!-- Header -->
        <header class="w-full fixed top-0 z-50 border-b border-solid border-b-[#e7edf3] bg-white shadow-sm">
            <div class="w-[90%] mx-auto flex items-center justify-between px-4 py-3 md:px-10">
                <!-- Logo Left -->
                <div class="flex items-center gap-4 text-[#0d141b]">
                    <div class="flex size-10 items-center justify-center rounded-full bg-primary/10 text-primary">
                        <span class="material-symbols-outlined text-2xl">cottage</span>
                    </div>
                    <h2 class="text-[#0d141b] text-lg font-bold font-khmer-title leading-tight tracking-[-0.015em]">
                        ផ្ទះជួលខ្មែរ
                    </h2>
                </div>

                <!-- Desktop Menu Center -->
                <nav class="hidden md:flex flex-1 justify-center gap-9">
                    <a href="/"
                        class="text-[#0d141b] text-sm font-medium hover:text-primary font-khmer-title">ទំព័រដើម</a>
                    <a href="/rooms"
                        class="text-[#0d141b] text-sm font-medium hover:text-primary font-khmer-title">ប្រភេទបន្ទប់</a>
                    <a href="/contact"
                        class="text-[#0d141b] text-sm font-medium hover:text-primary font-khmer-title">ទំនាក់ទំនង</a>
                </nav>

                <!-- Button Right -->
                <a href="/login"
                    class="hidden md:flex min-w-[84px] h-10 items-center justify-center rounded-lg bg-primary hover:bg-blue-600 text-white text-sm font-bold font-khmer-title shadow-lg shadow-blue-500/20">
                    ចូលគណនី
                </a>

                <!-- Mobile Menu Icon -->
                <button class="flex md:hidden items-center justify-center text-slate-700">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </header>
    </div>
</body>
</html>
