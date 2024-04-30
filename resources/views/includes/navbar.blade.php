<div class="container">
    <a class="navbar-brand" href="#">
        <h3>CourseLab<span class="dot-span">.</span></h3>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Tutorials
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            @auth
            @if (Auth::user()->role == 'user')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hi, {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
            @elseif (Auth::user()->role == 'admin')
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Hi, {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/admin/dashboard">Dashboard</a></li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
            @endif
            @else
            <li class="nav-item">
                <a class="btn btn-login me-3" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-register" href="/register">Register</a>
            </li>
            @endauth
        </ul>
    </div>
</div>