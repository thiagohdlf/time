<div>
    @csrf
    <label>Nome:</label>
    <input type="text" name="name" wire:model.blur="name" value="{{ $data->name ?? old('name') }}">
    <div>
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
    <br>
    <label>Usuário:</label>
    <input type="text" name="email" wire:model.blur="email" value="{{ $data->email ?? old('email') }}">
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
