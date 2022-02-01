<x-app-layout>
    <section class="bg-cover" style="background-image: url({{asset('img/home/code-gff91adccd_1920.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-48">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl">Domina Laravel con los mejores cursos en JetCode</h1>
                <p class="text-white text-lg mt-2 mb-4">En JetCode encontrarás cursos, manuales y artículos sobre Laravel que te ayudarán a convertirte en un prefesional en esta tecnología</p>

                @livewire('search')
            </div>
        </div>
    </section>

    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-10">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/computer-1245714_640.jpg')}}" alt="">
                </figure>

                <header class="mt-4">
                    <h1 class="text-center text-xl text-gray-700 mb-2">Cursos y Proyectos</h1>
                    <p class="text-sm text-gray-500 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam rem distinctio</p>
                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/book-3531412_640.jpg')}}" alt="">
                </figure>

                <header class="mt-4">
                    <h1 class="text-center text-xl text-gray-700 mb-2">Manual de Laravel</h1>
                    <p class="text-sm text-gray-500 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam rem distinctio</p>
                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/blog-2355684_640.jpg')}}" alt="">
                </figure>

                <header class="mt-4">
                    <h1 class="text-center text-xl text-gray-700 mb-2">Blog</h1>
                    <p class="text-sm text-gray-500 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam rem distinctio</p>
                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/laptop-3087585_640.jpg')}}" alt="">
                </figure>

                <header class="mt-4">
                    <h1 class="text-center text-xl text-gray-700 mb-2">Desarrollo Webg</h1>
                    <p class="text-sm text-gray-500 text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam rem distinctio</p>
                </header>
            </article>


        </div>
    </section>

    <section class="mt-24 bg-indigo-500 py-12">
        <h1 class="text-center text-white text-3xl pb-2">¿No sábes que curso llevar?</h1>
        <p class="text-center text-white">Dirígete al catálogo de cursos y fíltralos por categoría o nivel</p>
        <div class="flex justify-center mt-8">
            <a href="{{route('courses.index')}}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition">
                Catálogo de cursos
            </a>
        </div>
    </section>

    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">ÚLTIMOS CURSOS</h1>
        <p class="text-center text-gray-500 text-small mb-6">Trabajo duro para seguir subiendo cursos</p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
                <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
</x-app-layout>
