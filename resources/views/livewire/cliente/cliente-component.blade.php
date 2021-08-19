<div>
    <x-titulo>Clientes</x-titulo>
    <x-slot name="header">
        <div class="flex">
            <!-- //Comienza en submenu de encabezado -->

            <!-- Navigation Links -->
            @livewire('submenu')
        </div>

    </x-slot>

    <div class="content-center flex">
        <div class="bg-white p-2 text-center rounded-lg shadow-lg w-full">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    @if (session()->has('message'))
                        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                            role="alert">
                            <div class="flex">
                                <div>
                                    <p class="text-xm bg-lightgreen">{{ session('message') }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    <x-crear>Nuevo Cliente</x-crear>
                    @if ($isModalOpen)
                        @include('livewire.cliente.createclientes')
                    @endif
                    <table class="table-fixed table-striped w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2">Nombre del Cliente</th>
                                <th class="px-4 py-2">Dirección</th>
                                <th class="px-4 py-2">Cuil</th>
                                <th class="px-4 py-2">Teléfono</th>
                                <th class="px-4 py-2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($clientes)
                                @foreach ($clientes as $cliente)
                                    <tr>
                                        <td class="border px-4 py-2 text-left">{{ $cliente->name }}</td>
                                        <td class="border px-4 py-2 text-left">{{ $cliente->direccion }}</td>
                                        <td class="border px-4 py-2 text-left">{{ $cliente->cuil }}</td>
                                        <td class="border px-4 py-2 text-left">{{ $cliente->telefono }}</td>
                                        <td class="border px-4 py-2">
                                            <div class="flex justify-center">
                                                <!-- Editar  -->
                                                <x-editar id="{{ $cliente->id }}"></x-editar>
                                                <!-- Eliminar -->
                                                <x-eliminar id="{{ $cliente->id }}"></x-eliminar>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>