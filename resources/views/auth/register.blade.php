@extends('components.layouts.mainhome')

@section('content')
<section class="h-full">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-full lg:py-0">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-darkGreen md:text-2xl">
                    Create an account
                </h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input-label for="username" class="block mb-2 text-sm font-medium text-gray-900" :value="__('Username')" />
                        <x-text-input id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Your username" type="text" name="username" :value="old('username')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" class="block mb-2 text-sm font-medium text-gray-900" :value="__('Your Email')" />
                        <x-text-input id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="example@gmail.com" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" class="block mb-2 text-sm font-medium text-gray-900" :value="__('Password')" />

                        <x-text-input id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="••••••••"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class=" hover:underline text-sm text-gray-600" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
                </section>
                        @endsection
