@extends('components.layouts.mainhome')


@section('content')

<div class="relative px-8 md:px-16 lg:px-32 mb-40" id="home">
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
                    href="#"
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
  <div id="features">
    <Container>
      <div class="md:w-2/3 lg:w-1/2">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-secondary">
          <path fill-rule="evenodd" d="M9 4.5a.75.75 0 01.721.544l.813 2.846a3.75 3.75 0 002.576 2.576l2.846.813a.75.75 0 010 1.442l-2.846.813a3.75 3.75 0 00-2.576 2.576l-.813 2.846a.75.75 0 01-1.442 0l-.813-2.846a3.75 3.75 0 00-2.576-2.576l-2.846-.813a.75.75 0 010-1.442l2.846-.813A3.75 3.75 0 007.466 7.89l.813-2.846A.75.75 0 019 4.5zM18 1.5a.75.75 0 01.728.568l.258 1.036c.236.94.97 1.674 1.91 1.91l1.036.258a.75.75 0 010 1.456l-1.036.258c-.94.236-1.674.97-1.91 1.91l-.258 1.036a.75.75 0 01-1.456 0l-.258-1.036a2.625 2.625 0 00-1.91-1.91l-1.036-.258a.75.75 0 010-1.456l1.036-.258a2.625 2.625 0 001.91-1.91l.258-1.036A.75.75 0 0118 1.5zM16.5 15a.75.75 0 01.712.513l.394 1.183c.15.447.5.799.948.948l1.183.395a.75.75 0 010 1.422l-1.183.395c-.447.15-.799.5-.948.948l-.395 1.183a.75.75 0 01-1.422 0l-.395-1.183a1.5 1.5 0 00-.948-.948l-1.183-.395a.75.75 0 010-1.422l1.183-.395c.447-.15.799-.5.948-.948l.395-1.183A.75.75 0 0116.5 15z" clip-rule="evenodd" />
        </svg>
        
        <h2 class="my-8 text-2xl font-bold text-white md:text-4xl">
          Earn rewards while making a difference for the planet.
        </h2>
        <p class="text-gray-600 dark:text-gray-300">Complete tasks, take on challenges, and contribute to a sustainable future—all while earning exciting rewards! With Enviate, every action you take brings real impact to the environment. Start your journey today and turn your efforts into meaningful change!</p>
      </div>

      <main class="grid min-h-screen w-full place-content-center bg-gray-900">
        <div x-data="imageSlider" class="relative mx-auto max-w-2xl overflow-hidden rounded-md bg-gray-100 p-2 sm:p-4">
            <div class="absolute right-5 top-5 z-10 rounded-full bg-gray-600 px-2 text-center text-sm text-white">
                <span x-text="currentIndex"></span>/<span x-text="images.length"></span>
            </div>
    
            <button @click="previous()" class="absolute left-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                <i class="fas fa-chevron-left text-2xl font-bold text-gray-500"></i>
            </button>
    
            <button @click="forward()" class="absolute right-5 top-1/2 z-10 flex h-11 w-11 -translate-y-1/2 items-center justify-center rounded-full bg-gray-100 shadow-md">
                <i class="fas fa-chevron-right text-2xl font-bold text-gray-500"></i>
            </button>
    
            <div class="relative h-80" style="width: 30rem">
                <template x-for="(image, index) in images">
                    <div x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-0">
                        <img :src="image" alt="image" class="rounded-sm" />
                    </div>
                </template>
            </div>
        </div>
    </main>
    
<script>
  document.addEventListener("alpine:init", () => {
    Alpine.data("imageSlider", () => ({
      currentIndex: 1,
      images: [
        "https://unsplash.it/640/425?image=30",
        "https://unsplash.it/640/425?image=40",
        "https://unsplash.it/640/425?image=50",
      ],
      previous() {
        this.currentIndex = this.currentIndex === 1 ? this.images.length : this.currentIndex - 1;
      },
      forward() {
        this.currentIndex = this.currentIndex === this.images.length ? 1 : this.currentIndex + 1;
      },
    }));
});

