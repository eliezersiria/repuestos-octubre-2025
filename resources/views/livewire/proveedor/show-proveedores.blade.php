<div>
    <div class="overflow-x-auto">
        @if(!$editMode)
            <p class="mb-2 text-sm text-gray-500">
                Tiempo de consulta: {{ $tiempo }} segundos | Filas cargadas: {{ $numeroFilas }}
            </p>

            @if (session()->has('success'))
                <div role="alert" class="alert alert-success alert-outline">
                    <span class="flex justify-center">{{ session('success') }}
                        <img src="{{ asset('storage/images/iconsmini/controlar.png') }}"></span>
                </div>
            @endif

            <p class="mb-3">
                <button class="btn">
                    Proveedores <div class="badge badge-sm badge-secondary">{{ $numeroFilas }}</div>
                </button>
            </p>
            <!-- Tabla -->
            <div class="border-l-4 border-primary pl-4">
                <table class="table-auto table-xs table-zebra">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Proveedor</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Creado</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proveedores as $proveedor)
                            <tr class="hover:bg-base-300">
                                <td>{{ $proveedor->id }}</td>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>{{ $proveedor->telefono }}</td>
                                <td>{{ $proveedor->email }}</td>
                                <td>{{ Str::limit($proveedor->direccion, 15, '...') }}</td>
                                <td>{{ $proveedor->created_at->translatedFormat('l d \d\e F \d\e Y h:i a') }}</td>
                                <td>
                                    <button class="btn btn-sm bg-green-700 hover:bg-green-600 text-white px-2 py-1 text-xs"
                                        tooltip="Editar" wire:click="edit({{ $proveedor->id }})">
                                        @svg('heroicon-s-pencil-square', 'w-5 h-5') Editar
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-sm bg-yellow-700 hover:bg-red-600 text-white px-2 py-1 text-xs"
                                        tooltip="Enviar a la Papelera" wire:click="sendTrash({{ $proveedor->id }})">
                                        @svg('heroicon-s-trash', 'w-5 h-5') Enviar a la Papelera
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @else
            <!-- Formulario de edición -->

            <div class="p-4 rounded flex">

                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">

                    @if (session()->has('update-success'))
                        <div role="alert" class="alert alert-success alert-outline">
                            <span class="flex justify-center">{{ session('update-success') }}
                                <img src="{{ asset('storage/images/iconsmini/controlar.png') }}"></span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div role="alert" class="alert alert-error alert-outline">
                            <ul class="text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-control mb-3">

                        <a href="{{route('proveedores.show')}}" wire:navigate class="btn btn-info">
                            @svg('heroicon-s-arrow-left', 'w-5 h-5') Regresar
                        </a>

                    </div>

                    <legend class="text-xl">Editar Proveedor</legend>

                    <form wire:submit="updateProveedor">

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                            <div>
                                <label class="label">Nombre del Proveedor</label>
                                <input type="text" class="input" placeholder="Nombre" wire:model="nombre" />
                            </div>

                            <div>
                                <label class="label">Teléfono</label>
                                <input type="number" class="input" placeholder="Nombre" wire:model="telefono" />
                            </div>

                            <div>
                                <label class="label">Email</label>
                                <input type="input" class="input" placeholder="Correo eletrónico" wire:model="email"
                                    disabled />
                            </div>

                            <div>
                                <label class="label">Dirección</label>
                                <textarea class="textarea" placeholder="Correo electrónico" wire:model="direccion"
                                    rows="5"></textarea>
                            </div>

                        </div>

                        <div class="form-control mt-3">

                            <button type="submit" class="btn bg-green-700 hover:bg-green-600">
                                @svg('heroicon-s-check-circle', 'w-5 h-5') Actualizar
                            </button>

                        </div>

                        <div>
                            @error('nombre')
                                <div class="text-red-500 text-sm">{{ $message }}</div>
                            @enderror

                            <p class="mt-2 text-sm text-gray-500">Actualizado {{ $actualizado->diffForHumans() }}</p>
                            <p class="mt-2 text-sm text-gray-500">El
                                {{ $actualizado->translatedFormat('l d \d\e F \d\e Y h:i a') }}
                            </p>

                        </div>

                    </form>

                </fieldset>
            </div>
        @endif

        <!-- MODAL DE ENVIAR A LA PAPELERA-->
        {{-- Modal de confirmación con DaisyUI --}}
        <div>
            @if($showModalSendTrash)
                <div class="modal modal-open">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">¡Confirmar eliminación! de {{ $nombre }}</h3>
                        <p class="py-4">¿Desea enviar a la papelera este Proveedor?</p>
                        <div class="modal-action">
                            <button wire:click="delete" class="btn btn-error">Eliminar</button>
                            <button wire:click="closeModalSendTrash" class="btn">Cancelar</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>





    </div><!-- Div Overflow -->



</div>