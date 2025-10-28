<div>

    <div class="overflow-x-auto">

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
                Papelera de Reciclaje Proveedores <div class="badge badge-sm badge-secondary">{{ $numeroFilas }}</div>
            </button>
        </p>
        <!-- Tabla -->
        <div class="border-l-4 border-red-500 pl-4">
            <table class="table-auto table-xs table-zebra">
                <thead>
                    <tr>
                        <th></th>
                        <th>Proveedor</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Restaurar</th>
                        <th>Destruir</th>
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
                            <td>
                                <button class="btn btn-sm bg-green-700 hover:bg-green-600 text-white px-2 py-1 text-xs"
                                    tooltip="Editar" wire:click="restore({{ $proveedor->id }})">
                                    Restaurar
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-sm bg-yellow-700 hover:bg-red-600 text-white px-2 py-1 text-xs"
                                    tooltip="Destruir"
                                    wire:click="abrirModalForceDelete({{ $proveedor->id }}, '{{ $proveedor->nombre }}')">
                                    @svg('heroicon-s-fire', 'w-5 h-5') Destruir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <!-- MODAL DE DESTROY-->
        <!-- MODAL DE ENVIAR A LA PAPELERA-->
        {{-- Modal de confirmación con DaisyUI --}}
        <div>
            @if($showModalForceDelete)
                <div class="modal modal-open">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">¡Confirmar eliminación! de {{ $provNombre }}</h3>
                        <p class="py-4">¿Desea destruir este Proveedor?</p>
                        <div class="modal-action">
                            <button wire:click="forceDelete({{ $proveedor_id }})" class="btn btn-error">Eliminar</button>
                            <button wire:click="closeModalForceDelete" class="btn">Cancelar</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>



    </div>

</div>