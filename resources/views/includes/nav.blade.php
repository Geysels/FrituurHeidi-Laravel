<nav>
    <div class="navbar">
        <div class="navbar-start">
            <div class="dropdown">
                <label tabindex="0" class="btn btn-ghost lg:hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </label>
                <ul tabindex="0"
                    class="menu menu-compact dropdown-content bg-base-100 rounded-box mt-3 w-52 p-2 shadow">
                    @if (Route::currentRouteName() == 'home')
                        <li><a class="btn btn-ghost" href="#aboutus">Over Ons</a></li>
                    @endif
                    <li><a href="{{ route('order.main') }}">Menu</a></li>
                    <li><a href="#contactus">Contact</a></li>
                    @if (Auth::check())
                        <li tabindex="0">
                            <a>
                                {{ Auth::user()->name }}
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20"
                                    height="20" viewBox="0 0 24 24">
                                    <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                                </svg>
                            </a>
                            <ul class="bg-stone-800 p-2">
                                <li><a href="{{ route('logout') }}" class="btn btn-ghost">Uitloggen</a></li>
                            </ul>
                        </li>
                    @else
                        <li tabindex="0">
                            <a class="justify-between">
                                Gebruiker
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24">
                                    <path d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z" />
                                </svg>
                            </a>
                            <ul class="bg-stone-800 p-2">
                                <li><a href="{{ route('login') }}" class="btn btn-ghost">Inloggen</a></li>
                                <li><a href="{{ route('register') }}" class="btn btn-ghost">Aanmelden</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
            <a class="btn btn-ghost upper-case hidden text-xl md:flex" href="{{ route('home') }}">Frituur Heidi</a>
        </div>
        <div class="navbar-center hidden lg:flex">
            <ul class="menu menu-horizontal p-0">
                @if (Route::currentRouteName() == 'home')
                    <li><a class="btn btn-ghost" href="#aboutus">Over Ons</a></li>
                @endif
                <li><a class="btn btn-ghost" href="{{ route('order.main') }}">Menu</a></li>
                <li><a class="btn btn-ghost" href="#contactus">Contact</a></li>
                @if (Auth::check())
                    <li tabindex="0">
                        <a>
                            {{ Auth::user()->name }}
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                            </svg>
                        </a>
                        <ul class="bg-stone-800 p-2">
                            <li><a href="{{ route('logout') }}" class="btn btn-ghost">Uitloggen</a></li>
                        </ul>
                    </li>
                    @if (Auth::user()->role_id === 1)
                        <li><a href="{{ route('voyager.dashboard') }}" class="btn btn-outline btn-error">Dashboard</a>
                        </li>
                    @endif
                @else
                    <li tabindex="0">
                        <a>
                            Gebruiker
                            <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path d="M7.41,8.58L12,13.17L16.59,8.58L18,10L12,16L6,10L7.41,8.58Z" />
                            </svg>
                        </a>
                        <ul class="bg-stone-800 p-2">
                            <li><a href="{{ route('login') }}" class="btn btn-ghost">Inloggen</a></li>
                            <li><a href="{{ route('register') }}" class="btn btn-ghost">Aanmelden</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <div class="navbar-end">
            <a class="btn md:mr-1" href="{{ route('random') }}">Keuzestress?</a>
            <a class="btn md:mr-5" href="{{ route('order.main') }}">Bestel Online</a>
        </div>
    </div>
</nav>
