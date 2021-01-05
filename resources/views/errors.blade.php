@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-red-600 mt-4 text-sm">{{ $error }}</p>
    @endforeach
@endif
