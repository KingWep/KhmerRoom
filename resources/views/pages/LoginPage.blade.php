@extends('layouts.LayoutsUser')
@section('title', 'ចូលគណនី - ផ្ទះជួលខ្មែរ')
@section('content')
    <main class="flex items-center justify-center min-h-screen px-4">
        <div
            class="w-full max-w-4xl bg-surface-light dark:bg-surface-dark rounded-2xl shadow-xl grid grid-cols-1 lg:grid-cols-2 overflow-hidden">
            @if (session('message'))
                <div id="alert-message" class="inline-flex items-center gap-2 px-3 py-2 mb-4 rounded-lg
                   bg-emerald-50 border border-emerald-200
                   text-emerald-700 text-xs shadow
                   animate-in fade-in slide-in-from-top-2 duration-200">
                    <span class="material-symbols-outlined text-sm">
                        check_circle
                    </span>
                    <span class="font-khmer">
                        {{ session('message') }}
                    </span>
                    <button onclick="closeAlert()" class="ml-1 text-emerald-500 hover:text-emerald-700 transition">
                        <span class="material-symbols-outlined text-xs">close</span>
                    </button>
                </div>
                <script>
                    function closeAlert() {
                        document.getElementById('alert-message')?.remove();
                    }
                    // auto close after 2 seconds
                    setTimeout(closeAlert, 2000);
                </script>
            @endif

            <!-- LOGIN FORM -->
            <div class="p-8 md:p-12 flex flex-col justify-center">

                <h2 class="text-3xl font-bold mb-2 font-khmer">សូមស្វាគមន៍</h2>
                <p class="text-text-secondary mb-8 font-khmer">
                    សូមបញ្ចូលព័ត៌មាន ដើម្បីចូលគណនី
                </p>

                <form class="space-y-5" method="POST" action="">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label class="text-sm font-medium font-khmer">អ៊ីមែល / លេខទូរស័ព្ទ</label>
                        <div class="relative mt-1">
                            <span class="material-symbols-outlined absolute left-3 top-3 text-gray-400">person</span>
                            <input type="text" name="email"
                                class="w-full h-12 pl-10 rounded-lg bg-background-light dark:bg-background-dark border dark:border-gray-700 focus:ring-primary focus:border-primary"
                                placeholder="បញ្ចូលអ៊ីមែល ឬ លេខទូរស័ព្ទ" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div>
                        <div class="flex justify-between">
                            <label class="text-sm font-medium font-khmer">ពាក្យសម្ងាត់</label>
                            <a href="#" class="text-xs text-primary font-khmer">ភ្លេចពាក្យសម្ងាត់?</a>
                        </div>
                        <div class="relative mt-1">
                            <span class="material-symbols-outlined absolute left-3 top-3 text-gray-400">lock</span>
                            <input type="password" name="password"
                                class="w-full h-12 pl-10 rounded-lg bg-background-light dark:bg-background-dark border dark:border-gray-700 focus:ring-primary focus:border-primary"
                                placeholder="••••••••" required>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button class="w-full h-12 bg-primary hover:bg-primary-dark text-white font-bold rounded-lg transition">
                        ចូលគណនី
                    </button>

                    <!-- REGISTER LINK -->
                    <div class="text-center mt-4">
                        <p class="text-sm text-text-secondary font-khmer">
                            មិនទាន់មានគណនីទេ?
                            <a href="{{ Route('register') }}"
                                class="text-primary font-bold underline hover:text-primary-dark">
                                ចុះឈ្មោះឥឡូវនេះ
                            </a>
                        </p>
                    </div>

                    <!-- REGISTER BUTTON -->
                    <a href="{{ Route('register') }}" class="w-full h-12 mt-3 bg-gradient-to-r from-emerald-500 to-teal-500
                            hover:from-emerald-600 hover:to-teal-600
                            text-white font-bold rounded-lg flex items-center justify-center gap-2 shadow-md">
                        <span class="material-symbols-outlined">person_add</span>
                        បង្កើតគណនីថ្មី
                    </a>
                </form>
            </div>

            <!-- IMAGE -->
            <div class="hidden lg:block relative">
                <img class="absolute inset-0 w-full h-full object-cover"
                    src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85" alt="">
                <div class="absolute inset-0 bg-black/50 flex items-end p-8">
                    <div>
                        <h3 class="text-white text-2xl font-bold font-khmer">
                            ស្វែងរកកន្លែងស្នាក់នៅ
                        </h3>
                        <p class="text-gray-200 text-sm font-khmer mt-2">
                            ងាយស្រួល រហ័ស និងមានសុវត្ថិភាព
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection