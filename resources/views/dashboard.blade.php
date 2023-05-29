<x-app-layout>
    <div class="flex flex-col p-6">
        <p class="text-3xl fond-bold text-gray-950 dark:text-gray-200">Additive Statistics</p>
        <div class="grid grid-cols-3 gap-4 py-4">
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Total Additives') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['all_count'] }}</p>
            </div>
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Halal Additives') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['halal_count'] }}</p>
            </div>
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Additives with unknown Health Rating') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['health_unknown'] }}</p>
            </div>
        </div>
        <p class="text-3xl fond-bold text-gray-950 dark:text-gray-200">Additive Health Rating</p>
        <div class="grid grid-cols-3 gap-4 py-4">
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Good') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['health_good'] }}</p>
            </div>
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Normal') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['health_normal'] }}</p>
            </div>
            <div
                class="p-4 rounded-lg shadow-lg shadow-gray-200 dark:shadow-gray-900 bg-white dark:bg-gray-800 duration-200 hover:-translate-y-1">
                <p class="text-xl font-bold leading-relaxed text-gray-800 dark:text-gray-300">
                    {{ __('Bad') }}
                </p>
                <p class="text-4xl text-gray-600 dark:text-gray-200 text-end">{{ $stat['health_bad'] }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
