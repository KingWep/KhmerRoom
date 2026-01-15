@extends('layouts.LayoutsUser')
@section('title','ផ្ទះជួលខ្មែរ - ទំនាក់ទំនង')
@section('content')
    <main class="flex-1 flex flex-col items-center">
            <div class="w-full max-w-[1200px] px-4 md:px-10 py-8 flex flex-col gap-12">
                <!-- Page Heading -->
                <div class="flex flex-col gap-4 text-center md:text-left py-4">
                    <h1
                        class="text-[#0d141b]  text-3xl md:text-5xl font-bold leading-tight tracking-[-0.033em] font-khmer">
                        អំពីយើងខ្ញុំ <span class="text-primary">&amp;</span> ទំនាក់ទំនង
                    </h1>
                    <p
                        class="text-[#4c739a] text-lg font-normal leading-normal font-khmer max-w-2xl">
                        ស្វែងយល់បន្ថែមអំពីសេវាកម្ម និងទីតាំងរបស់យើង ឬទំនាក់ទំនងមកកាន់យើងដោយផ្ទាល់សម្រាប់ព័ត៌មានបន្ថែម។
                    </p>
                </div>
                <!-- Hero / About Section -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-[#e7edf3] overflow-hidden">
                    <div class="flex flex-col lg:flex-row">
                        <!-- Image Side -->
                        <div class="lg:w-1/2 w-full h-[300px] lg:h-auto bg-gray-200 relative group">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 hover:scale-105"
                                data-alt="Modern Khmer apartment building with green plants and clear blue sky"
                                style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAMyzldD0vEr6a5eoxFFKkgUXkEE1IL47FlNwgfqcrGk06EIIjN-bta0d3aXHuIpL5iQpIJCy8XRlvAGa5LIbp8DfNv7yz902nLuszvh6xNyhCdPN6WVwRIwUXjn93SH6F5m6WubPdWrkXaP7DsiEEEf5Ul83BrSX6UsBz_MwACleqt4xnt3jSUGAdaQdACSod0sB2x-YgT69w2-2l6YxxHb8-av_Cin893KdSQIOxZmwT7Dvo6x8aarDqq2cam4M8eLhmVgiT_T5s");'>
                            </div>
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent lg:bg-gradient-to-r lg:from-transparent lg:to-black/10">
                            </div>
                            <div class="absolute bottom-6 left-6 text-white lg:hidden">
                                <span
                                    class="px-3 py-1 bg-primary text-white text-xs font-bold rounded-full mb-2 inline-block">អំពីម្ចាស់ផ្ទះ</span>
                            </div>
                        </div>
                        <!-- Content Side -->
                        <div class="lg:w-1/2 p-8 md:p-12 flex flex-col justify-center gap-6">
                            <div class="hidden lg:block">
                                <span
                                    class="px-3 py-1 bg-primary/10 text-primary text-xs font-bold rounded-full mb-2 inline-block border border-primary/20">អំពីម្ចាស់ផ្ទះ</span>
                            </div>
                            <h2
                                class="text-[#0d141b]  text-2xl md:text-3xl font-bold leading-tight font-khmer">
                                ផ្តល់ជូនបន្ទប់ជួលស្អាត និងមានសុវត្ថិភាពសម្រាប់អ្នក
                            </h2>
                            <div class="space-y-4 text-[#4c739a] font-khmer leading-relaxed">
                                <p>
                                    យើងប្តេជ្ញាផ្តល់ជូននូវបរិយាកាសរស់នៅដ៏ល្អប្រសើរសម្រាប់សិស្សនិស្សិត និងអ្នកធ្វើការ។
                                    ទីតាំងរបស់យើងមានភាពស្ងប់ស្ងាត់ មានអនាម័យជានិច្ច និងបំពាក់ដោយកាមេរ៉ាសុវត្ថិភាព
                                    ២៤ម៉ោង។
                                </p>
                                <p>
                                    ជាមួយនឹងបទពិសោធន៍ជាង ១០ឆ្នាំ ក្នុងការគ្រប់គ្រងផ្ទះជួល
                                    យើងយល់ច្បាស់ពីតម្រូវការរបស់អ្នកជួល។ យើងផ្តល់ជូននូវតម្លៃសមរម្យ
                                    និងសេវាកម្មរហ័សទាន់ចិត្តរាល់ពេលមានបញ្ហា។
                                </p>
                            </div>
                            <div class="pt-4 flex flex-wrap gap-4">
                                <div
                                    class="flex items-center gap-2 text-[#0d141b]  bg-background-light px-4 py-2 rounded-lg">
                                    <span class="material-symbols-outlined text-primary">verified_user</span>
                                    <span class="font-bold text-sm">សុវត្ថិភាព ២៤ម៉ោង</span>
                                </div>
                                <div
                                    class="flex items-center gap-2 text-[#0d141b]  bg-background-light px-4 py-2 rounded-lg">
                                    <span class="material-symbols-outlined text-primary">wifi</span>
                                    <span class="font-bold text-sm">អ៊ិនធឺណិតល្បឿនលឿន</span>
                                </div>
                                <div
                                    class="flex items-center gap-2 text-[#0d141b]  bg-background-light px-4 py-2 rounded-lg">
                                    <span class="material-symbols-outlined text-primary">local_parking</span>
                                    <span class="font-bold text-sm">ចំណតធំទូលាយ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contact Section -->
                <div class="flex flex-col gap-8">
                    <div class="border-b border-gray-200 pb-4">
                        <h2
                            class="text-[#0d141b]  text-2xl font-bold leading-tight tracking-[-0.015em] font-khmer">
                            ព័ត៌មានទំនាក់ទំនង
                        </h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Phone Card -->
                        <a class="group flex flex-col gap-4 p-6 rounded-xl border border-[#e7edf3] bg-white hover:shadow-md hover:border-primary/30 transition-all duration-300 cursor-pointer"
                            href="tel:012345678">
                            <div
                                class="size-12 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined">call</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h3 class="text-[#0d141b]  text-lg font-bold font-khmer">លេខទូរស័ព្ទ</h3>
                                <p class="text-[#4c739a] text-sm font-display font-medium">012 345
                                    678</p>
                                <p class="text-[#4c739a] text-sm font-display font-medium">096 789
                                    123</p>
                            </div>
                        </a>
                        <!-- Telegram Card -->
                        <a class="group flex flex-col gap-4 p-6 rounded-xl border border-[#e7edf3] bg-white hover:shadow-md hover:border-primary/30 transition-all duration-300 cursor-pointer"
                            href="#">
                            <div
                                class="size-12 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined">send</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h3 class="text-[#0d141b]  text-lg font-bold font-khmer">Telegram</h3>
                                <p class="text-[#4c739a] text-sm font-display font-medium">
                                    @RentalKhmerOwner</p>
                                <span class="text-xs text-primary font-bold mt-1">ចុចដើម្បីឆាត</span>
                            </div>
                        </a>
                        <!-- Email Card -->
                        <a class="group flex flex-col gap-4 p-6 rounded-xl border border-[#e7edf3] bg-white hover:shadow-md hover:border-primary/30 transition-all duration-300 cursor-pointer"
                            href="mailto:info@rentalkhmer.com">
                            <div
                                class="size-12 rounded-full bg-blue-50 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-colors">
                                <span class="material-symbols-outlined">mail</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h3 class="text-[#0d141b]  text-lg font-bold font-khmer">អ៊ីមែល</h3>
                                <p
                                    class="text-[#4c739a] text-sm font-display font-medium break-words">
                                    info@rentalkhmer.com</p>
                                <span class="text-xs text-primary font-bold mt-1">ឆ្លើយតបក្នុងរយៈពេល 24h</span>
                            </div>
                        </a>
                        <!-- Map Card -->
                        <div
                            class="group flex flex-col gap-4 p-6 rounded-xl border border-[#e7edf3] bg-white">
                            <div
                                class="size-12 rounded-full bg-blue-50 flex items-center justify-center text-primary">
                                <span class="material-symbols-outlined">location_on</span>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h3 class="text-[#0d141b]  text-lg font-bold font-khmer">អាសយដ្ឋាន</h3>
                                <p class="text-[#4c739a] text-sm font-khmer leading-relaxed">
                                    ផ្ទះលេខ១០, ផ្លូវ១២៣, សង្កាត់ទឹកល្អក់, ខណ្ឌទួលគោក, ភ្នំពេញ</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Map Section -->
                <div
                    class="w-full h-[350px] md:h-[450px] rounded-2xl overflow-hidden shadow-sm border border-[#e7edf3] relative">
                    <!-- Placeholder Map Image with Overlay -->
                    <div class="absolute inset-0 bg-cover bg-center" data-alt="Map view showing location in Phnom Penh"
                        data-location="Phnom Penh"
                       >
                       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31276.296050626042!2d104.9287462234497!3d11.513284346941399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109574f479edc5b%3A0xfa311d32a186f747!2sPassport%20Department!5e0!3m2!1sen!2skh!4v1768202402975!5m2!1sen!2skh" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
         {{-- style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuB3SC4e3P4TdkaUhdYCRyYPetyQuaBW-8sVAMZRrgd4drbJxVq5HAqUQBK6sd3lvfOsdBbci8x3kU6ZrOpcExeIDSB6YHMo1ay9SZDL_T7dCsr6uyobjjIm2wHYuJSsfC5IfLv8N26BntYn045ndnTM2l4gBW8Qt0YDNttm0x5beBGzrgHWBVABevdb_O3umBepdKvMSlA0CSGCbmCElYrMldnfVWYsMxoOim_4mka7CZG15I_YkpymtBm_PmiG3xQ9u8h-UV7d3hA"); filter: grayscale(20%);'> --}}
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center bg-black/10">
                        <div
                            class="bg-white/90/90 backdrop-blur p-6 rounded-xl shadow-lg flex flex-col items-center gap-3 max-w-sm text-center m-4">
                            <div class="p-3 bg-primary rounded-full text-white shadow-lg -mt-12 mb-1">
                                <span class="material-symbols-outlined text-3xl">map</span>
                            </div>
                            <h3 class="text-[#0d141b]  font-bold text-lg font-khmer">ទីតាំងផែនទី</h3>
                            <p class="text-[#4c739a] text-sm font-khmer">
                                សូមចុចលើប៊ូតុងខាងក្រោមដើម្បីមើលទីតាំងជាក់ស្តែងនៅលើ Google Maps</p>
                            <button
                                class="w-full mt-2 bg-primary hover:bg-primary/90 text-white font-bold py-2 px-4 rounded-lg flex items-center justify-center gap-2 transition-colors">
                                <span>
                                    <a href="https://maps.app.goo.gl/RjiEJnVL4Fz8259v8">មើលផែនទី</a></span>
                                <span class="material-symbols-outlined text-sm">open_in_new</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection