<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dealer Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js','resources/js/pages/register.js'])
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                Interview Assignment
            </a>

            <div class="ms-auto">
                <a href="{{ route('logout') }}" class="btn btn-danger">
                    Logout
                </a>
            </div>
        </div>
    </nav>

    <section class="vh-90">
        <div class="login-wrapper d-flex align-items-center justify-content-center vh-100 bg-light text-dark">
            <div class="row justify-content-center w-100">

                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4 col-xxl-3 text-center position-relative">
                    <div class="card p-4 shadow rounded-3 mt-5">
                        <h3 class="mb-3 fw-bold">Dealer Address</h3>
                        <div>
                            <div class="tab-pane fade show active" id="emailLogin" role="tabpanel" aria-labelledby="emailLogin-tab">
                                <form method="post" action="{{route('dealer.address.update')}}" class="" id="dealer-address-form" onsubmit="return false;">
                                    @csrf
                                    <div class="form-floating w-100 mt-3">
                                        <input type="text" class="form-control bg-transparent" id="state" name="state" placeholder="Enter state" value="">
                                        <div class="error-text" data-error="state"></div>
                                        <label for="state">State</label>
                                    </div>
                                    <div class="form-floating w-100 mt-3">
                                        <input type="text" class="form-control bg-transparent" id="city" name="city" placeholder="enter city" value="">
                                        <div class="error-text" data-error="city"></div>
                                        <label for="city">City</label>
                                    </div>
                                    <div class="form-floating w-100 mt-3">
                                        <input type="text" class="form-control bg-transparent" id="zipcode" name="zipcode" placeholder="zipcode" value="">
                                        <div class="error-text" data-error="zipcode"></div>
                                        <label for="zipcode">Zipcode</label>
                                    </div>
                                    <button type="submit" id="submit" class="btn btn-primary mt-3">Update</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>