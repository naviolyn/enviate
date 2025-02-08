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
              <h1 class="text-gray-900 text-balance dark:text-white font-bold text-5xl md:text-6xl xl:text-7xl">Act,  <span class="text-white">Earn Rewards, </span><span class="text-amber-400">Save the World!</span></h1>
              <p class="mt-8 text-gray-700 dark:text-gray-300">The innovative platform that transforms your daily activities into real environmental action! </p>
              <div class="mt-16 flex flex-wrap justify-center gap-y-4 gap-x-6">
                  <a
                    href="{{ route('login') }}"
                    class="bg-amber-500 rounded-full relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max"
                  >
                    <span class="relative text-base font-semibold text-white"
                      >Get started</span
                    >
                  </a>
                  <a
                    href="#feature"
                    class="border border-1 border-amber-500 rounded-full relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:border before:border-transparent before:bg-primary/10 before:bg-gradient-to-b before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max"
                  >
                    <span
                      class="relative text-base font-semibold text-amber-500"
                      >Learn more</span
                    >
                  </a>
              </div>
          </div>
          
      </div>
  </Container>
  <section class="" id="feature">
    <div class="gap-8 items-center py-8 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-6 sm:py-16">
        <img class="w-full rounded-xl col-span-4" src="{{ asset('img/today-task.png') }}" alt="dashboard image">
        <div class="mt-4 md:mt-0 col-span-2">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Make every task meaningful and <span class=" text-amber-400">impactful</span> for the environment!</h2>
            <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">Sign up, complete challenges, and earn rewards!</p>
        </div>
    </div>

    <div class="gap-8 items-center py-8 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-6 sm:py-16">
      <div class=" col-span-2 mt-4 md:mt-0">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Unlock exclusive items and special rewards with <span class=" text-amber-400">Leaflets & Crystals!</span></h2>
        <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">Collect achievement badges and showcase your dedication to sustainability! The more good actions you take, the more rewards you unlock.</p>
      </div>
      <img class="w-full rounded-xl col-span-4" src="{{ asset('img/today-task.png') }}" alt="dashboard image">
  </div>
  
  </section>


  <section class="h-[50vh] flex flex-col justify-center align-middle">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="mx-auto max-w-screen-sm text-center">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold leading-tight text-gray-900 dark:text-white">Join us and be part of the sustainability movement!</h2>
            <p class="mb-6 font-light text-gray-500 dark:text-gray-400 md:text-lg">We’re here to help you start your sustainability journey!</p>
            <a
                    href="{{ route('login') }}"
                    class="bg-amber-500 rounded-full relative flex h-11 w-full items-center justify-center px-6 before:absolute before:inset-0 before:rounded-full before:bg-primary before:transition before:duration-300 hover:before:scale-105 active:duration-75 active:before:scale-95 sm:w-max mx-auto"
                  >
                    <span class="relative text-base font-semibold text-white"
                      >Get started</span
                    >
                  </a>
        </div>
    </div>
</section>
</div>

@endsection