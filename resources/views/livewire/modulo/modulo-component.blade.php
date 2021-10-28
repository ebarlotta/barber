<div>
    <div class="content-center flex">
        <div class="bg-red-300 p-2 text-center rounded-lg shadow-lg w-full flex flex-wrap justify-center">
            @foreach ($modulos as $modulo)
                <a href="{{ route($modulo->pagina) }}" class="transform transition duration-500 hover:scale-110 ">
                    <div class="bg-gray-200 p-2 text-center rounded-lg shadow-lg w-56 h-56 m-1">
                        <h1 class="mt-3">{{ $modulo->name }}</h1>
                        <p class="relative -bottom-11 left-0">
                            {{ $modulo->leyenda }}
                        </p>
                        <img class="rounded-md w-full h-40 mt-3" src="{{ asset('images/'. $modulo->imagen) }}" width="200px" height="155px">
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
