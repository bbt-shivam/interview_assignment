<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Login</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/pages/login.js'])
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
                        <h3 class="mb-4 fw-bold">Log In</h3>

                        <div class="tab-content" id="loginTabContent">
                            <div class="tab-pane fade show active" id="emailLogin" role="tabpanel" aria-labelledby="emailLogin-tab">
                                <form method="post" action="{{url('login')}}" class="" id="login-form" onsubmit="return false;">
                                    @csrf
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
                                    <button type="submit" id="login-btn" class="btn btn-primary mt-3">Log In</button>
                                </form>
                            </div>
                        </div>
                        <p class="switcher-text mt-3">Don't have an account? <a href="{{url('register')}}">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>