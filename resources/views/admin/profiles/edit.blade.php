<x-app-layout>
<form action="{{ route('admin.profile.update', $data->id) }}" method="POST">
    <div>
        @method('put')
        @include('admin.profiles.form')
    <button class="bg-blue-400 hover:bg-blue-600 font-bold py-2 px-4 rounded" type="submit">Atualizar</button>
</form>
</x-app-layout>
