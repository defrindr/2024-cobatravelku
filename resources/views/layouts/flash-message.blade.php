@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if (session('errors'))
    <div class="alert alert-danger">
        {{session('errors')}}
        @foreach (session('errors') as $error)
            {{ $error }}
        @endforeach
    </div>
@endif
