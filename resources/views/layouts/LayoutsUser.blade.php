
<!DOCTYPE html>
<html lang="km">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'ផ្ទះជួលខ្មែរ - Khmer Rental Rooms')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@400;700&family=Kantumruy+Pro:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;700&display=swap" rel="stylesheet" />

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#137fec",
                        "background-light": "#f6f7f8",
                        // "background-dark": "#101922",
                    },
                    fontFamily: {
                        "display": ["Plus Jakarta Sans", "sans-serif"],
                        "khmer-title": ["Kantumruy Pro", "sans-serif"],
                        "khmer-body": ["Battambang", "sans-serif"],
                    },
                },
            },
        }
    </script>
</head>

<body class="bg-background-light  text-slate-900  font-khmer-body">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <!-- Header -->
        @include('partials.Header') 

        <!-- Main content -->
        <main class="flex flex-col items-center m-0 p-0">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('partials.Footer') 
    </div>
</body>
</html>
