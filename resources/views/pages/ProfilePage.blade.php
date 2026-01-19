@extends('layouts.LayoutsUser')

@section('content')
    <div class="min-h-screen bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">គណនីរបស់ខ្ញុំ (My Profile)</h1>
                <p class="text-gray-600">គ្រប់គ្រងព័ត៌មានផ្ទាល់ខ្លួន និងការកំណត់គណនីរបស់អ្នក</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                        <div class="h-32 bg-gradient-to-r from-blue-600 to-indigo-700"></div>
                        <div class="relative px-6 pb-6">
                            <div class="relative -mt-16 flex justify-center">
                                <img src="{{ Auth::user()->profile ? asset('images/' . Auth::user()->profile) : asset('images/default.png') }}"
                                    alt="Profile"
                                    class="w-32 h-32 rounded-2xl border-4 border-white object-cover shadow-md">
                            </div>

                            <div class="mt-6 text-center">
                                <h2 class="text-2xl font-bold text-gray-900">{{ Auth::user()->name }}</h2>
                                <p class="text-blue-600 font-medium">{{ ucfirst(Auth::user()->role) }}</p>

                                <div x-data="{ openEditModal: false }" class="mt-8 space-y-4">
                                    <button @click="openEditModal = true"
                                        class="group relative flex items-center justify-center w-full px-4 py-3.5 bg-slate-900 text-white font-bold rounded-2xl transition-all duration-300 hover:bg-blue-600 hover:shadow-[0_10px_20px_rgba(37,99,235,0.3)] active:scale-[0.98]">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2.5 transition-transform duration-300 group-hover:-rotate-12"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                            កែសម្រួលព័ត៌មាន
                                        </span>
                                    </button>

                                    <form
                                        action="{{ auth()->user()->role == 'admin' ? route('admin.logout') : route('user.logout') }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="group flex items-center justify-center w-full px-4 py-3 bg-transparent text-slate-500 font-medium rounded-2xl border border-slate-200 hover:border-red-200 hover:text-red-600 hover:bg-red-50/50 transition-all duration-300">
                                            <svg class="w-4 h-4 mr-2 opacity-60 group-hover:opacity-100 transition-opacity"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            ចាកចេញពីគណនី
                                        </button>
                                    </form>
                                    <div x-show="openEditModal"
                                        class="fixed inset-0 z-[100] flex items-center justify-center p-4" x-cloak>

                                        <div x-show="openEditModal" x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in duration-200"
                                            class="fixed inset-0 bg-slate-900/40 backdrop-blur-md"
                                            @click="openEditModal = false"></div>

                                        <div x-show="openEditModal" x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0 translate-y-8 sm:scale-95"
                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave="ease-in duration-200"
                                            class="relative bg-white rounded-[2.5rem] shadow-[0_20px_50px_rgba(0,0,0,0.1)] max-w-md w-full overflow-hidden z-10 border border-slate-100">

                                            <div class="px-8 pt-10 pb-8">
                                                <div class="text-center mb-8">
                                                    <div
                                                        class="inline-flex items-center justify-center w-16 h-16 bg-blue-50 text-blue-600 rounded-3xl mb-4">
                                                        <svg class="w-8 h-8" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <h3 class="text-2xl font-black text-slate-800 tracking-tight">
                                                        កែសម្រួលប្រវត្តិរូប</h3>
                                                    <p class="text-slate-500 font-medium">រៀបចំគណនីរបស់អ្នកឱ្យមានភាពទាន់សម័យ
                                                    </p>
                                                </div>
                                                <form action="{{ route('user.update.profile', Auth::user()->id) }}" enctype="multipart/form-data"
                                                    method="POST" class="space-y-6">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="space-y-4">
                                                        <div class="group">
                                                            <label
                                                                class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 ml-1">ឈ្មោះពេញ</label>
                                                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                                                class="block w-full px-5 py-4 bg-slate-50 border-none rounded-2xl focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all text-slate-700 font-semibold"
                                                                placeholder="ឈ្មោះរបស់អ្នក">
                                                        </div>

                                                        <div class="group">
                                                            <label
                                                                class="block text-xs font-bold uppercase tracking-widest text-slate-400 mb-2 ml-1">អាសយដ្ឋានអ៊ីមែល</label>
                                                            <input type="email" name="email"
                                                                value="{{ Auth::user()->email }}"
                                                                class="block w-full px-5 py-4 bg-slate-50 border-none rounded-2xl focus:bg-white focus:ring-2 focus:ring-blue-500/20 transition-all text-slate-700 font-semibold"
                                                                placeholder="example@gmail.com">
                                                        </div>
                                                    </div>

                                                    <div class="grid grid-cols-2 gap-4 pt-4">
                                                        <button type="button" @click="openEditModal = false"
                                                            class="px-6 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">
                                                            បោះបង់
                                                        </button>
                                                        <button type="submit"
                                                            class="px-6 py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-lg shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all active:translate-y-0">
                                                            រក្សាទុក
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="h-2 bg-gradient-to-r from-blue-400 via-indigo-500 to-purple-500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-6">

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-xl font-bold text-gray-900">ព័ត៌មានផ្ទាល់ខ្លួន</h3>
                            <span
                                class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full uppercase tracking-wider">Active</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-1">ឈ្មោះពេញ (Full Name)</label>
                                <p class="text-lg font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-1">អាសយដ្ឋានអ៊ីមែល (Email)</label>
                                <p class="text-lg font-semibold text-gray-800">{{ Auth::user()->email }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-1">ថ្ងៃបង្កើតគណនី (Joined)</label>
                                <p class="text-lg font-semibold text-gray-800">
                                    {{ Auth::user()->created_at->format('d M, Y') }}</p>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-1">តួនាទី (User Role)</label>
                                <div class="flex items-center mt-1">
                                    <div class="w-2 h-2 rounded-full bg-blue-500 mr-2"></div>
                                    <p class="text-lg font-semibold text-gray-800">{{ ucfirst(Auth::user()->role) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100 flex items-start space-x-4">
                        <div class="bg-blue-100 p-3 rounded-xl text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-blue-900 font-bold">គន្លឹះសុវត្ថិភាព (Security Tip)</h4>
                            <p class="text-blue-700 text-sm mt-1">សូមកុំចែករំលែកពាក្យសម្ងាត់របស់អ្នកជាមួយនរណាម្នាក់ឡើយ។
                                យើងណែនាំឱ្យអ្នកប្តូរពាក្យសម្ងាត់រៀងរាល់ ៣ ខែម្តង។</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>