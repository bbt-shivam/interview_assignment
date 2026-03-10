<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dealer Dashboard</title>

    @vite([
    'resources/css/app.css',
    'resources/js/app.js',
    'resources/js/pages/dealer_dashboard.js'
    ])

    <style>
        .error-text {
            color: red;
            font-size: 13px;
            margin-top: 4px;
        }
    </style>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold">Interview Assignment</a>

            <div class="ms-auto">
                <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Main -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Dealer Dashboard</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form id="dealer-profile-form">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{ auth()->user()->email }}" disabled>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" name="state" id="state" value="{{ auth()->user()->state }}">
                                <div class="error-text" data-error="state"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" id="city" value="{{ auth()->user()->city }}">
                                <div class="error-text" data-error="city"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Zipcode</label>
                                <input type="text" class="form-control" name="zipcode" id="zipcode" value="{{ auth()->user()->zipcode }}">
                                <div class="error-text" data-error="zipcode"></div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">
                                Update Profile
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>