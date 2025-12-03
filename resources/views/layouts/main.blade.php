<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkpoint</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">

            <!-- LEFT: Checkpoint (Home) -->
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                Checkpoint
            </a>

            <!-- MOBILE TOGGLE -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="mainNavbar">

                <!-- CENTER NAV LINKS -->
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('games.index') }}">Games</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reviews.index') }}">Reviews</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('guides.index') }}">Guides</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('bookmarks.index') }}">Bookmarks</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('goals.index') }}">Goals</a>
                    </li>
                </ul>

                <!-- RIGHT: SEARCH + Log a Game button -->
                <form class="d-flex me-3" action="{{ route('games.search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="query" placeholder="Search Game Title">
                </form>

                <a href="{{ route('games.create') }}" class="btn btn-primary">
                    Log a Game
                </a>

            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>