<div>
    @csrf
    <label>Nome:</label>
    <input type="text" name="name" wire:model.blur="name">
    <div>
        @error('name') <span class="error">{{ $message }}</span> @enderror
    </div>
    <br>
    <label>Descrição:</label>
    <input type="text" name="description" wire:model.blur="description">
    <div>
        @error('description') <span class="error">{{ $message }}</span> @enderror
    </div>
</div>
