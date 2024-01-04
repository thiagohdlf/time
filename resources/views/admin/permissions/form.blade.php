<div>
    @csrf
    <label>Nome:</label>
    <input type="text" name="name" wire:model.blur="name" value="{{ $data->name ?? old('name') }}"
    <div>
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
    <br>
    <label>Descrição:</label>
    <input type="text" name="description" wire:model.blur="description" value="{{ $data->description ?? old('description') }}">
    <div>
        @error('description') <span class="error">{{ $message }}</span> @enderror
    </div>
</div>
