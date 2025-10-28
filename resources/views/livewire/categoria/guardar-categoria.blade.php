<div>
    {{-- FORMULARIO --}}

    <div class="border-l-4 border-primary pl-4">

        <form wire:submit.prevent="save">
            <fieldset class="fieldset bg-base-200 border-base-300 rounded-box w-xs border p-4">

                @if ($errors->any())
                    <div role="alert" class="alert alert-error alert-outline">
                        <ul class="text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <legend class="fieldset-legend">AGREGAR CATEGORÍA</legend>

                <label class="label">Categoría</label>
                <input type="text" class="input" placeholder="Categoría" wire:model="nombre" />

                <button type="submit" class="btn btn-neutral mt-4">Guardar</button>
                <!-- Mostrar mensaje de éxito -->
                @if (session()->has('message'))
                    <div role="alert" class="alert alert-success alert-outline">
                        <span>{{ session('message') }}</span>
                    </div>
                @endif
            </fieldset>

        </form>

    </div>

</div>