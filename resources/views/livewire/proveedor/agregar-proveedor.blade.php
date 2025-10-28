<div>
    {{-- The whole world belongs to you. --}}
    {{-- FORMULARIO --}}

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

            <legend class="badge">AGREGAR PROVEEDOR @svg('heroicon-s-newspaper', 'w-5 h-5')</legend>
            <form wire:submit="saveProveedor">

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
                        <input type="input" class="input" placeholder="Correo eletrónico" wire:model="email" />
                    </div>

                    <div>
                        <label class="label">Dirección</label>
                        <textarea class="textarea" placeholder="Correo electrónico" wire:model="direccion"
                            rows="5"></textarea>
                    </div>
                </div>

                <div class="form-control mt-3">
                    <button type="submit" class="btn btn-warning mt-4">Guardar</button>
                </div>

            </form>



        </fieldset>


    </div>

</div>