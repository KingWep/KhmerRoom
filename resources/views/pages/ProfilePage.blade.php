@extends('layouts.LayoutsUser')

@section('content')
    {{-- Wrap everything in one x-data to manage Modal and Image Preview together --}}
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 py-12" x-data="{ 
                            openEditModal: false, 
                            imagePreview: '{{ Auth::user()->profile ? Auth::user()->profile : asset('images/default.png') }}',
                            previewImage(event) {
                                const file = event.target.files[0];
                                if (file) { 
                                    this.imagePreview = URL.createObjectURL(file); 
                                }
                            }
                         }">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            @if(session('message'))
                <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)" 
                    x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 scale-100"
                    x-transition:leave-end="opacity-0 scale-95"
                    class="mb-6 p-4 bg-gradient-to-r from-green-400 to-emerald-500 text-white rounded-2xl border border-green-200 shadow-lg shadow-green-200/30 flex items-center backdrop-blur-sm">
                    <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="font-semibold">{{ session('message') }}</span>
                </div>
            @endif
            <div class="mb-8">
                <div class="flex items-end justify-between">
                    <div>
                        <h1 class="text-4xl md:text-3xl font-black text-slate-900 mb-2">គណនីរបស់ខ្ញុំ</h1>
                        <p class="text-slate-600 text-lg">គ្រប់គ្រងព័ត៌មានផ្ទាល់ខ្លួន និងការកំណត់ប្រវត្តិរូប</p>
                    </div>
                    <div class="hidden md:flex items-center px-4 py-2 bg-white rounded-full shadow-sm border border-slate-100">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-pulse mr-2"></span>
                        <span class="text-xs font-bold text-slate-600">Active Account</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                {{-- Left Sidebar: Avatar & Actions --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">
                        {{-- Profile Card --}}
                        <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden hover:shadow-xl transition-all duration-300">
                            {{-- Header Gradient --}}
                            <div class="h-32 bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-600 relative overflow-hidden">
                                <div class="absolute inset-0 opacity-30 bg-[radial-gradient(circle,rgba(255,255,255,0.2)_1px,transparent_1px)] bg-[length:20px_20px]"></div>
                                <div class="absolute top-0 right-0 w-40 h-40 bg-white/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
                            </div>

                            <div class="relative px-6 pb-8">
                                {{-- Profile Image --}}
                                <div class="relative -mt-16 flex justify-center mb-4">
                                    <div class="relative group">
                                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-3xl blur-lg opacity-30 group-hover:opacity-50 transition duration-300"></div>
                                        <img src="{{ Auth::user()->profile ? Auth::user()->profile : asset('images/default.png') }}"
                                            class="relative w-32 h-32 rounded-3xl border-4 border-white object-cover shadow-xl">
                                    </div>
                                </div>

                                <div class="text-center">
                                    <h2 class="text-2xl font-black text-slate-800">{{ Auth::user()->name }}</h2>
                                    <p class="text-sm text-slate-500 font-medium mt-1">{{ Auth::user()->email }}</p>
                                </div>

                                {{-- Action Buttons --}}
                                <div class="mt-8 space-y-3">
                                    {{-- Edit Button --}}
                                    <button @click="openEditModal = true"
                                        class="group relative w-full flex items-center justify-center px-4 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold rounded-2xl shadow-lg shadow-blue-200/50 hover:shadow-xl hover:shadow-blue-300/50 hover:from-blue-700 hover:to-indigo-700 active:scale-95 transition-all duration-300 overflow-hidden">
                                        <span class="absolute inset-0 bg-white/20 opacity-0 group-hover:opacity-100 transition-opacity"></span>
                                        <span class="relative flex items-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                            កែសម្រួលប្រវត្តិរូប
                                        </span>
                                    </button>

                                    {{-- Logout Button --}}
                                    <form action="{{ auth()->user()->role == 'admin' ? route('admin.logout') : route('user.logout') }}"
                                        method="POST" class="w-full">
                                        @csrf
                                        <button type="submit"
                                            class="group w-full flex items-center justify-center px-4 py-4 bg-white text-slate-700 font-bold rounded-2xl border-2 border-slate-200 shadow-sm hover:border-slate-300 hover:bg-slate-50 hover:shadow-md active:scale-95 transition-all duration-300">
                                            <svg class="w-5 h-5 mr-2 text-slate-500 group-hover:text-slate-700 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                            </svg>
                                            ចាកចេញ
                                        </button>
                                    </form>

                                    {{-- Delete Account Button - SweetAlert2 --}}
                                    <button type="button" id="btn-delete-account"
                                        data-url="{{ auth()->user()->role == 'admin' ? route('admin.delete.account', Auth::user()->id) : route('user.delete.account', Auth::user()->id) }}"
                                        class="group w-full flex items-center justify-center px-4 py-3 bg-red-50 text-red-600 font-bold rounded-2xl border-2 border-red-100 hover:border-red-200 hover:bg-red-100/50 active:scale-95 transition-all duration-300">
                                        <svg class="w-5 h-5 mr-2 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        លុបគណនី
                                    </button>
                                </div>
                            </div>

                            {{-- Status Footer --}}
                            <div class="bg-gradient-to-r from-blue-50/50 to-indigo-50/50 py-3 px-6 border-t border-slate-100 flex justify-center">
                                <p class="text-[10px] uppercase tracking-[0.15em] font-black text-slate-500">✓ Verified Member</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Right Side: Profile Details --}}
                <div class="lg:col-span-3 space-y-6">
                    {{-- Personal Information Card --}}
                    <div class="bg-white rounded-3xl shadow-lg border border-slate-100 overflow-hidden hover:shadow-xl transition-all duration-300">
                        {{-- Header --}}
                        <div class="px-8 py-7 border-b border-slate-100 bg-gradient-to-r from-slate-50 to-blue-50/30">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h3 class="text-2xl font-black text-slate-900">ព័ត៌មានផ្ទាល់ខ្លួន</h3>
                                    <p class="text-sm text-slate-500 font-medium mt-1">ព័ត៌មានលម្អិតនៃគណនីរបស់អ្នក</p>
                                </div>
                                <div class="flex items-center px-4 py-2 bg-emerald-100 rounded-full">
                                    <span class="w-2 h-2 rounded-full bg-emerald-500 mr-2 animate-pulse"></span>
                                    <span class="text-xs font-bold text-emerald-700">Active</span>
                                </div>
                            </div>
                        </div>

                        {{-- Details Grid --}}
                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                                {{-- Name Field --}}
                                <div class="group">
                                    <label class="flex items-center text-xs font-black uppercase tracking-widest text-slate-400 mb-3 ml-1 group-hover:text-blue-600 transition-colors">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        ឈ្មោះពេញលេញ
                                    </label>
                                    <div class="relative">
                                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-200 to-indigo-200 rounded-2xl blur opacity-0 group-hover:opacity-100 transition duration-300"></div>
                                        <div class="relative px-5 py-4 bg-gradient-to-br from-slate-50 to-blue-50 rounded-2xl border border-slate-200 group-hover:border-slate-300 text-slate-800 font-bold text-lg transition-all">
                                            {{ Auth::user()->name }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Email Field --}}
                                <div class="group">
                                    <label class="flex items-center text-xs font-black uppercase tracking-widest text-slate-400 mb-3 ml-1 group-hover:text-blue-600 transition-colors">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                        អាសយដ្ឋានអ៊ីមែល
                                    </label>
                                    <div class="relative">
                                        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-200 to-indigo-200 rounded-2xl blur opacity-0 group-hover:opacity-100 transition duration-300"></div>
                                        <div class="relative px-5 py-4 bg-gradient-to-br from-slate-50 to-blue-50 rounded-2xl border border-slate-200 group-hover:border-slate-300 text-slate-700 font-bold text-lg italic transition-all">
                                            {{ Auth::user()->email }}
                                        </div>
                                    </div>
                                </div>

                                {{-- Phone Field --}}
                                <div class="group">
                                    <label class="flex items-center text-xs font-black uppercase tracking-widest text-slate-400 mb-3 ml-1 group-hover:text-blue-600 transition-colors">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 00.948.684l1.498 4.493a1 1 0 00.502.756l2.048 1.029a2 2 0 002.063-.009l2.048-1.029a1 1 0 00.502-.756l1.498-4.493a1 1 0 00-.948-.684H19a2 2 0 00-2 2v12a2 2 0 002 2h4a2 2 0 002-2V5a2 2 0 00-2-2h-2.5a1 1 0 00-.8.4l-1.9 2.533a1 1 0 01-.8.4H5a2 2 0 00-2 2z"></path>
                                        </svg>
                                        លេខទូរស័ព្ទ
                                    </label>
                                    <div class="px-5 py-4 bg-gradient-to-br from-slate-50 to-blue-50 rounded-2xl border border-slate-200 text-slate-700 font-bold text-lg">
                                        {{ Auth::user()->phone ?? 'មិនបានកំណត់' }}
                                    </div>
                                </div>

                                {{-- Joined Date --}}
                                <div class="group">
                                    <label class="flex items-center text-xs font-black uppercase tracking-widest text-slate-400 mb-3 ml-1 group-hover:text-blue-600 transition-colors">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                        កាលបរិច្ឆេទចូលរួម
                                    </label>
                                    <div class="px-5 py-4 bg-gradient-to-br from-slate-50 to-blue-50 rounded-2xl border border-slate-200 text-slate-700 font-bold text-lg">
                                        {{ Auth::user()->created_at->format('d M, Y') }}
                                    </div>
                                </div>

                                {{-- Role Field --}}
                                <div class="group">
                                    <label class="flex items-center text-xs font-black uppercase tracking-widest text-slate-400 mb-3 ml-1 group-hover:text-blue-600 transition-colors">
                                        <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                        តួនាទីប្រើប្រាស់
                                    </label>
                                    <div class="px-5 py-4 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-2xl border border-blue-200 text-blue-700 font-bold text-lg">
                                        {{ ucfirst(Auth::user()->role) }}
                                    </div>
                                </div>

                                {{-- Account Status --}}
                                <div class="group">
                                    <label class="flex items-center text-xs font-black uppercase tracking-widest text-slate-400 mb-3 ml-1 group-hover:text-blue-600 transition-colors">
                                        <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                        </svg>
                                        ស្ថានភាពគណនី
                                    </label>
                                    <div class="px-5 py-4 bg-gradient-to-r from-emerald-100 to-green-100 rounded-2xl border border-emerald-200 text-emerald-700 font-bold text-lg">
                                        សកម្ម (Active)
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Footer Info --}}
                        <div class="px-8 py-5 bg-gradient-to-r from-slate-50 to-blue-50/30 border-t border-slate-100">
                            <div class="flex items-center gap-3 text-slate-600 text-sm">
                                <svg class="w-5 h-5 text-blue-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="font-medium">គណនីរបស់អ្នកត្រូវបានការពារដោយស័ក្ខីកម្មសុវត្ថិភាពបង្រើម។</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- EDIT MODAL --}}
