<x-app-layout>
    <div class="container mx-auto">
        <form action="{{ route('admin.profile.permission.add', $data->id) }}" method="post">
            @csrf
            <label>Selecione pelo menos uma Permissão</label>
            <br>
            <select name="permission_id[]" multiple>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
            <br>
            @include('admin.alerts')
            <button class="bg-red-500 hover:bg-red-700 font-bold py-2 px-4 rounded" type="submit">Atribuir Permissão</button>
        </form>
        <br>
        <br>
        <table class="table table-danger">
            <thead>
                <tr>
                    <th>Permissão</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <form action="{{ route('admin.profile.permission.rmv', [$data->id, $permission->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="bg-red-600 hover:bg-red-800 font-bold py-2 px-4 rounded" type="submit">Desvincular Permissão</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
     </div>
</x-app-layout>
