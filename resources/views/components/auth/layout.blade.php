<x-auth.header>
    @slot('title')
        {{ $title }}
    @endslot
</x-auth.header>
{{ $slot }}
<x-auth.footer></x-auth.footer>
