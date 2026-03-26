@extends('layouts.LayoutsUser')

@section('title', 'ចុះឈ្មោះគណនីថ្មី - ផ្ទះជួលខ្មែរ')

@section('content')
<main class="min-h-screen flex items-center justify-center p-4 py-20 bg-slate-50/50">
    
    <div class="w-full max-w-[1150px] bg-white rounded-[40px] overflow-hidden shadow-[0_40px_100px_-20px_rgba(0,0,0,0.08)] flex flex-col md:flex-row border border-slate-200/60">
        
        <div class="w-full md:w-[58%] p-8 lg:p-16 flex flex-col justify-center bg-white">
            
            <div class="mb-10">
                <h1 class="text-4xl font-black text-slate-900 mb-3 font-khmer-title tracking-tight">
                    បង្កើតគណនី
                </h1>
                <p class="text-slate-500 font-khmer-body text-base">បំពេញព័ត៌មានខាងក្រោម ដើម្បីក្លាយជាសមាជិករបស់យើង</p>
            </div>

            <form class="space-y-5" method="POST" enctype="multipart/form-data" action="{{ route('register.store') }}">
                @csrf
                
                <div class="flex items-center gap-6 mb-8 p-4 rounded-3xl bg-slate-50/80 border border-dashed border-slate-200 w-fit">
                    <div class="relative group h-20 w-20">
                        <img src="{{ asset('storage/images/profile.png') }}" alt="Preview" id="profilePreview"
                            class="w-full h-full rounded-2xl object-cover ring-4 ring-white shadow-md border border-slate-100">
                        <label for="profileInput" class="absolute -bottom-2 -right-2 bg-primary text-white p-1.5 rounded-lg cursor-pointer shadow-lg hover:scale-110 transition-transform active:scale-95">
                            <span class="material-symbols-outlined text-[20px]">photo_camera</span>
                        </label>
                        <input type="file" name="profile" accept="image/*" id="profileInput" class="hidden" onchange="previewImage(event)">
                    </div>
                    <div>
                        <h4 class="text-slate-800 font-bold text-sm font-khmer-title">រូបថតគណនី</h4>
                        <p class="text-slate-400 text-xs font-khmer-body mt-1">ទំហំអតិបរមា 2MB (JPG, PNG)</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="text-slate-700 text-sm font-bold ml-1 font-khmer-title">ឈ្មោះពេញ</label>
                        <input name="name" value="{{ old('name') }}" required
                            class="w-full h-12 px-4 rounded-2xl border border-slate-200 bg-slate-50/30 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all text-sm @error('name') border-red-500 @enderror"
                            placeholder="John Doe" type="text" />
                        @error('name') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-slate-700 text-sm font-bold ml-1 font-khmer-title">លេខទូរស័ព្ទ</label>
                        <input name="phone" value="{{ old('phone') }}" required
                            class="w-full h-12 px-4 rounded-2xl border border-slate-200 bg-slate-50/30 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all text-sm @error('phone') border-red-500 @enderror"
                            placeholder="012 345 678" type="tel" />
                        @error('phone') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="sm:col-span-2 space-y-1.5">
                        <label class="text-slate-700 text-sm font-bold ml-1 font-khmer-title">អ៊ីមែល</label>
                        <input name="email" value="{{ old('email') }}" required
                            class="w-full h-12 px-4 rounded-2xl border border-slate-200 bg-slate-50/30 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all text-sm @error('email') border-red-500 @enderror"
                            placeholder="example@mail.com" type="email" />
                        @error('email') <span class="text-red-500 text-xs ml-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-slate-700 text-sm font-bold ml-1 font-khmer-title">ពាក្យសម្ងាត់</label>
                        <input name="password" required
                            class="w-full h-12 px-4 rounded-2xl border border-slate-200 bg-slate-50/30 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all text-sm @error('password') border-red-500 @enderror"
                            placeholder="••••••••" type="password" />
                    </div>

                    <div class="space-y-1.5">
                        <label class="text-slate-700 text-sm font-bold ml-1 font-khmer-title">បញ្ជាក់ពាក្យសម្ងាត់</label>
                        <input name="password_confirmation" required
                            class="w-full h-12 px-4 rounded-2xl border border-slate-200 bg-slate-50/30 focus:bg-white focus:ring-4 focus:ring-primary/10 focus:border-primary outline-none transition-all text-sm"
                            placeholder="••••••••" type="password" />
                    </div>
                </div>

                <div class="pt-6">
                    <button type="submit"
                        class="w-full h-14 bg-primary text-white font-bold rounded-2xl shadow-xl shadow-primary/20 hover:bg-blue-700 hover:-translate-y-0.5 transition-all font-khmer-title text-lg">
                        ចុះឈ្មោះឥឡូវនេះ
                    </button>
                </div>

                <p class="text-center text-slate-500 text-sm font-khmer-body mt-8">
                    មានគណនីរួចហើយ? <a href="{{ route('login') }}" class="text-primary font-bold hover:underline ml-1">ចូលគណនី</a>
                </p>
            </form>
        </div>

        <div class="hidden md:flex w-[42%] bg-slate-900 relative overflow-hidden p-12 flex-col justify-between">
            <img alt="Modern architecture" class="absolute inset-0 w-full h-full object-cover opacity-50 scale-110 hover:scale-100 transition-transform duration-1000"
                src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop" />
            <div class="absolute inset-0 bg-gradient-to-b from-slate-900/40 via-transparent to-slate-900/90"></div>
            
            <div class="relative z-10">
                <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 mb-6">
                    <span class="material-symbols-outlined text-primary text-xl">verified</span>
                    <span class="text-white text-xs font-bold font-khmer-title tracking-wide">ជម្រើសដ៏ល្អបំផុតសម្រាប់អ្នក</span>
                </div>
                <h3 class="text-white text-3xl font-bold font-khmer-title leading-[1.4]">
                    ស្វែងរកផ្ទះជួលដែល<br>សាកសមបំផុតសម្រាប់អ្នក!
                </h3>
            </div>

            <div class="relative z-10 grid grid-cols-2 gap-4">
                <div class="bg-white/10 backdrop-blur-xl p-5 rounded-[24px] border border-white/10 group hover:bg-white/20 transition-colors">
                    <div class="text-white font-black text-2xl mb-1 tracking-tight">10k+</div>
                    <div class="text-white/60 text-[10px] uppercase font-bold tracking-[2px]">អ្នកប្រើប្រាស់</div>
                </div>
                <div class="bg-white/10 backdrop-blur-xl p-5 rounded-[24px] border border-white/10 group hover:bg-white/20 transition-colors">
                    <div class="text-white font-black text-2xl mb-1 tracking-tight">5k+</div>
                    <div class="text-white/60 text-[10px] uppercase font-bold tracking-[2px]">អចលនទ្រព្យ</div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('profilePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection