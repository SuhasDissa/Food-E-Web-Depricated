<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <a href="{{ route('additive.index') }}"
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </a>
            <form method="get" action="{{ url('additives') }}">
                <div class="flex flex-row items-center">
                    <x-text-input name="q" type="text" class="mt-1 block w-full" :placeholder="__('Search')" required />
                </div>
            </form>
        </div>

    </x-slot>
    <div class="flex flex-col p-6">
        <p class="text-xl sm:text-3xl fond-bold text-gray-950 dark:text-gray-200">{{__('Additive Statistics')}}</p>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 py-4">
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-lg sm:text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Total Additives') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['all_count'] }}</p>
            </div>
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-lg sm:text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Halal Additives') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['halal_count'] }}</p>
            </div>
        </div>
        <p class="text-xl sm:text-3xl fond-bold text-gray-950 dark:text-gray-200">{{__('Additive Health Rating')}}</p>
        <div class="grid grid-cols-1 sm:grid-cols-4 gap-4 py-4">
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-lg sm:text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Good') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['health_good'] }}</p>
            </div>
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-lg sm:text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Normal') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['health_normal'] }}</p>
            </div>
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-lg sm:text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Bad') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['health_bad'] }}</p>
            </div>
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-lg sm:text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Unknown') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['health_unknown'] }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
