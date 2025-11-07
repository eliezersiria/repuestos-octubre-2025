<div>
    <div class="min-h-screen flex items-center justify-center bg-base-200">
        <div class="card w-96 bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title justify-center mb-4">Iniciar sesión</h2>

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
                    <div role="alert" class="alert alert-error alert-outline">
                        <span>{{ session('message') }}</span>
                    </div>
                @endif

                <form wire:submit.prevent="login" class="space-y-4">
                    @csrf
                    <div class="form-control mb-3">
                        <label class="label">
                            <span class="label-text">Correo electrónico</span>
                        </label>
                        <label class="input">
                            <x-heroicon-o-user class="w-4 h-4" />
                            <input type="email" wire:model="email" required />
                        </label>
                    </div>

                    <div class="form-control mb-4">
                        <label class="label">
                            <span class="label-text">Contraseña</span>
                        </label>
                        <label class="input">
                            <x-heroicon-o-key class="w-4 h-4" />
                            <input type="password" wire:model="password" required />
                        </label>
                    </div>

                    <div class="form-control">
                        <button type="submit" class="btn btn-primary btn-sm w-full" wire:loading.attr="disabled">
                            <span wire:loading class="loading loading-spinner mr-2"></span>
                            <span>Ingresar</span>
                        </button>
                    </div>
                </form>

                <div class="divider"></div>
                <p class="text-center text-sm">¿Olvidaste tu contraseña?
                    <a href="#" class="link link-primary">Recuperar</a>
                    <x-login.login-tiempo-carga />
            </div>
        </div>
    </div>
</div>