@extends('layout.app')

@section('titulo')
    Contacto
@endsection

@section('contenido')
<section>
    <div class="mx-auto max-w-7xl p-1">
      <div class="flex flex-wrap items-center mx-auto max-w-7xl">
        <div class="w-full lg:max-w-lg lg:w-1/2 rounded-xl">
          <div>
            <div class="relative w-full max-w-lg m-auto">
              <div class="relative">
                <img class="object-cover object-center mx-auto rounded-lg shadow-2xl" alt="hero" src="{{asset('profiles/desarrollador.png')}}">
              </div>
            </div>
          </div>
        </div>
        <div class="flex flex-col items-start mt-12 mb-16 text-left lg:flex-grow lg:w-1/2 lg:pl-6 xl:pl-24 md:mb-0 xl:mt-0">
          <h1 class="mb-8 text-4xl font-bold leading-none tracking-tighter text-neutral-600 md:text-7xl lg:text-5xl">BuceApp es mi primer proyecto con Laravel y Tailwind.</h1>
          <span>Soy José Manuel, desarrollador full-stack.</span>
          <p class="mb-8 text-base leading-relaxed text-left text-gray-500">
            Me defino como una persona inquieta, constante y deportista. Desde que descubrí el desarrollo web supe que quería dedicarme a ello, ya que lo veo como una forma de crear y dar forma a las ideas.
          </p>
          <div class="flex-col mt-0 lg:mt-6 max-w-7xl sm:flex">
            <dl class="grid grid-cols-1 gap-12 md:grid-cols-2">
              <div>
                <dt class="inline-flex items-center justify-center flex-shrink-0 w-12 h-12 mb-5 text-blue-600 rounded-full bg-blue-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                    </svg>
                </dt>
                <dd class="flex-grow">
                  <h2 class="mb-3 text-lg font-medium tracking-tighter text-neutral-600">Linkedin</h2>
                  <p class="text-base leading-relaxed text-gray-400">Puedes contactar conmigo a través de mi perfil de linkedin.</p>
                  <a href="https://www.linkedin.com/in/9jmad3/" class="inline-flex items-center mt-6 font-semibold text-blue-500 md:mb-2 lg:mb-0 hover:text-neutral-600" title="read more">
                    Visitar
                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path>
                    </svg>
                  </a>
                </dd>
              </div>
              {{-- <div>
                <dt class="inline-flex items-center justify-center flex-shrink-0 w-12 h-12 mb-5 text-blue-600 rounded-full bg-blue-50">
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 icon icon-tabler icon-tabler-aperture" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <circle cx="12" cy="12" r="9"></circle>
                    <line x1="3.6" y1="15" x2="14.15" y2="15"></line>
                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(72 12 12)"></line>
                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(144 12 12)"></line>
                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(216 12 12)"></line>
                    <line x1="3.6" y1="15" x2="14.15" y2="15" transform="rotate(288 12 12)"></line>
                  </svg>
                </dt>
                <dd class="flex-grow">
                  <h2 class="mb-3 text-lg font-medium tracking-tighter text-neutral-600">Short title</h2>
                  <p class="text-base leading-relaxed text-gray-400">Explain 2 great feature here. Information about the feature.</p>
                  <a href="#" class="inline-flex items-center mt-6 font-semibold text-blue-500 md:mb-2 lg:mb-0 hover:text-neutral-600" title="read more">
                    Learn More
                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
                      <path fill="none" d="M0 0h24v24H0z"></path>
                      <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path>
                    </svg>
                  </a>
                </dd>
              </div> --}}
            </dl>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
