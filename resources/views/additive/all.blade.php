<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <a href="{{ route('additive.index') }}"
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('All Additives') }}
            </a>
            <form method="get" action="{{ url('additives') }}">
                <div class="flex flex-row items-center">
                    <x-text-input name="q" type="text" class="mt-1 block w-full" :placeholder="__('Search')" required />
                </div>
            </form>
        </div>

    </x-slot>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 pt-6">
        @foreach ($additives as $additive)
            <div class="p-4">
                <a href="{{ route('additive.show', ['additive' => $additive->id]) }}">
                    <div class="additive-card">
                        <p class="title">
                            {{ $additive->title }}
                        </p>
                        <p class="subtitle">{{ $additive->e_code }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-app-layout>
