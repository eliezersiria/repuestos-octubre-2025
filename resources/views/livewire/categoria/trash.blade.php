<div>
    <p class="mb-2 text-sm text-gray-500">
        Tiempo de consulta: {{ $tiempo }} segundos | Filas cargadas: {{ $numeroFilas }}
    </p>
    @if (session()->has('success'))
        <div role="alert" class="alert alert-success alert-outline w-1/2">
            <span class="flex justify-center">
                {{ session('success') }} <img src="{{ asset('storage/images/iconsmini/controlar.png') }}">
            </span>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="overflow-x-auto">

        <p class="mb-3">
            <button class="btn">
                Papelera <div class="badge badge-sm badge-secondary">{{ $numeroFilas }}</div>
            </button>
        </p>

        <div class="border-l-4 border-red-500 pl-4">
            <table class="table-auto table-zebra table-xs">
                <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                        <tr class="hover:bg-base-300">
                            <th>{{ $categoria->id }}</th>
                            <td>{{ $categoria->nombre }}</td>
                            <td>
                                <div class="tooltip tooltip-left" data-tip="Restaurar">
                                    <button type="button" class="btn btn-soft btn-xs"
                                        wire:click="restore({{ $categoria->id }})">
                                        <img src="{{ asset('storage/images/iconsmini/flecha-de-bucle.png') }}" />
                                    </button>
                                </div>
                            </td>
                            <td>
                                <div class="tooltip tooltip-left" data-tip="Destruir">
                                    <button type="button" class="btn btn-soft btn-xs"
                                    wire:click="abrirModalForceDelete({{ $categoria->id }}, '{{ $categoria->nombre }}')">
                                        <img src="{{ asset('storage/images/iconsmini/fuego.png') }}" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal para confirmar forceDelete -->
        <div>
            {{-- Modal de confirmación forceDelete --}}
            @if($showModalForceDelete)
                <div class="modal modal-open">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">¡Confirmar eliminación! de {{ $catNombre }}</h3>
                        <p class="py-4">¿Desea destruir esta categoría?</p>
                        <div class="modal-action">
                            <button wire:click="forceDelete({{ $idSeleccionado }})" class="btn btn-error">Eliminar</button>
                            <button wire:click="closeModalForceDelete" class="btn">Cancelar</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>


    </div>


</div>