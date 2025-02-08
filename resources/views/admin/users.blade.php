<!--
=========================================================
* Soft UI Dashboard Tailwind - v1.0.5
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard-tailwind
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->

@extends('admin.app-admin')

@section('content')
<div class="flex flex-wrap -mx-3">
    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Users List</h6>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-center">ID</th>
                                <th class="px-6 py-3 text-center">Username</th>
                                <th class="px-6 py-3 text-center">Email</th>
                                <th class="px-6 py-3 text-center">Level</th>
                                <th class="px-6 py-3 text-center">Leaflets</th>
                                <th class="px-6 py-3 text-center">Crystals</th>
                                <th class="px-6 py-3 text-center">Province</th>
                                <th class="px-6 py-3 text-center">City</th>
                                <th class="px-6 py-3 text-center">Status</th>
                                <th class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-3 text-center">{{ $user->id }}</td>
                                <td class="px-6 py-3 text-center">{{ $user->username ?? '-' }}</td>
                                <td class="px-6 py-3 text-center">{{ $user->email }}</td>
                                <td class="px-6 py-3 text-center">{{ $user->level }}</td>
                                <td class="px-6 py-3 text-center">{{ $user->leaflets }}</td>
                                <td class="px-6 py-3 text-center">{{ $user->crystal }}</td>
                                <td class="px-6 py-3 text-center">{{ $user->province ?? '-' }}</td>
                                <td class="px-6 py-3 text-center">{{ $user->city ?? '-' }}</td>
                                <td class="px-6 py-3 text-center">
                                    <span class="px-3 py-1 text-white rounded-lg {{ $user->status == '1' ? 'bg-darkGreen' : 'bg-red-500' }}">
                                        {{ $user->status == '1' ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-6 py-3">
                                <form action="{{ route('users.toggleStatus', $user->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="">
                                            {{ $user->status == '1' ? 'Deactivated' : 'Activated' }}
                                        </button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if(session('success'))
    <div id="status-alert" class="flex items-center p-4 mb-4 text-white bg-green-500 rounded-lg shadow-lg">
        <svg class="w-5 h-5 mr-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        <span>{{ session('success') }}</span>
    </div>
@endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(() => {
        const alert = document.getElementById('status-alert');
        if (alert) {
            alert.style.transition = "opacity 0.5s";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);
</script>

@endsection
