@extends('layouts.LayoutsUser')

@section('title', 'ចុះឈ្មោះគណនីថ្មី - ផ្ទះជួលខ្មែរ')

@section('content')
<main class="min-h-screen flex items-center justify-center p-4 mt-10 md:p-10 bg-slate-50">
    
    <div class="w-full max-w-[1100px] min-h-[720px] bg-white rounded-[32px] overflow-hidden shadow-[0_32px_64px_-15px_rgba(0,0,0,0.1)] flex flex-col md:flex-row border border-slate-100">
        
        <div class="w-full md:w-[55%] p-8 lg:p-14 flex flex-col justify-center bg-white">
            
            <div class="mb-8">
                <h1 class="text-3xl font-black text-slate-900 mb-2 font-khmer-title tracking-tight">
                    បង្កើតគណនី
                </h1>
                <p class="text-slate-500 font-khmer-body text-sm">បំពេញព័ត៌មាន ដើម្បីទទួលបានបទពិសោធន៍ថ្មី</p>
            </div>

            <form class="space-y-4" method="POST" enctype="multipart/form-data" action="{{ route('register.store') }}">
                @csrf
                
                <div class="flex items-center gap-6 mb-6">
                    <div class="relative group h-24 w-24">
                        <img src="{{ asset('storage/images/profile.png') }}" alt="Preview" id="profilePreview"
                            class="w-full h-full rounded-2xl object-cover ring-4 ring-slate-50 shadow-sm border border-slate-100">
                        <label for="profileInput" class="absolute -bottom-2 -right-2 bg-primary text-white p-1.5 rounded-lg cursor-pointer shadow-lg hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-[18px]">edit</span>
                        </label>
                        <input type="file" name="profile" accept="image/*" id="profileInput" class="hidden">
                    </div>
                    <div>
                        <h4 class="text-slate-800 font-bold text-sm font-khmer-title">រូបថតគណនី</h4>
                        <p class="text-slate-400 text-xs font-khmer-body">រូបភាព JPG, PNG (Max. 2MB)</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-slate-700 text-[13px] font-bold ml-1 font-khmer-title">ឈ្មោះពេញ</label>
                        <input name="name" value="{{ old('name') }}"
                            class="w-full h-11 px-4 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all text-sm"
                            placeholder="Full Name" type="text" />
                    </div>
                    <div class="space-y-1">
                        <label class="text-slate-700 text-[13px] font-bold ml-1 font-khmer-title">អ៊ីមែល</label>
                        <input name="email" value="{{ old('email') }}"
                            class="w-full h-11 px-4 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all text-sm"
                            placeholder="Email Address" type="email" />
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="space-y-1">
                        <label class="text-slate-700 text-[13px] font-bold ml-1 font-khmer-title">ពាក្យសម្ងាត់</label>
                        <div class="relative">
                            <input name="password"
                                class="w-full h-11 px-4 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all text-sm"
                                placeholder="••••••••" type="password" />
                        </div>
                    </div>
                    <div class="space-y-1">
                        <label class="text-slate-700 text-[13px] font-bold ml-1 font-khmer-title">បញ្ជាក់ពាក្យសម្ងាត់</label>
                        <div class="relative">
                            <input name="password_confirmation"
                                class="w-full h-11 px-4 rounded-xl border border-slate-200 bg-slate-50/50 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all text-sm"
                                placeholder="••••••••" type="password" />
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full h-12 bg-primary text-white font-bold rounded-xl shadow-lg shadow-primary/25 hover:bg-blue-700 transition-all font-khmer-title">
                        ចុះឈ្មោះចូលប្រើប្រាស់
                    </button>
                </div>

                <p class="text-center text-slate-500 text-sm font-khmer-body mt-6">
                    មានគណនីរួចហើយ? <a href="{{ route('login') }}" class="text-primary font-bold hover:underline">ចូលគណនី</a>
                </p>
            </form>
        </div>

        <div class="hidden md:block w-[45%] bg-[#0f172a] relative overflow-hidden">
            <img alt="Modern architecture" class="absolute inset-0 w-full h-full object-cover opacity-60"
                src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop" />
            
            <div class="absolute top-10 left-10 right-10 p-8 rounded-3xl backdrop-blur-md bg-white/10 border border-white/10 shadow-2xl">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-10 h-10 rounded-full bg-primary flex items-center justify-center">
                        <span class="material-symbols-outlined text-white">verified</span>
                    </div>
                    <span class="text-white font-bold font-khmer-title">ជម្រើសដ៏ល្អបំផុត</span>
                </div>
                <h3 class="text-white text-xl font-bold font-khmer-title leading-relaxed">
                    ស្វែងរកផ្ទះជួលដែលសាកសមបំផុតសម្រាប់អ្នក!
                </h3>
            </div>

            <div class="absolute bottom-10 left-10 right-10 flex justify-between gap-4">
                <div class="bg-white/10 backdrop-blur-md p-4 rounded-2xl flex-1 border border-white/5 text-center">
                    <div class="text-white font-bold text-xl leading-none">10k+</div>
                    <div class="text-white/60 text-[10px] mt-1 uppercase tracking-wider">Users</div>
                </div>
                <div class="bg-white/10 backdrop-blur-md p-4 rounded-2xl flex-1 border border-white/5 text-center">
                    <div class="text-white font-bold text-xl leading-none">5k+</div>
                    <div class="text-white/60 text-[10px] mt-1 uppercase tracking-wider">Properties</div>
                </div>
            </div>
        </div>
    </div>
</main>