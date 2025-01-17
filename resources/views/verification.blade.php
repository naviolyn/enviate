@extends('components.layouts.mainhome')


@section('content')
<section class="bg-white h-full">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 h-full">
        <div class="mx-auto max-w-screen-md sm:text-center text-center items-center h-full align-middle flex flex-col justify-center">
            <h2 class="mb-4 text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">Verify your email address.</h2>
            <p class="mx-auto mb-8 max-w-2xl font-light text-gray-500 md:mb-12 sm:text-xl">Thanks for signing up! Before getting started, could you verify your email address clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
            <form action="#">
                <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                    <a href="#" class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100">
                        Resend Verification Email
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            Sign out
                        </button>
                    </form> 
                </div>
                
                
            </form>
            <div class="mx-auto max-w-screen-sm text-sm text-gray-500 newsletter-form-footer text-center">We care about the protection of your data. <br><a href="#" class="font-medium text-primary-600 hover:underline">Read our Privacy Policy</a>.</div>
        </div>
    </div>
  </section>
@endsection