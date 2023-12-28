<form action="{{ route('admin.profile.store') }}" method="POST">
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
    <button class="bg-blue-400 hover:bg-blue-600 font-bold py-2 px-4 rounded" type="submit">Salvar</button>
</form>