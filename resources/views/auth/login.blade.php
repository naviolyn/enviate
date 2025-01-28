@extends('components.layouts.mainhome')

@section('content')
<section class="h-full">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-full lg:py-0">
        <div class="w-full bg-white backdrop-blur-xl rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-darkGreen md:text-2xl">
                    Login
                </h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Your Email')" class="mb-2"/>
                        <x-text-input id="email" type="email" name="email" :value="old('email')" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required autofocus />
                        <x-input-error :messages="$errors->get('email')" />
                    </div>
                    
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" class="mb-2"/>
                        <x-text-input id="password" type="password" name="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " required />
                        <x-input-error :messages="$errors->get('password')" />
                    </div>
                    
                    <!-- Remember Me -->
                    <div class="mt-4 flex items-center align-middle">
                        <label for="remember_me" >
                            <input id="remember_me" type="checkbox" name="remember" class="rounded-full mb-1 w-3 h-3">
                            <span class="mb-1">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div class="mt-4 flex items-center justify-between">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="underline text-sm">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button>
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>

                    <br><p class="text-sm font-light text-gray-500">
                        Don’t have an account yet? <a href="/register" class="font-medium text-primary-600 hover:underline ">Sign up</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

