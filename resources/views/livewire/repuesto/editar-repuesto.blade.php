<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="border-l-4 border-primary pl-4 flex">

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
            @if (session()->has('message'))
                <div role="alert" class="alert alert-success alert-outline">
                    <span class="flex justify-center">{{ session('message') }}
                        <img src="{{ asset('storage/images/iconsmini/controlar.png') }}"></span>
                </div>
            @endif

            <legend class="badge">EDITAR REPUESTO</legend>

            <form wire:submit.prevent="editRepuestoSuccess">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    <div>
                        <label class="label">Código</label>
                        <input type="text" class="input" placeholder="codigo" wire:model="codigo" />
                        @error('codigo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="label">Nombre</label>
                        <input type="text" class="input" placeholder="nombre" wire:model.live="nombre" />
                        @error('nombre') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="label">Marca</label>
                        <input type="text" class="input" placeholder="marca" wire:model="marca" />
                        @error('marca') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="label">Categoría</label>
                        <select class="select appearance-none" wire:model="categoria_id">
                            <option value="">Seleccionar categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="label">Vehículo</label>
                        <div class="join">
                            <select class="select appearance-none" wire:model="vehiculo_id">
                                <option value="">Agregar vehículo</option>
                                @foreach ($vehiculos as $vehiculo)
                                    <option value="{{ $vehiculo->id }}">
                                        {{ "$vehiculo->marca $vehiculo->modelo $vehiculo->anio"}}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-success join-item">Agregar</button>
                        </div>
                        @error('vehiculo_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                        <fieldset class="border">
                            <legend>Vehículos compatibles</legend>
                            <div class="join">
                                @foreach ($vehiculosCompatibles as $vc)
                                    <p class="badge badge-xs">{{ $vc->marca }}</p>
                                    <a href="#" class="tooltip tooltip-top" data-tip="Eliminar {{ $vc->marca }}">
                                        <img src="{{ asset('storage/images/iconsmini/papelera.png') }}" />
                                    </a>
                                @endforeach
                            </div>
                        </fieldset>
                        
                    </div>

                    <div>
                        <label class="label">Proveedor</label>
                        <select class="select appearance-none" wire:model="proveedor_id">
                            <option value="">Seleccionar proveedor</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                        @error('proveedor_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="label">Precio compra</label>
                        <input type="number" class="input" placeholder="precio compra"
                            wire:model.live="precio_compra" />
                        @error('precio_compra') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="label">Precio venta</label>
                        <input type="number" class="input" placeholder="precio venta" value="{{ $precio_venta }}"
                            wire:model="precio_venta" />
                        <kbd class="kbd kbd-xs">Precio de venta 40% : {{ number_format($precio_venta, 2) }}</kbd>
                        @error('precio_venta') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="label">Cantidad</label>
                        <input type="number" class="input" placeholder="cantidad" wire:model="stock" />
                        @error('stock') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="label">URL</label>
                        <input type="text" class="input" placeholder="URL" wire:model="url" readonly />
                        @error('url') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="label">Descripción</label>
                        <textarea class="textarea" placeholder="descripcion" wire:model="descripcion"
                            rows="4"></textarea>
                        @error('descripcion') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <div>
                            <input type="file" wire:model.live="thumb" accept="image/*">
                            <img src="{{ $thumb instanceof \Illuminate\Http\UploadedFile ? $thumb->temporaryUrl() : ($thumb ? Storage::url($thumb) : asset('storage/images/iconsmini/imagen_default.png')) }}"
                                class="h-40 w-40 object-cover rounded-lg shadow-md" alt="Vista previa" />
                        </div>
                        @error('thumb') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="form-control mt-3">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>

            </form>


        </fieldset>

    </div>

</div>