@if ($errors->any())
    <br>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    <br>
@endif

@if (session('message'))
    <br>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
        {{ session('message') }}
    </div>
    <br>
@endif

@if (session('error'))
    <br>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        {{ session('error') }}
    </div>
    <br>
@endif

@if (session('info'))
    <br>
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative">
        {{ session('info') }}
    </div>
    <br>
@endif
