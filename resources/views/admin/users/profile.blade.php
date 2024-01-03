<x-app-layout>
    <div class="container mx-auto">
        <form action="{{-- route('admin.user.profile.add', $data->id) --}}" method="post">
            @csrf
            <label>Selecione pelo menos um Perfil</label>
            <br>
            <select name="profile_id[]" multiple>
                @foreach ($profiles as $profile)
                    <option value="{{ $profile->id }}">{{ $profile->name }}</option>
                @endforeach
            </select>
            <br>
            @include('admin.alerts')
            <button class="bg-red-500 hover:bg-red-700 font-bold py-2 px-4 rounded" type="submit">Atribuir Perfil</button>
        </form>
        <br>
        <br>
        <table class="table table-danger">
            <thead>
                <tr>
                    <th>Perfil</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->profiles as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
                        <td>
                            <form action="{{ route('admin.user.profile.rmv', [$data->id, $profile->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="bg-red-600 hover:bg-red-800 font-bold py-2 px-4 rounded" type="submit">Desvincular Perfil</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
     </div>
</x-app-layout>
