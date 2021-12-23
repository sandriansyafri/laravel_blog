<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-4 py-3">
    <div class="container">
        <a class="navbar-brand" href="#">Blog</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                        aria-current="page"
                        href="{{ route('home') }}"
                        >Home</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                        aria-current="page"
                        href="{{ route('about') }}"
                        >About</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('posts*') ? 'active' : '' }}"
                        aria-current="page"
                        href="{{ route('posts.index') }}"
                        >Posts</a
                    >
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
