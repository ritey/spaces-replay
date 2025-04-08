@php
    $spaces = app(\App\Models\Space::class);
    $space = $spaces->orderBy('guid','DESC')->first();
    dump($space->id);
@endphp