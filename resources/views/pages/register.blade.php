<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pages/register.js'])
    <style>
        .error-text {
            color: red;
            font-size: 13px;
            margin-top: 4px;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="login-wrapper d-flex align-items-center justify-content-center vh-100 bg-light text-dark">
            <div class="row justify-content-center w-100">

                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 text-center position-relative">
                    <div class="card p-4 shadow rounded-3 mt-5">
                        <h3 class="mb-3 fw-bold">Register</h3>
                        <div>
                            <div class="tab-pane fade show active" id="emailLogin" role="tabpanel" aria-labelledby="emailLogin-tab">
                                <form method="post" action="{{route('register')}}" class="" id="register-form" onsubmit="return false;">
                                    @csrf
                                    <div class="form-floating w-100 mt-3">
                                        <input type="text" class="form-control bg-transparent" id="name" name="name" placeholder="name@example.com" value="">
                                        <div class="error-text" data-error="name"></div>
                                        <label for="name">Name</label>
                                    </div>
                                    <div class="form-floating w-100 mt-3">
                                        <input type="email" class="form-control bg-transparent" id="email" name="email" placeholder="name@example.com" value="">
                                        <div class="error-text" data-error="email"></div>
                                        <label for="email">Email address</label>
                                    </div>
                                    <div class="form-floating w-100 mt-3">
                                        <input type="password" class="form-control bg-transparent" id="password" name="password" placeholder="password" value="">
                                        <div class="error-text" data-error="password"></div>
                                        <label for="password">Password</label>
                                    </div>

                                    <div class="form-floating w-100 mt-3">
                                        <input type="password" class="form-control bg-transparent" id="password_confirmation" name="password_confirmation" placeholder="Enter password again" value="">
                                        <label for="password_confirmation">Confirm Password</label>
                                    </div>
                                    <div class="w-100 mt-3">
                                        <label class="form-label d-block mb-2">Register As</label>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="register_as" id="employee" value="employee" checked>
                                            <label class="form-check-label" for="employee">Employee</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="register_as" id="dealer" value="dealer">
                                            <label class="form-check-label" for="dealer">Dealer</label>
                                        </div>

                                        <div class="error-text" data-error="register_as"></div>
                                    </div>
                                    <button type="submit" id="register-btn" class="btn btn-primary mt-3">Register</button>
                                </form>
                            </div>

                        </div>
                        <p class="switcher-text mt-3">Remember password? <a href="{{url('login')}}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>