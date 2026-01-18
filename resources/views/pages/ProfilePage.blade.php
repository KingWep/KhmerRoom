@extends('layouts.LayoutsUser')
@section('content')
    <div class="container mx-auto p-6">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="bg-white shadow rounded-lg p-6 w-full md:w-1/3">
                <div class="flex flex-col items-center">
                    <img src="{{ Auth::user()->profile ? asset('images/' . Auth::user()->profile) : asset('images/default.png') }}"
                        alt="Profile Image" class="w-24 h-24 rounded-full mb-4 object-cover">

                    <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
                    <p class="text-gray-500">{{ Auth::user()->email }}</p>
                    {{-- <p class="text-gray-500 mt-2"><span class="font-medium">Role:</span> {{ ucfirst(Auth::user()->role
                        ?? 'User') }}</p> --}}

                    <a href="#" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Edit Profile
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="w-full mt-2">
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
                            <td class="py-2 font-medium">Role</td>
                            <td class="py-2">{{ ucfirst(Auth::user()->role ?? 'User') }}</td>
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
@endsection