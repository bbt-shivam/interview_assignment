<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
            <!-- Left -->
            <a class="navbar-brand fw-bold" href="#">
                Interview Assignment
            </a>

            <!-- Right -->
            <div class="ms-auto">
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-primary">
                    Register
                </a>
            </div>
        </div>
    </nav>

    <!-- Center Content -->
    <div class="container text-center mt-5">
        <h1 class="fw-bold">
            Laravel 12
        </h1>
    </div>

</body>
</html>