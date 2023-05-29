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
                    <a href="{{ route('dashboard') }}" class="flex items-center pl-2">
                        <x-application-logo class="block h-9 w-auto" />
                        <p class="text-3xl text-black dark:text-white">
                            Food E
                        </p>

                    </a>
                </div>


                <!-- Settings Dropdown -->
                <div class="flex items-center ml-6">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="inline-flex items-center border border-transparent text-sm leading-4 font-medium rounded-full focus:outline-none">
                                    <div class="w-12 h-12 rounded-full hover:rounded-lg overflow-hidden">
                                        <img src="https://avatars.githubusercontent.com/{{ Auth::user()->username }}?size=128"
                                            alt="User Profile Picture">
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
