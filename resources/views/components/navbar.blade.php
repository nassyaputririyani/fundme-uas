<!-- Navbar -->
<nav class="navbar navbar-expand-lg px-lg-5 px-2 py-4 py-lg-5 navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <h3>
                Fund Me
            </h3>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link mx-lg-4 {{ ($title === "Home") ? 'active' : '' }}" aria-current="page" href="{{ route('index') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-4 {{ ($title === "Discover Project") ? 'active' : '' }}" href="{{ route('project.index') }}">
                        Discover Project
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-lg-4 {{ ($title === "About Us") ? 'active' : '' }}" href="{{ route('about-us') }}">
                        About Us
                    </a>
                </li>
               
                @guest
                    <li class="nav-item mt-2 mt-lg-0 ms-lg-3">
                        <a class="btn button-primary w-100 btn-lg fs-6" href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @endguest

                @auth
                    <li class="nav-item mt-2 mt-lg-0 ms-lg-3 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#">Dashboard</a>
                            <form action="{{ route('logout') }}" id="form-logout" method="POST">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#" onclick="$('#form-logout').submit();">Log Out</a>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>