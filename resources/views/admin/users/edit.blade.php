<x-app-layout>
    <form action="{{ route('admin.user.store') }}" method="POST">
        <div>
            @csrf
            <label>Nome:</label>
            <input type="text" name="name" wire:model.blur="name">
            <div>
                @error('name') <span class="error">{{ $message }}</span> @enderror
            </div>
            <br>
            <label>Usuário:</label>
            <input type="text" name="email" wire:model.blur="email">
            <div>
                @error('email') <span class="error">{{ $message }}</span> @enderror
            </div>
            <br>
            <label>Senha:</label>
            <input type="password" name="password" wire:model.blur="password">
            <div>
                @error('password') <span class="error">{{ $message }}</span> @enderror
            </div>
            <br>
            <label>Confirmar Senha:</label>
            <input type="password" name="password_confirmation" wire:model.blur="password_confirmation">
            <div>
                @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
            </div>
            <br>
        </div>
        <button class="bg-blue-400 hover:bg-blue-600 font-bold py-2 px-4 rounded" type="submit">Salvar</button>
    </form>
    </x-app-layout>
