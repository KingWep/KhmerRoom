@extends('layouts.LayoutsUser')

@section('title', 'ចុះឈ្មោះគណនីថ្មី - ផ្ទះជួលខ្មែរ')

@section('content')
<main class="flex-1 flex items-center justify-center p-4 md:p-8 lg:p-12 w-full">
    <div class="w-full max-w-[1000px] bg-white  rounded-xl overflow-hidden shadow-2xl flex flex-col md:flex-row min-h-[650px] border border-zinc-100">
        
        <!-- Left Side: Registration Form -->
        <div class="w-full md:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
            <div class="mb-8">
                <h1 class="text-3xl lg:text-4xl font-black text-[#0e131b] ading-tight mb-2 font-khmer-title">ចុះឈ្មោះគណនីថ្មី</h1>
                <p class="text-[#4e6d97]  text-base font-khmer-body">សូមបំពេញព័ត៌មានខាងក្រោម ដើម្បីបង្កើតគណនី</p>
            </div>
            <form class="space-y-4" method="POST" action="">
                @csrf

                <!-- Full Name -->
                <div class="flex flex-col gap-1.5">
                    <label class="text-[#0e131b]  text-sm font-semibold font-khmer-title">ឈ្មោះពេញ</label>
                    <div class="relative flex items-center group">
                        <input name="name" value="{{ old('name') }}" class="w-full h-12 pl-4 pr-12 rounded-lg border border-[#d0d9e7] bg-slate-50 text-[#0e131b] cus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-[#4e6d97]/60" placeholder="បញ្ចូលឈ្មោះពេញរបស់អ្នក" type="text" required/>
                        <div class="absolute right-4 text-[#4e6d97] ">
                            <span class="material-symbols-outlined">person</span>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="flex flex-col gap-1.5">
                    <label class="text-[#0e131b]  text-sm font-semibold font-khmer-title">អ៊ីមែល</label>
                    <div class="relative flex items-center group">
                        <input name="email" value="{{ old('email') }}" class="w-full h-12 pl-4 pr-12 rounded-lg border border-[#d0d9e7] bg-slate-50 /50 text-[#0e131b] cus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-[#4e6d97]/60" placeholder="example@mail.com" type="email" required/>
                        <div class="absolute right-4 text-[#4e6d97] ">
                            <span class="material-symbols-outlined">mail</span>
                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="flex flex-col gap-1.5">
                    <label class="text-[#0e131b]  text-sm font-semibold font-khmer-title">ពាក្យសម្ងាត់</label>
                    <div class="relative flex items-center group">
                        <input name="password" class="w-full h-12 pl-4 pr-12 rounded-lg border border-[#d0d9e7] bg-slate-50 /50 text-[#0e131b] cus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-[#4e6d97]/60" placeholder="••••••••" type="password" required/>
                        <button type="button" class="absolute right-4 text-[#4e6d97]  hover:text-primary transition-colors" onclick="togglePassword(this)">
                            <span class="material-symbols-outlined">visibility</span>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password -->
                <div class="flex flex-col gap-1.5">
                    <label class="text-[#0e131b]  text-sm font-semibold font-khmer-title">បញ្ជាក់ពាក្យសម្ងាត់</label>
                    <div class="relative flex items-center group">
                        <input name="password_confirmation" class="w-full h-12 pl-4 pr-12 rounded-lg border border-[#d0d9e7] bg-slate-50 /50 text-[#0e131b] cus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all placeholder:text-[#4e6d97]/60" placeholder="••••••••" type="password" required/>
                        <button type="button" class="absolute right-4 text-[#4e6d97]  hover:text-primary transition-colors" onclick="togglePassword(this)">
                            <span class="material-symbols-outlined">visibility</span>
                        </button>
                    </div>
                </div>

                <!-- Register Button -->
                <button type="submit" class="w-full h-12 bg-primary text-white font-bold rounded-lg shadow-lg shadow-primary/20 hover:shadow-primary/40 hover:-translate-y-0.5 transition-all mt-6 font-khmer-title">
                    ចុះឈ្មោះ
                </button>

                <div class="mt-8 text-center">
                    <p class="text-[#4e6d97]  text-sm font-khmer-body">
                        មានគណនីរួចហើយ? 
                        <a class="text-primary font-bold ml-1 hover:underline" href="/login">ចូលគណនី</a>
                    </p>
                </div>
            </form>
        </div>

        <!-- Right Side: Image -->
        <div class="hidden md:block w-1/2 relative">
            <img alt="Modern apartment interior" class="absolute inset-0 w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB6xaq6HQ6Rg6D5h7WwXdYvbyN8ZEOBGh1-0IGUBixMJ0MbCeNdZgyBdSlzrnd9lRp59bAcKiwchPaBovM79_rm3Kuuh49OqNp-ecpX9rtqOvXStb5RktzCziPblOJCWQH325mM5qU02HGV0wn6v4VpLbQpIFguhJu8UU7dEFZuKVhbDfSUoaKLyQfEcz2OYFNnXPWqcGA-FgEjgKJgsvCx_pKRXVdOowiy9cz-AzxQ3MkXxS7pRzC4dYYZQDYpQTmk3EkTXpX17jU"/>
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-black/10 flex flex-col justify-end p-12">
                <div class="max-w-md">
                    <div class="w-12 h-1 bg-primary mb-6 rounded-full"></div>
                    <h2 class="text-white text-3xl font-bold leading-snug font-khmer-title">
                        បង្កើតគណនីថ្មី ដើម្បីចាប់ផ្តើមប្រើប្រាស់ <span class="text-primary">ផ្ទះជួលខ្មែរ</span>
                    </h2>
                    <p class="text-zinc-300 mt-4 text-base font-light font-khmer-body">
                        ស្វែងរកទីកន្លែងដែលល្អបំផុតសម្រាប់ការរស់នៅរបស់អ្នក ជាមួយជម្រើសដ៏សម្បូរបែប។
                    </p>
                </div>
            </div>
        </div>

    </div>
</main>

<!-- Password Toggle Script -->
<script>
    function togglePassword(button) {
        const input = button.parentElement.querySelector('input');
        if(input.type === 'password'){
            input.type = 'text';
            button.querySelector('span').textContent = 'visibility_off';
        } else {
            input.type = 'password';
            button.querySelector('span').textContent = 'visibility';
        }
    }
</script>
@endsection
