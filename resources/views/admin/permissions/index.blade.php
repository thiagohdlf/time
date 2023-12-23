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
        @forelse ($data as $permission)
        <tr>
            <td class="border border-gray-100 text-white p-4">
                {{ $permission->name }}
            </td>
            <td class="border border-gray-100 text-white p-4">
                {{ $permission->description }}
            </td>
            <td class="border border-gray-100 text-white p-4">
                <a class="bg-orange-400 hover:bg-orange-600 font-bold py-2 px-4 rounded" href="{{ route('admin.permission.edit', $permission->id) }}">Editar</a>
                <a class="bg-red-400 hover:bg-red-600 font-bold py-2 px-4 rounded" href="{{ route('admin.permission.delete', $permission->id) }}">Apagar</a>
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
 </div>
</x-app-layout>
