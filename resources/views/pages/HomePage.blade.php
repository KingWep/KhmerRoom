@extends('layouts.LayoutsUser')

@section('title', 'ផ្ទះជួលខ្មែរ - ទំព័រដើម')

@section('content')
<main class="flex flex-col items-center mt-0">
    <!-- Hero Section -->
    <section class="w-full max-w-[1200px] px-4 py-6 md:px-8">
        <div class="relative overflow-hidden rounded-xl shadow-xl">
            <div class="absolute inset-0 bg-cover bg-center bg-no-repeat transition-transform duration-700 hover:scale-105"
                data-alt="modern cambodian rental house exterior with garden"
                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB7rRUCloCSN0SDM80VBJGIGORTqLzBt6YU5MYxBrrzbm_yD69J14hIyEF4qXmlyqkoUMmqFfygf3b6ov6v0_a8cCO-emB6OGigKuh5WiJROEwAp8fbdciQ65mS3jZsMYde5PRoJC0SPVVUomzO4BfRdcxajnnvPWXvHBGXTKSXjyHXkFwzytUMr0j5sDjMv0bAnWE9N7yk4guOt-ht77sOhSOaRGPjUWjoIbKWSXE0TDyHsSBmAkaU9AgmlA6o5ag6fKiD_2GzZ_M");'>
            </div>
            <div class="relative flex min-h-[480px] flex-col items-center justify-center gap-6 p-8 text-center md:items-start md:text-left">
                <div class="flex max-w-[600px] flex-col gap-4">
                    <span
                        class="inline-flex w-fit items-center gap-2 rounded-full bg-primary/20 px-3 py-1 text-xs font-medium text-blue-100 font-khmer-title">
                        <span class="material-symbols-outlined text-[16px]">verified</span>
                        ទំនុកចិត្ត និងសុវត្ថិភាព
                    </span>
                    <h1 class="font-khmer-title text-4xl font-black leading-tight tracking-tight text-white md:text-5xl lg:text-6xl drop-shadow-sm">
                        បន្ទប់ជួលដែលមាន<br /><span class="text-primary">ផាសុកភាព</span> និងសុវត្ថិភាព
                    </h1>
                    <h2 class="font-khmer-body text-base font-normal leading-relaxed text-slate-200 md:text-lg drop-shadow-sm">
                        ទីកន្លែងស្នាក់នៅដ៏ស្ងប់ស្ងាត់ មានសុវត្ថិភាព ២៤ម៉ោង និងតម្លៃសមរម្យសម្រាប់អ្នក។
                        ផ្តល់ជូននូវទឹក ភ្លើងរដ្ឋ និងអ៊ីនធឺណិតល្បឿនលឿន។ ចំណតធំទូលាយ។
                    </h2>
                    <div class="mt-4 flex flex-col gap-3 sm:flex-row">
                        <button
                            class="flex h-12 min-w-[160px] items-center justify-center gap-2 rounded-lg bg-primary hover:bg-blue-600 transition-all px-6 text-white text-base font-bold font-khmer-title shadow-lg shadow-blue-500/30">
                            <span class="material-symbols-outlined">search</span>
                            <span>មើលបន្ទប់ជួល</span>
                        </button>
                        <button
                            class="flex h-12 min-w-[160px] items-center justify-center gap-2 rounded-lg bg-white/10 hover:bg-white/20 transition-all px-6 text-white text-base font-bold font-khmer-title backdrop-blur-md border border-white/20">
                            <span class="material-symbols-outlined">call</span>
                            <span>ទាក់ទងយើង</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="w-full max-w-[1200px] px-4 py-2 md:px-8">
        <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Stat Cards (no dark/bg-slate) -->
            <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-full bg-blue-100 text-primary">
                        <span class="material-symbols-outlined">apartment</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium font-khmer-title">ចំនួនបន្ទប់សរុប</p>
                </div>
                <p class="text-[#0d141b] text-3xl font-bold leading-tight font-display pl-1">២០
                    <span class="text-lg font-normal text-slate-400 font-khmer-body">បន្ទប់</span>
                </p>
            </div>
            <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-full bg-green-100 text-green-600">
                        <span class="material-symbols-outlined">door_open</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium font-khmer-title">ចំនួនបន្ទប់ទំនេរ</p>
                </div>
                <p class="text-[#0d141b] text-3xl font-bold leading-tight font-display pl-1">៥
                    <span class="text-lg font-normal text-slate-400 font-khmer-body">បន្ទប់</span>
                </p>
            </div>
            <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-full bg-orange-100 text-orange-600">
                        <span class="material-symbols-outlined">payments</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium font-khmer-title">តម្លៃចាប់ពី</p>
                </div>
                <p class="text-[#0d141b] text-3xl font-bold leading-tight font-display pl-1">
                    $៦០<span class="text-lg font-normal text-slate-400">/ខែ</span></p>
            </div>
            <div class="flex flex-col gap-2 rounded-xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:shadow-md">
                <div class="flex items-center gap-3">
                    <div class="flex size-10 items-center justify-center rounded-full bg-purple-100 text-purple-600">
                        <span class="material-symbols-outlined">wifi</span>
                    </div>
                    <p class="text-slate-500 text-sm font-medium font-khmer-title">សេវាកម្ម</p>
                </div>
                <p class="text-[#0d141b] text-lg font-bold leading-tight font-khmer-body pt-2 pl-1">
                    ហ្វ្រី Wi-Fi &amp; ទឹក</p>
            </div>
        </div>
    </section>

    <!-- Popular Rooms -->
    <section class="w-full max-w-[1200px] px-4 pt-10 pb-4 md:px-8" id="rooms">
        <div class="flex items-center justify-between">
            <h2 class="text-[#0d141b] text-2xl font-bold leading-tight font-khmer-title flex items-center gap-2">
                <span class="h-8 w-1.5 rounded-full bg-primary block"></span>
                បន្ទប់ពេញនិយម
            </h2>
            <a class="text-primary text-sm font-bold hover:underline flex items-center gap-1 font-khmer-title"
                href="#">
                មើលទាំងអស់ <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
        </div>
    </section>

    <!-- Room Grid -->
    <section class="w-full max-w-[1200px] px-4 pb-12 md:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Room Card Example -->
            <!-- Repeat for each room -->
            <div class="group relative overflow-hidden rounded-xl bg-white shadow-md hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden">
                    <div class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        data-alt="cozy single bedroom interior with natural light"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCc2uiQBkOvJ12P913miwTo3WPslKlYNpHHjcdO07LJmHxXE7EwqPCsqf5Wj1lIbQDBiKTyI7yj-SRFe2r7IDjx725tq1lLU9Rmke-nUIEGboBC75a5eddPrcjejpJOzVw1yc9xfq9I2TnVH0l9HZBE9fuK7rSVLY7Mf2mjjU5rcTYtOZlzEPGoDGgmP4o--QmHGaYHW1SSCH0Yop0lmI3_7WW4mojdie-W4x-UTgSV8ciyUAqWSBUmCjsBYMr3FoClndKwyvD3tn0");'>
                    </div>
                </div>
                <div class="absolute top-3 right-3 rounded-lg bg-white/90 px-2 py-1 text-xs font-bold text-slate-900 shadow-sm">
                    ទំនេរ
                </div>
                <div class="p-4">
                    <div class="mb-2 flex items-start justify-between">
                        <h3 class="text-lg font-bold text-slate-900 font-khmer-title">បន្ទប់គ្រែមួយ (Single)</h3>
                        <span class="text-lg font-bold text-primary">$60<span class="text-xs font-normal text-slate-500">/ខែ</span></span>
                    </div>
                    <p class="mb-4 text-sm text-slate-500 font-khmer-body line-clamp-2">
                        បន្ទប់ធំទូលាយ មានបង្អួចស្រូបយកពន្លឺ និងខ្យល់អាកាសល្អ។ សាកសមសម្រាប់សិស្ស ឬអ្នកធ្វើការម្នាក់ឯង។
                    </p>
                    <div class="flex items-center gap-4 border-t border-slate-100 pt-3">
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">square_foot</span> 4mx5m
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">bed</span> 1 គ្រែ
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">ac_unit</span> កង្ហារ
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl bg-white shadow-md hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden">
                    <div class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        data-alt="cozy single bedroom interior with natural light"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCc2uiQBkOvJ12P913miwTo3WPslKlYNpHHjcdO07LJmHxXE7EwqPCsqf5Wj1lIbQDBiKTyI7yj-SRFe2r7IDjx725tq1lLU9Rmke-nUIEGboBC75a5eddPrcjejpJOzVw1yc9xfq9I2TnVH0l9HZBE9fuK7rSVLY7Mf2mjjU5rcTYtOZlzEPGoDGgmP4o--QmHGaYHW1SSCH0Yop0lmI3_7WW4mojdie-W4x-UTgSV8ciyUAqWSBUmCjsBYMr3FoClndKwyvD3tn0");'>
                    </div>
                </div>
                <div class="absolute top-3 right-3 rounded-lg bg-white/90 px-2 py-1 text-xs font-bold text-slate-900 shadow-sm">
                    ទំនេរ
                </div>
                <div class="p-4">
                    <div class="mb-2 flex items-start justify-between">
                        <h3 class="text-lg font-bold text-slate-900 font-khmer-title">បន្ទប់គ្រែមួយ (Single)</h3>
                        <span class="text-lg font-bold text-primary">$60<span class="text-xs font-normal text-slate-500">/ខែ</span></span>
                    </div>
                    <p class="mb-4 text-sm text-slate-500 font-khmer-body line-clamp-2">
                        បន្ទប់ធំទូលាយ មានបង្អួចស្រូបយកពន្លឺ និងខ្យល់អាកាសល្អ។ សាកសមសម្រាប់សិស្ស ឬអ្នកធ្វើការម្នាក់ឯង។
                    </p>
                    <div class="flex items-center gap-4 border-t border-slate-100 pt-3">
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">square_foot</span> 4mx5m
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">bed</span> 1 គ្រែ
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">ac_unit</span> កង្ហារ
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl bg-white shadow-md hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden">
                    <div class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        data-alt="cozy single bedroom interior with natural light"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCc2uiQBkOvJ12P913miwTo3WPslKlYNpHHjcdO07LJmHxXE7EwqPCsqf5Wj1lIbQDBiKTyI7yj-SRFe2r7IDjx725tq1lLU9Rmke-nUIEGboBC75a5eddPrcjejpJOzVw1yc9xfq9I2TnVH0l9HZBE9fuK7rSVLY7Mf2mjjU5rcTYtOZlzEPGoDGgmP4o--QmHGaYHW1SSCH0Yop0lmI3_7WW4mojdie-W4x-UTgSV8ciyUAqWSBUmCjsBYMr3FoClndKwyvD3tn0");'>
                    </div>
                </div>
                <div class="absolute top-3 right-3 rounded-lg bg-white/90 px-2 py-1 text-xs font-bold text-slate-900 shadow-sm">
                    ទំនេរ
                </div>
                <div class="p-4">
                    <div class="mb-2 flex items-start justify-between">
                        <h3 class="text-lg font-bold text-slate-900 font-khmer-title">បន្ទប់គ្រែមួយ (Single)</h3>
                        <span class="text-lg font-bold text-primary">$60<span class="text-xs font-normal text-slate-500">/ខែ</span></span>
                    </div>
                    <p class="mb-4 text-sm text-slate-500 font-khmer-body line-clamp-2">
                        បន្ទប់ធំទូលាយ មានបង្អួចស្រូបយកពន្លឺ និងខ្យល់អាកាសល្អ។ សាកសមសម្រាប់សិស្ស ឬអ្នកធ្វើការម្នាក់ឯង។
                    </p>
                    <div class="flex items-center gap-4 border-t border-slate-100 pt-3">
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">square_foot</span> 4mx5m
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">bed</span> 1 គ្រែ
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">ac_unit</span> កង្ហារ
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl bg-white shadow-md hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden">
                    <div class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        data-alt="cozy single bedroom interior with natural light"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCc2uiQBkOvJ12P913miwTo3WPslKlYNpHHjcdO07LJmHxXE7EwqPCsqf5Wj1lIbQDBiKTyI7yj-SRFe2r7IDjx725tq1lLU9Rmke-nUIEGboBC75a5eddPrcjejpJOzVw1yc9xfq9I2TnVH0l9HZBE9fuK7rSVLY7Mf2mjjU5rcTYtOZlzEPGoDGgmP4o--QmHGaYHW1SSCH0Yop0lmI3_7WW4mojdie-W4x-UTgSV8ciyUAqWSBUmCjsBYMr3FoClndKwyvD3tn0");'>
                    </div>
                </div>
                <div class="absolute top-3 right-3 rounded-lg bg-white/90 px-2 py-1 text-xs font-bold text-slate-900 shadow-sm">
                    ទំនេរ
                </div>
                <div class="p-4">
                    <div class="mb-2 flex items-start justify-between">
                        <h3 class="text-lg font-bold text-slate-900 font-khmer-title">បន្ទប់គ្រែមួយ (Single)</h3>
                        <span class="text-lg font-bold text-primary">$60<span class="text-xs font-normal text-slate-500">/ខែ</span></span>
                    </div>
                    <p class="mb-4 text-sm text-slate-500 font-khmer-body line-clamp-2">
                        បន្ទប់ធំទូលាយ មានបង្អួចស្រូបយកពន្លឺ និងខ្យល់អាកាសល្អ។ សាកសមសម្រាប់សិស្ស ឬអ្នកធ្វើការម្នាក់ឯង។
                    </p>
                    <div class="flex items-center gap-4 border-t border-slate-100 pt-3">
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">square_foot</span> 4mx5m
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">bed</span> 1 គ្រែ
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">ac_unit</span> កង្ហារ
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl bg-white shadow-md hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden">
                    <div class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        data-alt="cozy single bedroom interior with natural light"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCc2uiQBkOvJ12P913miwTo3WPslKlYNpHHjcdO07LJmHxXE7EwqPCsqf5Wj1lIbQDBiKTyI7yj-SRFe2r7IDjx725tq1lLU9Rmke-nUIEGboBC75a5eddPrcjejpJOzVw1yc9xfq9I2TnVH0l9HZBE9fuK7rSVLY7Mf2mjjU5rcTYtOZlzEPGoDGgmP4o--QmHGaYHW1SSCH0Yop0lmI3_7WW4mojdie-W4x-UTgSV8ciyUAqWSBUmCjsBYMr3FoClndKwyvD3tn0");'>
                    </div>
                </div>
                <div class="absolute top-3 right-3 rounded-lg bg-white/90 px-2 py-1 text-xs font-bold text-slate-900 shadow-sm">
                    ទំនេរ
                </div>
                <div class="p-4">
                    <div class="mb-2 flex items-start justify-between">
                        <h3 class="text-lg font-bold text-slate-900 font-khmer-title">បន្ទប់គ្រែមួយ (Single)</h3>
                        <span class="text-lg font-bold text-primary">$60<span class="text-xs font-normal text-slate-500">/ខែ</span></span>
                    </div>
                    <p class="mb-4 text-sm text-slate-500 font-khmer-body line-clamp-2">
                        បន្ទប់ធំទូលាយ មានបង្អួចស្រូបយកពន្លឺ និងខ្យល់អាកាសល្អ។ សាកសមសម្រាប់សិស្ស ឬអ្នកធ្វើការម្នាក់ឯង។
                    </p>
                    <div class="flex items-center gap-4 border-t border-slate-100 pt-3">
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">square_foot</span> 4mx5m
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">bed</span> 1 គ្រែ
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">ac_unit</span> កង្ហារ
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl bg-white shadow-md hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden">
                    <div class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        data-alt="cozy single bedroom interior with natural light"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCc2uiQBkOvJ12P913miwTo3WPslKlYNpHHjcdO07LJmHxXE7EwqPCsqf5Wj1lIbQDBiKTyI7yj-SRFe2r7IDjx725tq1lLU9Rmke-nUIEGboBC75a5eddPrcjejpJOzVw1yc9xfq9I2TnVH0l9HZBE9fuK7rSVLY7Mf2mjjU5rcTYtOZlzEPGoDGgmP4o--QmHGaYHW1SSCH0Yop0lmI3_7WW4mojdie-W4x-UTgSV8ciyUAqWSBUmCjsBYMr3FoClndKwyvD3tn0");'>
                    </div>
                </div>
                <div class="absolute top-3 right-3 rounded-lg bg-white/90 px-2 py-1 text-xs font-bold text-slate-900 shadow-sm">
                    ទំនេរ
                </div>
                <div class="p-4">
                    <div class="mb-2 flex items-start justify-between">
                        <h3 class="text-lg font-bold text-slate-900 font-khmer-title">បន្ទប់គ្រែមួយ (Single)</h3>
                        <span class="text-lg font-bold text-primary">$60<span class="text-xs font-normal text-slate-500">/ខែ</span></span>
                    </div>
                    <p class="mb-4 text-sm text-slate-500 font-khmer-body line-clamp-2">
                        បន្ទប់ធំទូលាយ មានបង្អួចស្រូបយកពន្លឺ និងខ្យល់អាកាសល្អ។ សាកសមសម្រាប់សិស្ស ឬអ្នកធ្វើការម្នាក់ឯង។
                    </p>
                    <div class="flex items-center gap-4 border-t border-slate-100 pt-3">
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">square_foot</span> 4mx5m
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">bed</span> 1 គ្រែ
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">ac_unit</span> កង្ហារ
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl bg-white shadow-md hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden">
                    <div class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        data-alt="cozy single bedroom interior with natural light"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCc2uiQBkOvJ12P913miwTo3WPslKlYNpHHjcdO07LJmHxXE7EwqPCsqf5Wj1lIbQDBiKTyI7yj-SRFe2r7IDjx725tq1lLU9Rmke-nUIEGboBC75a5eddPrcjejpJOzVw1yc9xfq9I2TnVH0l9HZBE9fuK7rSVLY7Mf2mjjU5rcTYtOZlzEPGoDGgmP4o--QmHGaYHW1SSCH0Yop0lmI3_7WW4mojdie-W4x-UTgSV8ciyUAqWSBUmCjsBYMr3FoClndKwyvD3tn0");'>
                    </div>
                </div>
                <div class="absolute top-3 right-3 rounded-lg bg-white/90 px-2 py-1 text-xs font-bold text-slate-900 shadow-sm">
                    ទំនេរ
                </div>
                <div class="p-4">
                    <div class="mb-2 flex items-start justify-between">
                        <h3 class="text-lg font-bold text-slate-900 font-khmer-title">បន្ទប់គ្រែមួយ (Single)</h3>
                        <span class="text-lg font-bold text-primary">$60<span class="text-xs font-normal text-slate-500">/ខែ</span></span>
                    </div>
                    <p class="mb-4 text-sm text-slate-500 font-khmer-body line-clamp-2">
                        បន្ទប់ធំទូលាយ មានបង្អួចស្រូបយកពន្លឺ និងខ្យល់អាកាសល្អ។ សាកសមសម្រាប់សិស្ស ឬអ្នកធ្វើការម្នាក់ឯង។
                    </p>
                    <div class="flex items-center gap-4 border-t border-slate-100 pt-3">
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">square_foot</span> 4mx5m
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">bed</span> 1 គ្រែ
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">ac_unit</span> កង្ហារ
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl bg-white shadow-md hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden">
                    <div class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        data-alt="cozy single bedroom interior with natural light"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCc2uiQBkOvJ12P913miwTo3WPslKlYNpHHjcdO07LJmHxXE7EwqPCsqf5Wj1lIbQDBiKTyI7yj-SRFe2r7IDjx725tq1lLU9Rmke-nUIEGboBC75a5eddPrcjejpJOzVw1yc9xfq9I2TnVH0l9HZBE9fuK7rSVLY7Mf2mjjU5rcTYtOZlzEPGoDGgmP4o--QmHGaYHW1SSCH0Yop0lmI3_7WW4mojdie-W4x-UTgSV8ciyUAqWSBUmCjsBYMr3FoClndKwyvD3tn0");'>
                    </div>
                </div>
                <div class="absolute top-3 right-3 rounded-lg bg-white/90 px-2 py-1 text-xs font-bold text-slate-900 shadow-sm">
                    ទំនេរ
                </div>
                <div class="p-4">
                    <div class="mb-2 flex items-start justify-between">
                        <h3 class="text-lg font-bold text-slate-900 font-khmer-title">បន្ទប់គ្រែមួយ (Single)</h3>
                        <span class="text-lg font-bold text-primary">$60<span class="text-xs font-normal text-slate-500">/ខែ</span></span>
                    </div>
                    <p class="mb-4 text-sm text-slate-500 font-khmer-body line-clamp-2">
                        បន្ទប់ធំទូលាយ មានបង្អួចស្រូបយកពន្លឺ និងខ្យល់អាកាសល្អ។ សាកសមសម្រាប់សិស្ស ឬអ្នកធ្វើការម្នាក់ឯង។
                    </p>
                    <div class="flex items-center gap-4 border-t border-slate-100 pt-3">
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">square_foot</span> 4mx5m
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">bed</span> 1 គ្រែ
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">ac_unit</span> កង្ហារ
                        </div>
                    </div>
                </div>
            </div>
            <div class="group relative overflow-hidden rounded-xl bg-white shadow-md hover:-translate-y-1 transition-all duration-300">
                <div class="aspect-video w-full overflow-hidden">
                    <div class="h-full w-full bg-cover bg-center transition-transform duration-500 group-hover:scale-110"
                        data-alt="cozy single bedroom interior with natural light"
                        style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCc2uiQBkOvJ12P913miwTo3WPslKlYNpHHjcdO07LJmHxXE7EwqPCsqf5Wj1lIbQDBiKTyI7yj-SRFe2r7IDjx725tq1lLU9Rmke-nUIEGboBC75a5eddPrcjejpJOzVw1yc9xfq9I2TnVH0l9HZBE9fuK7rSVLY7Mf2mjjU5rcTYtOZlzEPGoDGgmP4o--QmHGaYHW1SSCH0Yop0lmI3_7WW4mojdie-W4x-UTgSV8ciyUAqWSBUmCjsBYMr3FoClndKwyvD3tn0");'>
                    </div>
                </div>
                <div class="absolute top-3 right-3 rounded-lg bg-white/90 px-2 py-1 text-xs font-bold text-slate-900 shadow-sm">
                    ទំនេរ
                </div>
                <div class="p-4">
                    <div class="mb-2 flex items-start justify-between">
                        <h3 class="text-lg font-bold text-slate-900 font-khmer-title">បន្ទប់គ្រែមួយ (Single)</h3>
                        <span class="text-lg font-bold text-primary">$60<span class="text-xs font-normal text-slate-500">/ខែ</span></span>
                    </div>
                    <p class="mb-4 text-sm text-slate-500 font-khmer-body line-clamp-2">
                        បន្ទប់ធំទូលាយ មានបង្អួចស្រូបយកពន្លឺ និងខ្យល់អាកាសល្អ។ សាកសមសម្រាប់សិស្ស ឬអ្នកធ្វើការម្នាក់ឯង។
                    </p>
                    <div class="flex items-center gap-4 border-t border-slate-100 pt-3">
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">square_foot</span> 4mx5m
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">bed</span> 1 គ្រែ
                        </div>
                        <div class="flex items-center gap-1 text-xs text-slate-500">
                            <span class="material-symbols-outlined text-[16px]">ac_unit</span> កង្ហារ
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
