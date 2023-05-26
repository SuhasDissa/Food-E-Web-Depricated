<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Additive') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <form method="post" action="{{ route('additive.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')

                            <x-text-input id="id" name="id" type="hidden" class="mt-1 block w-1/2"
                                :value="old('id', $additive->id)" required />

                            <div class="flex flex-row items-center w-full">
                                <x-input-label for="e_code" :value="__('E-Code')" class="text-xl pr-4  w-1/2" />
                                <x-text-input id="e_code" name="e_code" type="text" class="mt-1 block w-1/2"
                                    :value="old('e_code', $additive->e_code)" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('e_code')" />
                            </div>

                            <div class="flex flex-row items-center w-full">
                                <x-input-label for="title" :value="__('Name')" class="text-xl pr-4  w-1/2" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block  w-1/2"
                                    :value="old('title', $additive->title)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('title')" />
                            </div>

                            <div class="flex flex-row items-center w-full">
                                <x-input-label for="info" :value="__('Description')" class="text-xl pr-4  w-1/2" />
                                <x-text-area id="info" name="info" type="text" class="mt-1 block w-1/2"
                                    required>
                                    {{ old('info', $additive->info) }}
                                </x-text-area>
                                <x-input-error class="mt-2" :messages="$errors->get('info')" />
                            </div>

                            <div class="flex flex-row items-center w-full">
                                <x-input-label for="e_type" :value="__('Additive Category')" class="text-xl pr-4  w-1/2" />
                                <x-text-input id="e_type" name="e_type" type="text" class="mt-1 block  w-1/2"
                                    :value="old('e_type', $additive->e_type)" required />
                                <x-input-error class="mt-2" :messages="$errors->get('e_type')" />
                            </div>

                            <div class="flex flex-row items-center w-full">
                                <x-input-label for="halal_status" :value="__('Halal Status')" class="text-xl pr-4  w-1/2" />
                                <select id="halal_status" name="halal_status"
                                    class="mt-1 block w-1/2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    :value="old('halal_status', $additive - > halal_status)" required>
                                    <option value="0" @selected(old('halal_status', $additive->halal_status) == 0)>Doubtful</option>
                                    <option value="1" @selected(old('halal_status', $additive->halal_status) == 1)>Halal</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('halal_status')" />
                            </div>

                            <div class="flex flex-row items-center w-full">
                                <x-input-label for="health_rating" :value="__('Health Rating')" class="text-xl pr-4  w-1/2" />
                                <select id="health_rating" name="health_rating"
                                    class="mt-1 block w-1/2 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                    required>
                                    <option value="0" @selected(old('health_rating', $additive->health_rating) == 0)>Unknown</option>
                                    <option value="1" @selected(old('health_rating', $additive->health_rating) == 1)>Bad</option>
                                    <option value="2" @selected(old('health_rating', $additive->health_rating) == 2)>Normal</option>
                                    <option value="3" @selected(old('health_rating', $additive->health_rating) == 3)>Good</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('health_rating')" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>
                            </div>
                        </form>
                    </section>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
