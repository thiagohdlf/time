<x-app-layout>
<div class="container mx-auto min-h-screen p-8 bg-white rounded shadow">
    <table class="table-auto w-full border-collapse bg-black border border-gray-800">
      <thead>
        <tr>
          <th class="border border-gray-100 text-white p-4">Nome</th>
          <th class="border border-gray-100 text-white p-4">Usuário</th>
          <th class="border border-gray-100 text-white p-4">Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $user)
        <tr>
            <td class="border border-gray-100 text-white p-4">
                {{ $user->name }}
            </td>
            <td class="border border-gray-100 text-white p-4">
                {{ $user->email }}
            </td>
            <td class="border border-gray-100 text-white p-4">
                <div class="flex">
                    <form action="{{ route('admin.user.delete', $user->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="bg-red-400 hover:bg-red-600 font-bold py-2 px-4 rounded">Apagar</button>
                    </form>
                    @can('edit-user')
                        <a class="bg-orange-400 hover:bg-orange-600 font-bold py-2 px-4 mr-2 rounded" href="{{ route('admin.user.edit', $user->id) }}">Editar</a>
                    @endcan

                    <a class="bg-blue-400 hover:bg-blue-600 font-bold py-2 px-4 mr-2 rounded" href="{{ route('admin.user.profile', $user->id) }}">Atribuir Perfil</a>
                </div>
            </td>
        </tr>
        @empty
            <tr>
                <td class="border border-gray-800 p-4">
                    Não existem usuários cadastrados!
                </td>
            </tr>
        @endforelse
      </tbody>
    </table>
    <br>
    <br>
    <a class="bg-green-400 hover:bg-green-600 font-bold py-2 px-4 rounded" href="{{ route('admin.user.create') }}">Cadastrar</a>
 </div>
</x-app-layout>
