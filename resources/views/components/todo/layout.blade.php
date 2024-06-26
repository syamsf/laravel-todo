@props(["create" => ""])
<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('To do') }}
            </h2>

            {{ $create }}
        </div>
    </x-slot>

    {{ $slot }}
</x-app-layout>
