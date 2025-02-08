@extends('components.layouts.mainhome')


@section('content')

<div class="relative px-8 md:px-16 lg:px-32 " id="home">
  <div aria-hidden="true" class="absolute inset-0 grid grid-cols-2 -space-x-52 opacity-40 dark:opacity-20">
      <div class="blur-[106px] h-56 bg-gradient-to-br from-lightGreen to-amber-300"></div>
      <div class="blur-[106px] h-32 bg-gradient-to-r from-lightGreen to-amber-300"></div>
  </div> 
  <Container>
      <div class="flex relative ml-auto h-[88vh] justify-center flex-col">
          <div class="lg:w-2/3 text-center mx-auto">
              <h1 class="text-amber-400 text-balance font-bold text-5xl md:text-6xl xl:text-8xl pb-8"><span class="text-amber-400">404</span></h1>
              <span class="text-2xl text-white ">Oops! Page Not Found</span>
              <div class="mt-8 flex flex-wrap justify-center gap-y-4 gap-x-6">
                  <a
                    href="{{ route('login') }}"
                    class="bg-amber-500 rounded-full relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max"
                  >
                    <span class="relative text-base font-semibold text-white"
                      >Back To Home Page</span
                    >
                  </a>
              </div>
          </div>
          
      </div>
  </Container>
</div>

@endsection