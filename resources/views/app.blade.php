<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-light bg-light mb-4">
        <div class="container">
            <span class="navbar-text">
                @if(session()->has('age'))
                    Tuổi: <strong>{{ session('age') }}</strong>
                @endif
            </span>

            @if(session()->has('age'))
                <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm">
                    Logout
                </a>
            @endif
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>