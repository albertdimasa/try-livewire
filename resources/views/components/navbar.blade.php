<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <x-nav-item :active="request()->routeIs('home')" href='/'>Home</x-nav-item>
                <x-nav-item :active="request()->routeIs('about')" :href="route('about')">About</x-nav-item>
                <x-nav-item :active="Route::is('note.*')" href="{{ route('note.index') }}">Notes</x-nav-item>
                <x-nav-item :active="request()->routeIs('history')" :href="route('history')">History</x-nav-item>
                @guest
                    <x-nav-item :active="request()->routeIs('auth.*')" :href="route('auth.register')" :add="'bg-primary rounded '">Register</x-nav-item>
                @else
                    <livewire:auth.logout />
                @endguest
            </div>
        </div>
    </div>
</nav>
