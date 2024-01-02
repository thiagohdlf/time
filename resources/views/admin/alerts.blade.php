@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (session('message'))
    <div>
        {{ session('message') }}
    </div>
@endif

@if (session('error'))
    <div>
        {{ session('error') }}
    </div>
@endif

@if (session('info'))
    <div>
        {{ session('info') }}
    </div>
@endif
