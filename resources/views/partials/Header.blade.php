<!DOCTYPE html>
<html lang="km">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ផ្ទះជួលខ្មែរ - Khmer Rental Rooms</title>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
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
                    <a href="{{ route('public.home') }}"
                        class="text-[#0d141b] text-sm font-medium hover:text-primary font-khmer-title">ទំព័រដើម</a>
                    <a href="{{ route('public.rooms') }}"
                        class="text-[#0d141b] text-sm font-medium hover:text-primary font-khmer-title">ប្រភេទបន្ទប់</a>
                    <a href="{{ route('public.contact') }}"
                        class="text-[#0d141b] text-sm font-medium hover:text-primary font-khmer-title">ទំនាក់ទំនង</a>
                </nav>
                @auth
                            <a id="auth-button" href="{{ route('profile') }}" class="hidden md:flex items-center justify-center">
                                <div class="flex items-center gap-2">
                                    {{-- Check if photo starts with http (like Gravatar) or needs the storage path --}}
                                    <img src="{{ Str::startsWith(auth()->user()->profile_photo_url, ['http', 'https'])
                    ? auth()->user()->profile_photo_url
                    : asset('storage/' . auth()->user()->profile_photo_url) }}" alt="Profile"
                                        class="size-9 rounded-full object-cover border-2 border-primary shadow-sm"
                                        onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=random'">
                                </div>
                            </a>
                @else
                    <a href="{{ route('login') }}"
                        class="hidden md:flex min-w-[84px] h-10 items-center justify-center rounded-lg bg-primary hover:bg-blue-600 text-white text-sm font-bold font-khmer-title shadow-lg shadow-blue-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <g stroke-dasharray="22">
                                    <path d="M3 21v-1c0 -2.21 1.79 -4 4 -4h4c2.21 0 4 1.79 4 4v1">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.3s" values="22;0" />
                                    </path>
                                    <path stroke-dashoffset="22"
                                        d="M9 13c-1.66 0 -3 -1.34 -3 -3c0 -1.66 1.34 -3 3 -3c1.66 0 3 1.34 3 3c0 1.66 -1.34 3 -3 3Z">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s" dur="0.3s"
                                            to="0" />
                                    </path>
                                </g>
                                <g stroke-dasharray="8" stroke-dashoffset="8">
                                    <path d="M15 6h6">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s" dur="0.2s"
                                            to="0" />
                                    </path>
                                    <path d="M18 3v6">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s" dur="0.2s"
                                            to="0" />
                                    </path>
                                </g>
                            </g>
                        </svg>
                        <span class="ml-2">គណនី</span>
                    </a>
                @endauth
                <!-- Mobile Menu Icon -->
                <button class="flex md:hidden items-center justify-center text-slate-700">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </header>
    </div>
</body>

</html>