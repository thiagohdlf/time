<x-app-layout>
    <form action="{{ route('admin.user.update', $data->id) }}" method="POST">
        @include('admin.users.form')
        @method('put')
        <button class="bg-blue-400 hover:bg-blue-600 font-bold py-2 px-4 rounded" type="submit">Atualizar</button>
    </form>
    </x-app-layout>
