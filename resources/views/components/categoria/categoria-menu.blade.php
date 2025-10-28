<div class="navbar shadow-sm">

    <div class="navbar-center">
        <div role="alert" class="alert alert-vertical sm:alert-horizontal">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="stroke-info h-6 w-6 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>Módulo de Categorías</span>
        </div>
    </div>

    <div class="navbar-center flex gap-4">

        <a href="{{ route('categoria.crear')}}"
            class="{{ Route::is('categoria.crear') ? 'btn btn-primary' : 'btn btn-soft' }}" wire:navigate>
            <img src="{{ asset('storage/images/iconsmini/agregar.png') }}" />
            Agregar Categoría
        </a>

        <a href="{{ route('categoria.show')}}"
            class="{{ Route::is('categoria.show') ? 'btn btn-primary' : 'btn btn-soft' }}" wire:navigate>
            <img src="{{ asset('storage/images/iconsmini/portapapeles.png') }}" />
            Ver Categorías
        </a>

        <a href="{{ route('categoria.trash')}}"
            class="{{ Route::is('categoria.trash') ? 'btn btn-primary' : 'btn btn-soft' }}" wire:navigate>
            <img src="{{ asset('storage/images/iconsmini/basura.png') }}" />
            Papelera
        </a>

    </div>
    <div class="navbar-end">

    </div>
</div>