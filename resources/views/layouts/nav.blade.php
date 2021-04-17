<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container flex  justify-between">
        <div class="navbar-brand">{{ __('Landing Builder') }}</div>
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link flex align-items-center dropdown-toggle p-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img style="max-width: 50px;border-radius: 50%;border: 1px solid #ddd;margin-right: 10px" src="{{ asset(Auth::user()->photo) }}">{{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <button type="submit" class="dropdown-item">{{ __('Logout') }}</button>
                    </div>
                </li>
            </ul>
        </form>
    </div>
</nav>
