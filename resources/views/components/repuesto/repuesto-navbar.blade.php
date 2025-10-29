<div class="navbar shadow-sm">

    <div class="flex-1">
        <a class="btn btn-ghost text-xl">
            <x-heroicon-o-wrench-screwdriver class="w-6 h-6" />
            Repuestos Leones
        </a>
        <a href="{{ route('categoria') }}" wire:navigate class="btn btn-ghost">Categorías</a>
        <a href="{{ route('proveedores') }}" wire:navigate class="btn btn-ghost">Proveedores</a>
        <a href="{{ route('repuestos') }}" wire:navigate class="btn btn-primary">Repuestos</a>
    </div>

    <div class="flex flex-1 justify-center">

        <label class="input">
            <x-heroicon-o-magnifying-glass class="w-4 h-4" />
            <input type="text" placeholder="Buscar" class="w-full max-w-md" />
        </label>

        <button class="btn btn-neutral join-item">
            <x-heroicon-o-magnifying-glass class="w-4 h-4" />
        </button>


        <div class="navbar-end">

            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img alt="Tailwind CSS Navbar component"
                            src="https://img.daisyui.com/images/stock/photo-1534528741775-53994a69daeb.webp" />
                    </div>
                </div>
                <ul tabindex="-1"
                    class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                    <li>
                        <a class="justify-between">
                            Profile
                            <span class="badge">New</span>
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a><x-heroicon-o-magnifying-glass class="w-3 h-3" /> Logout</a></li>
                </ul>
            </div>
        </div>

    </div>
</div>