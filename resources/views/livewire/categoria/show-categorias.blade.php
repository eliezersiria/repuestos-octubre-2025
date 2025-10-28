<div>

    @if (session()->has('success'))
        <div role="alert" class="alert alert-success alert-outline w-1/2">
            <span class="flex justify-center">
                {{ session('success') }} <img src="{{ asset('storage/images/iconsmini/controlar.png') }}">
            </span>
        </div>
    @endif

    @if (session()->has('error'))
        <div role="alert" class="alert alert-error alert-outline">
            {{ session('error') }}
        </div>
    @endif

    <div class="overflow-x-auto">

        @if(!$editMode)
            <!-- Tabla -->
            <p class="mb-2 text-sm text-gray-500">
                Tiempo de consulta: {{ $tiempo }} segundos | Filas cargadas: {{ $numeroFilas }}
            </p>

            <p class="mb-3">
                <button class="btn">
                    Categorías <div class="badge badge-sm badge-secondary">{{ $numeroFilas }}</div>
                </button>
            </p>

            <div class="border-l-4 border-primary pl-4">
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
                                    <div class="tooltip tooltip-left" data-tip="Editar">
                                        <button type="button" class="btn btn-soft btn-xs"
                                            wire:click="edit({{ $categoria->id }})" wire:loading.class="btn-disabled"
                                            wire:target="edit({{ $categoria->id }})">
                                            <img src="{{ asset('storage/images/iconsmini/lapiz.png') }}" />
                                        </button>
                                    </div>
                                    <span wire:loading wire:target="edit({{ $categoria->id }})"
                                        class="loading loading-dots loading-xs"></span>
                                </td>
                                <td>
                                    <div class="tooltip tooltip-left" data-tip="Papelera">
                                        <button type="button" class="btn btn-soft btn-xs"
                                            wire:click="abrirModalEliminar({{ $categoria->id }})"
                                            wire:loading.class="btn-disabled"
                                            wire:target="abrirModalEliminar({{ $categoria->id }})">
                                            <img src="{{ asset('storage/images/iconsmini/papelera.png') }}" />
                                        </button>
                                    </div>
                                    <span wire:loading wire:target="abrirModalEliminar({{ $categoria->id }})"
                                        class="loading loading-spinner loading-xs"></span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- 🔽 Enlaces de paginación --}}
            <div class="mt-4 w-1/2">
                {{ $categorias->links() }}
            </div>

        @else
            <!-- Formulario de edición -->
            <div class="border-l-4 border-primary pl-4 w-1/2">
                <h2 class="font-bold mb-2">Editar Categoría</h2>
                <fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-4">
                    <form wire:submit.prevent="update">
                        <input type="text" wire:model="nombre" class="input" />
                        @error('nombre')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror

                        <div class="mt-2 flex gap-2">
                            <!--button  class="btn btn-success" spinner>Actualizar</button-->
                            <button type="submit" class="btn bg-green-700">Guardar</button>
                            <button type="button" wire:click="cancelar" class="btn btn-warning">Cancelar</button>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Actualizado {{ $actualizado->diffForHumans() }}</p>
                        <p class="mt-2 text-sm text-gray-500">El
                            {{ $actualizado->translatedFormat('l d \d\e F \d\e Y h:i a') }}
                        </p>
                    </form>
                </fieldset>
            </div>
        @endif

        <!-- Modal para confirmar enviar a la papelera -->
        <div>
            {{-- Modal de confirmación con DaisyUI --}}
            @if($showModal)
                <div class="modal modal-open">
                    <div class="modal-box">
                        <h3 class="font-bold text-lg">¡Confirmar eliminación! de {{ $nombre }}</h3>
                        <p class="py-4">¿Desea enviar a la papelera esta categoría?</p>
                        <div class="modal-action">
                            <button wire:click="delete" class="btn btn-error">Eliminar</button>
                            <button wire:click="closeModalEliminar" class="btn">Cancelar</button>
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>


</div>