<x-app-layout>
<form action="{{ route('admin.user.store') }}" method="POST">
    @include('admin.users.form')
    <button class="bg-blue-400 hover:bg-blue-600 font-bold py-2 px-4 rounded" type="submit">Salvar</button>
</form>
</x-app-layout>
