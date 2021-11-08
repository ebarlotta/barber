<div>
	<x-titulo>Gestión de Productos</x-titulo>
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
						<div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
							<div class="flex">
								<div>
									<p class="text-xm bg-lightgreen">{{ session('message') }}</p>
								</div>
							</div>
						</div>
					@endif
					@if ($seleccionado)
					<div class="text-left">
						<button wire:click="mostrarmodal()"	class="bg-green-300 hover:bg-green-400 text-white-900 font-bold py-2 px-4 rounded">
							Agregar Producto
						</button>
					</div>
					@endif
				</div>


				@if ($isModalOpen)
					{{-- @include('livewire.producto.createproductos') --}}
					<x-producto>
						<form>
							<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 flex flex-wrap">
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese Nombre" wire:model="name">
									@error('name') <span class="text-red-500">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese Descripción" wire:model="descripcion">
									@error('descripcion') <span class="text-red-500">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Precio de compra</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese precio de compra" wire:model="precio_compra">
									@error('precio_compra') <span class="text-red-500">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1"
											class="block text-gray-700 text-sm font-bold mb-2">Existencia</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese existencia" wire:model="existencia">
									@error('existencia') <span class="text-red-500">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Stock Mínimo</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese stock_minimo" wire:model="stock_minimo">
									@error('stock_minimo') <span class="text-red-500">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Lote</label>
									<input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
											id="exampleFormControlInput1" placeholder="Ingrese lote" wire:model="lote">
									@error('lote') <span class="text-red-500">{{ $message }}</span>@enderror
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Unidad</label>
									@if($unidades)
										<select wire:model="unidads_id" class="rounded">
											@foreach ($unidades as $unidad)
												<option value="{{$unidad->id}}">{{$unidad->name}}</option>
											@endforeach
										</select>
										@error('unidads_id') <span class="text-red-500">{{ $message }}</span>@enderror
									@endif
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Categoría</label>
									@if($categoria_productos)
										<select wire:model="categoriaproductos_id" class="rounded">
											@foreach ($categoria_productos as $categoria)
												<option value="{{$categoria->id}}">{{$categoria->name}}</option>
											@endforeach
										</select>
										@error('categoriaproductos_id') <span class="text-red-500">{{ $message }}</span>@enderror
									@endif
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Proveedor</label>
									@if($proveedores)
										<select wire:model="proveedor_id" class="rounded">
											@foreach ($proveedores as $proveedor)
												<option value="{{$proveedor->id}}">{{$proveedor->name}}</option>
											@endforeach
										</select>
										@error('proveedor_id') <span class="text-red-500">{{ $message }}</span>@enderror
									@endif
								</div>
								<div class="mb-4 mr-2 text-left">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Estado</label>
									@if($estados)
										<select wire:model="estados_id" class="rounded">
											@foreach ($estados as $estado)
												<option value="{{$estado->id}}">{{$estado->name}}</option>
											@endforeach
										</select>
										@error('estados_id') <span class="text-red-500">{{ $message }}</span>@enderror
									@endif
								</div>
								<div class="mb-4 mr-2 text-left flex">
									<label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Imágen</label>
									@if($this->ruta != 'sin_imagen.jpg')
										<img src="{{ asset('images/'. $this->ruta )}}" width="100px" height="100px">
										<input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"	id="exampleFormControlInput1" placeholder="Ingrese imágen" wire:model="ruta">										
										@error('ruta') <span class="text-red-500">{{ $message }}</span>@enderror
									@else
										<img src="{{ asset('images/sin_imagen.jpg' )}}" width="100px" height="100px">
										<input type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"	id="exampleFormControlInput1" placeholder="Ingrese imágen" wire:model="ruta">										
										@error('ruta') <span class="text-red-500">{{ $message }}</span>@enderror
									@endif
								</div>
							</div>
							<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse mr-5">
								<x-guardar></x-guardar>
								<x-cerrar></x-cerrar>
							</div>
					</form>
					</x-producto>
				@endif	

				@if ($productos)
				<div class="flex">
					<div class="h-full">
						<div class="bg-white rounded-b pt-4 pl-4 flex justify-between leading-normal">
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36">Productos</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36">Existencia</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36">Stock Mínimo</div>
							<div class="text-black font-bold text-lg mb-2 leading-tight w-36">Estado</div>
						</div>
						@foreach ($productos as $producto)
							<ul>
								<li class="border text-left" wire:click="edit({{ $producto->id }})">
									<div class="w-full">
										<div class="flex rounded overflow-hidden border">
											@if($producto->ruta != 'sin_imagen.jpg') 
												<img class="block rounded-md flex-none bg-cover" src="{{ asset('images/'. $producto->ruta) }}" style="width:80px; height: 80px;">	
											@else
												<img class="block rounded-md flex-none bg-cover" src="{{ asset('images/sin_imagen.jpg') }}" style="width:80px; height: 80px;">
											@endif
											<div class="bg-white rounded-b pt-4 pl-4 flex justify-between leading-normal w-full">
												<div class="text-black font-bold text-lg mb-2 leading-tight" style="width:50%;">{{ $producto->name }}</div>
												<div class="text-black text-lg mb-2 leading-tight w-1/6 w-auto">{{ $producto->existencia }}</div>
												<div class="text-black text-lg mb-2 leading-tight w-1/6">{{ $producto->stock_minimo }}</div>
												<div class="text-black text-lg mb-2 leading-tight w-1/6">{{ $producto->estados_id}}</div>
											</div>
										</div>
									</div>
								</li>
							</ul>
						@endforeach
						<div class="w-full">{{ $productos->links() }}</div>
					</div>
				</div>
				@else
					<h1>No hay datos</h1>
				@endif
			</div>
		</div>
	</div>
</div>