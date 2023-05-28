<nav x-data="{ open: false }">
    <div
        class="z-20 fixed top-0 left-0 right-0 bg-white/75 dark:bg-gray-800/50 border-b border-gray-100 dark:border-gray-700  backdrop-blur-md">
        <!-- Primary Navigation Menu -->
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Hamburger -->
                    <div class="pl-2 pr-4 flex items-center sm:hidden">
                        <button @click="open = ! open"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                            <template x-if="open">
                                <span class="material-symbols-rounded"> menu_open </span>
                            </template>
                            <template x-if="!open">
                                <span class="material-symbols-rounded"> menu </span>
                            </template>
                        </button>
                    </div>
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('home') }}">
                            <x-application-logo
                                class="block h-12 w-auto" />
                        </a>
                    </div>

                    <div class="flex items-center pl-6">
                        <p class="text-3xl text-black dark:text-white">
                            Food E
                        </p>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="flex items-center ml-6">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <aside :class="{ 'translate-x-0': open, '-translate-x-full': !open }"
        class="h-full fixed left-0 top-0 pt-16 w-64 z-10 transition-transform sm:translate-x-0 border-r border-gray-100 dark:border-gray-700"
        aria-label="Sidebar">
        <div class="h-full px-4 py-6 overflow-y-auto bg-gray-50 dark:bg-gray-800">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="material-symbols-rounded"> dashboard </span>
                        <span class="ml-3">{{ __('Dashboard') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('additive.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <span class="material-symbols-rounded"> nutrition </span><span
                            class="flex-1 ml-3 whitespace-nowrap">{{ __('All Additives') }}</span>
                    </a>
            </ul>
        </div>
    </aside>
</nav>
