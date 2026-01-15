<!DOCTYPE html>
<html class="light" lang="km">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Khmer Rental Management')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&amp;family=Noto+Sans+Khmer:wght@100..900&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#22c3b6",
                        "background-light": "#f6f8f8",
                        "background-dark": "#12201f",
                        "accent": "#0e7a71",
                    },
                    fontFamily: {
                        "display": ["Manrope", "Noto Sans Khmer", "sans-serif"]
                    },
                    borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Manrope', 'Noto Sans Khmer', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; vertical-align: middle; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #dce5e4; border-radius: 10px; }
    </style>
</head>

<body class="bg-background-light dark:bg-background-dark text-[#121717] dark:text-white antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        @include('partials.SlidebarAdmin')

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto flex flex-col">
            <!-- Navbar / Header -->
            @include('partials.NavbarAdmin')

            <!-- Page Content -->
            <div class="p-8">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer
                class="mt-auto p-8 pt-0 flex justify-between items-center text-[11px] text-[#658683] font-medium uppercase tracking-widest">
                <p>© 2024 Khmer Rental Management System</p>
                <div class="flex gap-6">
                    <a class="hover:text-primary transition-colors" href="#">ជំនួយ (Help)</a>
                    <a class="hover:text-primary transition-colors" href="#">គោលការណ៍ (Policy)</a>
                </div>
            </footer>
        </main>
    </div>
</body>

</html>
