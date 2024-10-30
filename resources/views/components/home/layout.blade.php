<x-home.header>
    {{ $title }}
</x-home.header>
<x-home.navbar>
    {{ Str::lower($title) }}
</x-home.navbar>

{{ $slot }}
<x-home.footer>
    @slot('subtitle')
        {{ $title }}
    @endslot
</x-home.footer>
