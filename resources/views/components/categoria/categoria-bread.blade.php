<div class="p-4">
    <div class="breadcrumbs text-sm">
        <ul>
            <li>
                <a href="{{ route('home') }}">
                    <x-heroicon-o-folder class="h-4 w-4" />
                    Home
                </a>
            </li>

            @if(Route::is('categoria.crear'))
                <li>
                    <a>
                        <x-heroicon-o-document-plus class="h-4 w-4" />
                        Agregar Categoría
                    </a>
                </li>
            @endif

            @if(Route::is('admin.users.*'))
                <li>
                    <a href="{{ route('admin.users.index') }}">
                        <x-heroicon-o-folder class="w-4 h-4" />
                        Usuarios
                    </a>
                </li>
            @endif

            @if(Route::is('admin.users.edit'))
                <li>Editar Usuario</li>
            @endif
        </ul>
    </div>
</div>