</script>
    
      
      
      <div
        class="mt-16 grid divide-x divide-y divide-gray-700 overflow-hidden rounded-3xl border border-gray-100border-gray-700 sm:grid-cols-2 lg:grid-cols-4 lg:divide-y-0 xl:grid-cols-4"
      >
        <div class="group relative bg-darkGreen transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
          <div class="relative space-y-8 py-12 p-8">
            <img
              src="https://cdn-icons-png.flaticon.com/512/4341/4341139.png"
              class="w-12"
              width="512"
              height="512"
              alt="burger illustration"
            />
  
            <div class="space-y-2">
              <h5
                class="text-xl font-semibold text-white transition group-hover:text-secondary"
              >
                First feature
              </h5>
              <p class=" text-gray-300">
                Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.
              </p>
            </div>
            <a href="#" class="flex items-center justify-between group-hover:text-secondary">
              <span class="text-sm text-white">Read more</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 -translate-x-4 text-2xl opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100">
                <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z" clip-rule="evenodd" />
              </svg>                
            </a>
          </div>
        </div>
        <div class="group relative bg-darkGreen transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
          <div class="relative space-y-8 py-12 p-8">
            <img
              src="https://cdn-icons-png.flaticon.com/512/4341/4341134.png"
              class="w-12"
              width="512"
              height="512"
              alt="burger illustration"
            />
  
            <div class="space-y-2">
              <h5
                class="text-xl font-semibold text-white transition group-hover:text-secondary"
              >
                Second feature
              </h5>
              <p class=" text-gray-300">
                Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.
              </p>
            </div>
            <a href="#" class="flex items-center justify-between group-hover:text-secondary">
              <span class="text-sm text-white">Read more</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 -translate-x-4 text-2xl opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100">
                <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z" clip-rule="evenodd" />
              </svg>                
            </a>
          </div>
        </div>
        <div class="group relative bg-darkGreen transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10">
          <div class="relative space-y-8 py-12 p-8">
            <img
              src="https://cdn-icons-png.flaticon.com/512/4341/4341160.png"
              class="w-12"
              width="512"
              height="512"
              alt="burger illustration"
            />
  
            <div class="space-y-2">
              <h5
                class="text-xl font-semibold text-white transition group-hover:text-secondary"
              >
                Third feature
              </h5>
              <p class="text-gray-300">
                Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.
              </p>
            </div>
            <a href="#" class="flex items-center justify-between group-hover:text-secondary">
              <span class="text-sm text-white">Read more</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 -translate-x-4 text-2xl opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100">
                <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z" clip-rule="evenodd" />
              </svg>                
            </a>
          </div>
        </div>
        <div
          class="group relative bg-darkGreen transition hover:z-[1] hover:shadow-2xl hover:shadow-gray-600/10"
        >
          <div
            class="relative space-y-8 py-12 p-8 transition duration-300 group-hover:bg-darkGreen"
          >
            <img
              src="https://cdn-icons-png.flaticon.com/512/4341/4341025.png"
              class="w-12"
              width="512"
              height="512"
              alt="burger illustration"
            />
  
            <div class="space-y-2">
              <h5
                class="text-xl font-semibold text-white transition group-hover:text-secondary"
              >
                More features
              </h5>
              <p class="text-gray-300">
                Neque Dolor, fugiat non cum doloribus aperiam voluptates nostrum.
              </p>
            </div>
            <a href="#" class="flex items-center justify-between group-hover:text-secondary">
              <span class="text-sm text-white">Read more</span>
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 -translate-x-4 text-2xl opacity-0 transition duration-300 group-hover:translate-x-0 group-hover:opacity-100">
                <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 011.06 0l7.5 7.5a.75.75 0 010 1.06l-7.5 7.5a.75.75 0 11-1.06-1.06l6.22-6.22H3a.75.75 0 010-1.5h16.19l-6.22-6.22a.75.75 0 010-1.06z" clip-rule="evenodd" />
              </svg>                
            </a>
          </div>
        </div>
      </div>
    </Container>
  </div>
</div>

@endsection