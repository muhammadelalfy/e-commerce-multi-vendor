
@if (session()->has($type))
    <div class="alert alert-{{$type}}" role="alert">
        {{ session()->get($type) }}
    </div>

@endif
