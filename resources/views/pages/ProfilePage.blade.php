@extends('layouts.LayoutsUser')

@section('content')
    {{-- Wrap everything in one x-data to manage Modal and Image Preview together --}}
    <div class="min-h-screen bg-gray-50 py-12" x-data="{ 
                            openEditModal: false, 
                            imagePreview: '{{ Auth::user()->profile ? Auth::user()->profile : asset('images/default.png') }}',
                            previewImage(event) {
                                const file = event.target.files[0];
                                if (file) { 
                                    this.imagePreview = URL.createObjectURL(file); 
                                }
                            }
                         }">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('message'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" {{-- 2000ms=2 seconds
                    --}} x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="mb-4 p-4 bg-green-100 text-green-700 rounded-2xl border border-green-200 shadow-sm flex items-center">

                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ session('message') }}
                </div>
            @endif
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900">គណនីរបស់ខ្ញុំ (My Profile)</h1>
                <p class="text-gray-600">គ្រប់គ្រងព័ត៌មានផ្ទាល់ខ្លួន និងការកំណត់គណនីរបស់អ្នក</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Left Sidebar: Avatar & Actions --}}
                <div class="lg:col-span-1">
                    <div
                        class="bg-white rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden transition-all duration-300 hover:shadow-[0_8px_30px_rgb(0,0,0,0.08)]">

                        {{-- Header with Mesh Gradient Style --}}
                        <div class="h-36 bg-gradient-to-br from-indigo-600 via-blue-600 to-blue-400 relative">
                            <div class="absolute inset-0 opacity-20"
                                style="background-image: url('https://www.transparenttextures.com/patterns/cubes.png');">
                            </div>
                        </div>

                        <div class="relative px-6 pb-8">
                            {{-- Profile Image with Layered Shadow --}}
                            <div class="relative -mt-20 flex justify-center">
                                <div class="relative group">
                                    <div
                                        class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-[2rem] blur opacity-25 group-hover:opacity-50 transition duration-300">
                                    </div>
                                    <img src="{{ Auth::user()->profile ? Auth::user()->profile : asset('images/default.png') }}"
                                        class="relative w-36 h-36 rounded-[2rem] border-4 border-white object-cover shadow-xl">
                                        
                                </div>
                            </div>

                            <div class="mt-6 text-center">
                                <h2 class="text-2xl font-black text-slate-800 tracking-tight">{{ Auth::user()->name }}</h2>

                                {{-- Dynamic Badge --}}
                                <div
                                    class="inline-flex items-center mt-2 px-3 py-1 bg-blue-50 text-blue-600 text-xs font-bold rounded-full uppercase tracking-widest">
                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10.394 2.827a1 1 0 00-.788 0l-7 3a1 1 0 000 1.848l7 3a1 1 0 00.788 0l7-3a1 1 0 000-1.848l-7-3zM14 8.828l1.446.619L10 11.895 4.554 9.447 6 8.828l4 1.715 4-1.715zM6.606 12.723L10 14.177l3.394-1.454 1.448.621a1 1 0 010 1.848l-4 1.715a1 1 0 01-.788 0l-4-1.715a1 1 0 010-1.848l1.448-.621z">
                                        </path>
                                    </svg>
                                    {{ ucfirst(Auth::user()->role) }} Account
                                </div>
                                <div class="mt-10 space-y-3">
                                    {{-- Premium Edit Button --}}
                                    <button @click="openEditModal = true"
                                        class="group relative flex items-center justify-center w-full px-4 py-4 bg-slate-900 text-white font-bold rounded-2xl overflow-hidden transition-all duration-300 hover:bg-blue-600 hover:shadow-lg hover:shadow-blue-200 active:scale-95">
                                        <span class="relative z-10 flex items-center">
                                            <svg class="w-5 h-5 mr-2 transition-transform duration-300 group-hover:rotate-12"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                </path>
                                            </svg>
                                            កែសម្រួលព័ត៌មាន
                                        </span>
                                    </button>
                                    <div class="mt-8 space-y-3">
                                        {{-- Logout Button --}}
                                        <form
                                            action="{{ auth()->user()->role == 'admin' ? route('admin.logout') : route('user.logout') }}"
                                            method="POST" class="w-full">
                                            @csrf
                                            <button type="submit"
                                                class="group flex items-center justify-center w-full px-4 py-3.5 bg-white text-slate-600 font-bold rounded-2xl border-2 border-slate-100 hover:border-slate-200 hover:bg-slate-50 transition-all duration-300 active:scale-[0.98]">
                                                <svg class="w-5 h-5 mr-2 text-slate-400 group-hover:text-slate-600 transition-colors"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                    </path>
                                                </svg>
                                                ចាកចេញពីគណនី
                                            </button>
                                        </form>

                                        {{-- Subtle Delete Link
                                        <button @click="openDeleteModal = true"
                                            class="group flex items-center justify-center w-full px-4 py-2 text-slate-400 hover:text-red-500 text-sm font-bold transition-all duration-300">
                                            <svg class="w-4 h-4 mr-1.5 opacity-50 group-hover:opacity-100" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                            លុបគណនី
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Bottom Status Decoration --}}
                        <div class="bg-slate-50 py-3 px-6 border-t border-slate-100 flex justify-center">
                            <p class="text-[10px] uppercase tracking-[0.2em] font-black text-slate-400">Verified Member</p>
                        </div>
                    </div>
                </div>
                {{-- Right Side: Profile Details --}}
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-[2.5rem] shadow-sm border border-slate-100 overflow-hidden">
                        {{-- Header Section --}}
                        <div class="px-8 py-6 border-b border-slate-50 flex items-center justify-between bg-slate-50/50">
                            <div>
                                <h3 class="text-xl font-black text-slate-800">ព័ត៌មានផ្ទាល់ខ្លួន</h3>
                                <p class="text-sm text-slate-500 font-medium">ព័ត៌មានលម្អិតនៃគណនីរបស់អ្នក</p>
                            </div>
                            <span
                                class="inline-flex items-center px-4 py-1.5 rounded-full text-xs font-bold bg-green-100 text-green-600 uppercase tracking-wider">
                                <span class="w-2 h-2 rounded-full bg-green-500 mr-2 animate-pulse"></span>
                                Active Now
                            </span>
                        </div>

                        {{-- Details Grid --}}
                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-8">

                                {{-- Name Field --}}
                                <div class="group transition-all duration-300">
                                    <label
                                        class="flex items-center text-xs font-bold uppercase tracking-widest text-slate-400 mb-3 ml-1 group-hover:text-blue-500 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                            </path>
                                        </svg>
                                        ឈ្មោះពេញ
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-2xl blur opacity-0 group-hover:opacity-100 transition duration-300">
                                        </div>
                                        <div
                                            class="relative px-5 py-4 bg-slate-50 rounded-2xl border border-slate-100 text-slate-700 font-bold text-lg">
                                            {{ Auth::user()->name }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Email Field --}}
                                <div class="group transition-all duration-300">
                                    <label
                                        class="flex items-center text-xs font-bold uppercase tracking-widest text-slate-400 mb-3 ml-1 group-hover:text-blue-500 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        អាសយដ្ឋានអ៊ីមែល
                                    </label>
                                    <div class="relative">
                                        <div
                                            class="absolute -inset-1 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-2xl blur opacity-0 group-hover:opacity-100 transition duration-300">
                                        </div>
                                        <div
                                            class="relative px-5 py-4 bg-slate-50 rounded-2xl border border-slate-100 text-slate-700 font-bold text-lg italic">
                                            {{ Auth::user()->email }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Joined Date --}}
                                <div class="group transition-all duration-300">
                                    <label
                                        class="flex items-center text-xs font-bold uppercase tracking-widest text-slate-400 mb-3 ml-1 group-hover:text-blue-500 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        កាលបរិច្ឆេទចូលរួម
                                    </label>
                                    <div
                                        class="px-5 py-4 bg-slate-50 rounded-2xl border border-slate-100 text-slate-600 font-semibold">
                                        {{ Auth::user()->created_at->format('d M, Y') }}
                                    </div>
                                </div>

                                {{-- Role Field --}}
                                <div class="group transition-all duration-300">
                                    <label
                                        class="flex items-center text-xs font-bold uppercase tracking-widest text-slate-400 mb-3 ml-1 group-hover:text-blue-500 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                            </path>
                                        </svg>
                                        តួនាទីប្រើប្រាស់
                                    </label>
                                    <div
                                        class="px-5 py-4 bg-blue-50/50 rounded-2xl border border-blue-100 text-blue-700 font-bold">
                                        {{ ucfirst(Auth::user()->role) }}
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Footer Tip --}}
                        <div class="px-8 py-5 bg-gradient-to-r from-slate-50 to-white border-t border-slate-100">
                            <div class="flex items-center text-slate-500 text-sm">
                                <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                គណនីរបស់អ្នកត្រូវបានការពារដោយសុវត្ថិភាពខ្ពស់។
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- EDIT MODAL --}}
        <div x-show="openEditModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4"
            style="display: none;">

            {{-- Backdrop --}}
            <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" x-show="openEditModal" x-transition:opacity
                @click="openEditModal = false"></div>

            {{-- Modal Content --}}
            <div class="relative bg-white rounded-[2.5rem] shadow-2xl max-w-md w-full overflow-hidden z-10 border border-slate-100"
                x-show="openEditModal" x-transition:enter="ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95">

                <div class="p-8">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-black text-slate-800">កែសម្រួលប្រវត្តិរូប</h3>
                        <p class="text-slate-500">ផ្លាស់ប្តូររូបភាព និងព័ត៌មានផ្ទាល់ខ្លួន</p>
                    </div>

                    <form
                        action="{{ auth()->user()->role == 'admin' ? route('admin.update.profile', Auth::user()->id) : route('user.update.profile', Auth::user()->id) }}"
                        method="POST" enctype="multipart/form-data" class="space-y-5">
                        @csrf
                        @method('PATCH')

                        {{-- Image Upload Section --}}
                        <div class="flex flex-col items-center justify-center space-y-3">
                            <div class="relative group">
                                <img :src="imagePreview"
                                    class="w-28 h-28 rounded-3xl object-cover border-4 border-slate-50 shadow-inner group-hover:opacity-80 transition-opacity">
                                <label
                                    class="absolute bottom-0 right-0 bg-blue-600 text-white p-2 rounded-xl shadow-lg cursor-pointer hover:bg-blue-700 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z">
                                        </path>
                                        <path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <input type="file" name="profile" class="hidden" @change="previewImage">
                                </label>
                            </div>
                            <span class="text-xs text-slate-400">ចុចលើរូបតំណាងដើម្បីប្តូររូបភាព</span>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-400 mb-2 ml-1">ឈ្មោះពេញ</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="w-full px-5 py-3.5 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500/20 transition-all font-semibold text-slate-700">
                            </div>

                            <div>
                                <label
                                    class="block text-xs font-bold uppercase text-slate-400 mb-2 ml-1">អាសយដ្ឋានអ៊ីមែល</label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}"
                                    class="w-full px-5 py-3.5 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-blue-500/20 transition-all font-semibold text-slate-700">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4 pt-4">
                            <button type="button" @click="openEditModal = false"
                                class="px-6 py-4 bg-slate-100 text-slate-600 rounded-2xl font-bold hover:bg-slate-200 transition-all">
                                បោះបង់
                            </button>
                            <button type="submit"
                                class="px-6 py-4 bg-blue-600 text-white rounded-2xl font-bold shadow-lg shadow-blue-100 hover:bg-blue-700 hover:-translate-y-0.5 transition-all">
                                រក្សាទុក
                            </button>
                        </div>
                    </form>
                </div>
                {{-- Bottom Accent Line --}}
                <div class="h-1.5 bg-gradient-to-r from-blue-500 via-indigo-500 to-purple-500"></div>
            </div>
        </div>
    </div>
@endsection
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>