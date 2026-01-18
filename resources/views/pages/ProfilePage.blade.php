@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Profile Card -->
        <div class="bg-white shadow rounded-lg p-6 w-full md:w-1/3">
            <div class="flex flex-col items-center">
                <img src="" 
                     alt="Profile Image" class="w-24 h-24 rounded-full mb-4">
                <h2 class="text-xl font-semibold"></h2>
                <p class="text-gray-500"></p>
                <p class="text-gray-500 mt-2"><span class="font-medium">Role:</span> </p>
                <a href="" 
                   class="mt-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                   Edit Profile
                </a>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="bg-white shadow rounded-lg p-6 w-full md:w-2/3">
            <h3 class="text-lg font-semibold mb-4">Profile Information</h3>
            <table class="table-auto w-full">
                <tbody>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Full Name</td>
                        <td class="py-2"></td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Email</td>
                        <td class="py-2"></td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Role</td>
                        <td class="py-2"></td>
                    </tr>
                    <tr class="border-b">
                        <td class="py-2 font-medium">Status</td>
                        <td class="py-2"></td>
                    </tr>
                    <tr>
                        <td class="py-2 font-medium">Profile Bio</td>
                        <td class="py-2"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
