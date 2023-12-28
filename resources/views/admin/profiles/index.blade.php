<x-app-layout>
<div class="container mx-auto min-h-screen p-8 bg-white rounded shadow">
    <table class="table-auto w-full border-collapse bg-black border border-gray-800">
      <thead>
        <tr>
          <th class="border border-gray-100 text-white p-4">Nome</th>
          <th class="border border-gray-100 text-white p-4">Descrição</th>
          <th class="border border-gray-100 text-white p-4">Ações</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($data as $profile)
        <tr>
            <td class="border border-gray-100 text-white p-4">
                {{ $profile->name }}
            </td>
            <td class="border border-gray-100 text-white p-4">
                {{ $profile->description }}
            </td>
            <td class="border border-gray-100 text-white p-4">
                <div class="flex">
                    <a class="bg-orange-400 hover:bg-orange-600 font-bold py-2 px-4 mr-2 rounded" href="{{ route('admin.profile.edit', $profile->id) }}">Editar</a>
                    <form action="{{ route('admin.profile.delete', $profile->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="bg-red-400 hover:bg-red-600 font-bold py-2 px-4 rounded">Apagar</button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
            <tr>
                <td class="border border-gray-800 p-4">
                    Não existem permissões cadastrados!
                </td>
            </tr>
        @endforelse
      </tbody>
    </table>
    <br>
    <br>
    <a class="bg-green-400 hover:bg-green-600 font-bold py-2 px-4 rounded" href="{{ route('admin.profile.create') }}">Cadastrar</a>
 </div>
</x-app-layout>
