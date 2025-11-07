<div>



    <p class="mb-2 text-sm text-gray-500">
        Tiempo de consulta: {{ $tiempo }} segundos | Filas cargadas: {{ $numeroFilas }}
    </p>

    <div class="overflow-x-auto">
        {{-- 🔍 Cuadro de búsqueda --}}
        <div class="flex items-center">
            <input type="text" class="input" placeholder="Buscar repuesto..." wire:model.live.debounce.300ms="search" />

            <h2 class="font-semibold">Listado de Repuestos</h2>
        </div>
        <!-- Tabla -->

        <table class="table-auto table-xs table-zebra">
            <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Precios</th>
                    <th>Marca</th>
                    <th>URL</th>
                    <th>Vehículos Compatibles</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($repuestos as $repuesto)
                    <tr class="hover:bg-base-300">
                        <td>
                            <div class="flex items-center gap-3">
                                <div class="avatar">
                                    <div class="h-12 w-12">
                                        <a href="#"><img src='{{ asset("storage/$repuesto->thumb") }}' />
                                    </div>
                                </div>
                                <div>
                                    <div class="font-bold">
                                        <a href="">{{ $repuesto->nombre }}</a>
                                    </div>
                                    <div class="text-sm opacity-50">
                                        <a href="">{{ $repuesto->codigo }}</a>
                                        <div class="badge badge-neutral">{{ $repuesto->stock }} unidades</div>
                                    </div>
                                </div>
                            </div>
                        </td>

                        <td>
                            <p>Compra: C$ {{ number_format($repuesto->precio_compra) }}</p>
                            <span class="badge badge-ghost badge-sm">Venta:
                                C${{ number_format($repuesto->precio_venta) }}</span>
                        </td>
                        <td>{{ $repuesto->marca }}</td>
                        <td>{{ $repuesto->url }}</td>
                        <td>
                            <div tabindex="0" class="collapse collapse-plus border border-base-300 bg-base-100">
                                <div class="collapse-title">
                                    Vehículos Compatibles
                                </div>
                                <div class="collapse-content">

                                    @if($repuesto->vehiculos->isNotEmpty())
                                        <ul>
                                            @foreach($repuesto->vehiculos as $vehiculo)
                                                <li>{{ $vehiculo->marca }} {{ $vehiculo->modelo }}
                                                    <small class="text-muted">({{ $vehiculo->anio }})</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="text-muted">Ninguno</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('repuesto.editar', $repuesto->id) }}" wire:navigate
                                class="btn btn-xs bg-green-700 hover:bg-green-600 text-white px-2 py-1 text-xs">
                                <x-heroicon-o-pencil class="w-3 h-3" />
                                Editar
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- 🔽 Enlaces de paginación --}}
        <div class="mt-4">
            {{ $repuestos->links() }}
        </div>
    </div>

</div>