<nav class="navbar navbar-expand-lg navbar-dark bg-danger mb-5 py-3">
    <div class="container">
        <a class="navbar-brand" hPref="#">Blog</a>
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
                        href="{{ route('home') }}"
                        >Home</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                        href="{{ route('about') }}"
                        >About</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('posts*') ? 'active' : '' }}"
                        href="{{ route('posts.index') }}"
                        >Posts</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('categories*') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}"
                        >Categories</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        class="nav-link {{ request()->is('authors*') ? 'active' : '' }}"
                        href="{{ route('authors.index') }}"
                        >Authors</a
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