<div x-show="openEditModal" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4"
    style="display: none;">

    {{-- Backdrop with Ultra Blur --}}
    <div class="fixed inset-0 bg-slate-600/60 backdrop-blur-xl" x-show="openEditModal" x-transition:opacity
        @click="openEditModal = false"></div>

    {{-- Modal Content --}}
    <div class="relative bg-white rounded-[3rem] shadow-[0_32px_64px_-15px_rgba(0,0,0,0.2)] max-w-md w-full z-10 border border-slate-100/50"
        x-show="openEditModal" 
        x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 translate-y-12 scale-90" 
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-300" 
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95">

        {{-- Top Decorative Shape --}}
        <div class="absolute top-0 left-0 right-0 h-32 bg-gradient-to-br from-blue-50 to-indigo-50/50 -z-10 rounded-t-[3rem]"></div>

        <div class="p-8 pt-10">
            {{-- Header & Profile Image Composition --}}
            <div class="relative flex flex-col items-center mb-10">
                <div class="relative group">
                    {{-- Animated Ring --}}
                    <div class="absolute -inset-2 bg-gradient-to-tr from-blue-600 to-purple-500 rounded-[2.5rem] opacity-20 group-hover:opacity-40 blur-md transition duration-700 group-hover:rotate-180"></div>
                    
                    <img :src="imagePreview"
                        class="relative w-32 h-32 rounded-[2.3rem] object-cover border-[6px] border-white shadow-xl">
                    
                    <label class="absolute -bottom-2 -right-2 bg-slate-900 text-white p-3 rounded-2xl shadow-2xl cursor-pointer hover:bg-blue-600 hover:scale-110 active:scale-90 transition-all duration-300">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                            <circle cx="12" cy="13" r="3"></circle>
                        </svg>
                        <input type="file" name="profile" class="hidden" @change="previewImage">
                    </label>
                </div>
                
                <div class="mt-4 text-center">
                    <h3 class="text-2xl font-black text-slate-800 tracking-tight">កែសម្រួលប្រវត្តិរូប</h3>
                    <div class="h-1 w-12 bg-blue-500 rounded-full mx-auto mt-2 opacity-50"></div>
                </div>
            </div>

            <form
                action="{{ auth()->user()->role == 'admin' ? route('admin.update.profile', Auth::user()->id) : route('user.update.profile', Auth::user()->id) }}"
                method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PATCH')

                <div class="space-y-4">
                    {{-- Name Field with Icon --}}
                    <div class="group">
                        <label class="block text-[11px] font-bold uppercase text-slate-400 tracking-[0.1em] mb-1.5 ml-1 group-focus-within:text-blue-600 transition-colors">ឈ្មោះពេញ</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            </span>
                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                class="w-full pl-12 pr-5 py-4 bg-slate-50 border border-slate-100 rounded-[1.5rem] focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all outline-none font-bold text-slate-700">
                        </div>
                    </div>

                    {{-- Phone Field with Icon --}}
                    <div class="group">
                        <label class="block text-[11px] font-bold uppercase text-slate-400 tracking-[0.1em] mb-1.5 ml-1 group-focus-within:text-blue-600 transition-colors">លេខទូរស័ព្ទ</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-slate-400 group-focus-within:text-blue-500 transition-colors">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                            </span>
                            <input type="tel" name="phone" value="{{ Auth::user()->phone ?? '' }}" placeholder="012 345 678"
                                class="w-full pl-12 pr-5 py-4 bg-slate-50 border border-slate-100 rounded-[1.5rem] focus:bg-white focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all outline-none font-bold text-slate-700">
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col gap-3 pt-4">
                    <button type="submit"
                        class="w-full py-4 bg-blue-600 text-white rounded-[1.5rem] font-black text-lg shadow-xl shadow-blue-200 hover:bg-blue-700 hover:-translate-y-1 transition-all active:scale-95">
                        រក្សាទុកការផ្លាស់ប្តូរ
                    </button>
                    <button type="button" @click="openEditModal = false"
                        class="w-full py-4 bg-transparent text-slate-400 rounded-[1.5rem] font-bold hover:text-slate-600 transition-all">
                        បោះបង់
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>

    {{-- SweetAlert2 Delete Account Handler --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteBtn = document.getElementById('btn-delete-account');
            if (!deleteBtn) return;

            deleteBtn.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.dataset.url;

                Swal.fire({
                    title: 'លុបគណនី?',
                    html: `
                        <p style="color:#475569; font-size:14px; margin-bottom:12px;">សកម្មភាពនេះមិនអាចត្រឡប់វិញបានទេ</p>
                        <div style="background:#fef2f2; border:1px solid #fecaca; border-radius:12px; padding:12px 16px; text-align:left;">
                            <p style="color:#991b1b; font-size:13px; font-weight:500;">⚠️ ប្រសិនបើលុបគណនីនេះ ទិន្នន័យ និងព័ត៌មានទាំងអស់របស់អ្នកនឹងត្រូវលុប ដោយគ្មានលទ្ធភាពដាក់វិញ។</p>
                        </div>
                    `,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc2626',
                    cancelButtonColor: '#64748b',
                    confirmButtonText: 'បាទ/ចាស លុបគណនី!',
                    cancelButtonText: 'បោះបង់',
                    reverseButtons: true,
                    customClass: {
                        popup: 'rounded-2xl',
                        confirmButton: 'rounded-xl px-6 py-2.5 font-bold',
                        cancelButton: 'rounded-xl px-6 py-2.5 font-bold',
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = url;
                        form.innerHTML = `
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                        `;
                        document.body.appendChild(form);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection