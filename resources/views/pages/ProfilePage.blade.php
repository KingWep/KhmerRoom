{{-- @extends('layouts.LayoutsUser')
@section('content')
    <div class="container mx-auto p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="bg-white shadow rounded-lg p-6 w-full md:w-1/3">
                <div class="flex flex-col items-center">
                    <img src="{{ Auth::user()->profile ? asset('images/' . Auth::user()->profile) : asset('images/default.png') }}"
                        alt="Profile Image" class="w-24 h-24 rounded-full mb-4 object-cover">

                    <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-500">{{ Auth::user()->email }}</p>
                    <a href="#" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Edit Profile
                    </a>
                    <form action="{{ auth()->user()->role =='admin' ? route('admin.logout') : route('user.logout') }}" method="POST" class="w-full mt-2">
                        @csrf
                        <button type="submit"
                            class="w-full px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600 transition-colors">
                            ចាកចេញ (Logout)
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-6 w-full md:w-2/3">
                <h3 class="text-lg font-semibold mb-4">Profile Information</h3>
                <table class="table-auto w-full">
                    <tbody>
                        <tr class="border-b">
                            <td class="py-2 font-medium">Full Name</td>
                            <td class="py-2">{{ Auth::user()->name }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 font-medium">Email</td>
                            <td class="py-2">{{ Auth::user()->email }}</td>
                        </tr>
                        <tr class="border-b">
                            <td class="py-2 font-medium">Account Created</td>
                            <td class="py-2">{{ Auth::user()->created_at->format('d M Y') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection --}}


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
                            
                            <div class="mt-8 space-y-3">
                                <a href="#" class="flex items-center justify-center w-full px-4 py-2.5 bg-blue-600 text-white font-semibold rounded-xl hover:bg-blue-700 transition-all duration-200 shadow-sm">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                    កែសម្រួលព័ត៌មាន
                                </a>
                                
                                <form action="{{ auth()->user()->role =='admin' ? route('admin.logout') : route('user.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="flex items-center justify-center w-full px-4 py-2.5 bg-white text-red-600 font-semibold border border-red-100 rounded-xl hover:bg-red-50 transition-all duration-200">
                                        ចាកចេញពីគណនី
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900">ព័ត៌មានផ្ទាល់ខ្លួន</h3>
                        <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full uppercase tracking-wider">Active</span>
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
                            <p class="text-lg font-semibold text-gray-800">{{ Auth::user()->created_at->format('d M, Y') }}</p>
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
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div>
                        <h4 class="text-blue-900 font-bold">គន្លឹះសុវត្ថិភាព (Security Tip)</h4>
                        <p class="text-blue-700 text-sm mt-1">សូមកុំចែករំលែកពាក្យសម្ងាត់របស់អ្នកជាមួយនរណាម្នាក់ឡើយ។ យើងណែនាំឱ្យអ្នកប្តូរពាក្យសម្ងាត់រៀងរាល់ ៣ ខែម្តង។</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection