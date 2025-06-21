<x-filament::page>
    @foreach ($this->getHeaderWidgets() as $widget)
        {{ $widget }}
    @endforeach
</x-filament::page>
