<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('dashboard') }}" class="flex items-center text-xl font-bold text-blue-600 hover:text-blue-800 transition">
                    📰 <span class="ml-2 hidden sm:inline">BeritaApp</span>
                </a>
            </div>

            <!-- Main Links -->
            <div class="hidden sm:flex sm:space-x-6">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')">
                    {{ __('Berita') }}
                </x-nav-link>
                @if(auth()->user()?->role === 'admin')
                    <x-nav-link :href="route('berita.create')" :active="request()->routeIs('berita.create')">
                        {{ __('Tambah Berita') }}
                    </x-nav-link>
                @endif
            </div>

            <!-- Profile Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-600 bg-white hover:text-blue-600 transition ease-in-out duration-200">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 111.08 1.04l-4.25 4.64a.75.75 0 01-1.08 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger for Mobile -->
            <div class="sm:hidden flex items-center">
                <button @click="open = !open"
                        class="p-2 rounded-md text-gray-500 hover:bg-gray-100 hover:text-blue-600 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                        <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="open" x-transition.duration.300ms class="sm:hidden bg-white shadow-md">
        <div class="pt-4 pb-3 px-4 space-y-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('berita.index')" :active="request()->routeIs('berita.index')">
                {{ __('Berita') }}
            </x-responsive-nav-link>
            @if(auth()->user()?->role === 'admin')
                <x-responsive-nav-link :href="route('berita.create')" :active="request()->routeIs('berita.create')">
                    {{ __('Tambah Berita') }}
                </x-responsive-nav-link>
            @endif
            <x-responsive-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-responsive-nav-link>
            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link href="{{ route('logout') }}"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>
    </div>
</nav>
