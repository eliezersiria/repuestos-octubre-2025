<div>

    <div class="border-l-4 border-primary pl-4 flex">

        <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">

            @if ($errors->any())
                <div role="alert" class="alert alert-error alert-outline">
                    <ul class="text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session()->has('message'))
                <div role="alert" class="alert alert-success alert-outline">
                    <span class="flex justify-center">{{ session('message') }}
                        <img src="{{ asset('storage/images/iconsmini/controlar.png') }}"></span>
                </div>
            @endif

            <legend class="badge">AGREGAR REPUESTO @svg('heroicon-s-newspaper', 'w-5 h-5')</legend>

            <form wire:submit="saveRepuesto">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    <div>
                        <label class="label">Código</label>
                        <input type="text" class="input" placeholder="codigo" wire:model="codigo" />
                    </div>

                    <div>
                        <label class="label">Nombre</label>
                        <input type="text" class="input" placeholder="nombre" wire:model.live="nombre" />
                    </div>

                    <div>
                        <label class="label">Marca</label>
                        <input type="text" class="input" placeholder="marca" wire:model="marca" />
                    </div>

                    <div>
                        <label class="label">Categoría</label>
                        <select class="select appearance-none" wire:model="categoria_id">
                            <option disabled selected>Seleccionar categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="label">Vehículo</label>
                        <select class="select appearance-none" wire:model="vehiculo_id">
                            <option disabled selected>Seleccionar vehículo</option>
                            @foreach ($vehiculos as $vehiculo)
                                <option value="{{ $vehiculo->id }}">
                                    {{ "$vehiculo->marca $vehiculo->modelo $vehiculo->anio"}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="label">Proveedor</label>
                        <select class="select appearance-none" wire:model="proveedor_id">
                            <option disabled selected>Seleccionar proveedor</option>
                            @foreach ($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="label">Precio compra</label>
                        <input type="number" class="input" placeholder="precio compra"
                            wire:model.live="precio_compra" />
                    </div>

                    <div>
                        <label class="label">Precio venta</label>
                        <input type="number" class="input" placeholder="precio venta" value="{{ $precio_venta }}"
                            wire:model="precio_venta" />
                        <kbd class="kbd kbd-xs">Precio de venta 40% : {{ number_format($precio_venta, 2) }}</kbd>
                    </div>

                    <div>
                        <label class="label">Cantidad</label>
                        <input type="number" class="input" placeholder="cantidad" wire:model="stock" />
                    </div>

                    <div>
                        <label class="label">Cantidad</label>
                        <input type="text" class="input" placeholder="URL" wire:model="url" readonly />
                    </div>

                    <div>
                        <textarea class="textarea" placeholder="descripcion" wire:model="descripcion"
                            rows="4"></textarea>
                    </div>

                    <div wire:key="file-container-{{ $fileKey }}">
                        <div>
                            <input type="file" wire:model="thumb" accept="image/*">

                            @if ($thumb)
                                <img src="{{ $thumb->temporaryUrl() }}" class="h-40 rounded-lg" />
                            @else
                                <img src="{{ asset('storage/images/parts_default.webp') }}" class="h-40 rounded-lg" />
                            @endif
                        </div>

                    </div>
                </div>

                <div class="form-control mt-3">
                    <button class="btn btn-primary" type="submit">Guardar</button>
                    <a href="{{ route('repuestos') }}" class="btn bg-yellow-600 hover:bg-yellow-700">Regresar</a>
                </div>

            </form>

        </fieldset>

    </div>
</div>