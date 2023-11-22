<!doctype html>
<html lang="en">

<head>
    <title>Admin Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
    </style>
</head>

<body>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h5>Sign Up your Details</h5>
                    <form action="{{ url('/signup/register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="first" placeholder="First name">
                                    <span class="text-danger">
                                        @error('first')
                                            **{{ $message }}**
                                        @enderror
                                    </span>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="last" placeholder="Last name">
                                    <span class="text-danger">
                                        @error('last')
                                            **{{ $message }}**
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Enter Email (example: john123@gmail.com)">
                                        <span class="text-danger">
                                            @error('email')
                                                **{{ $message }}**
                                            @enderror
                                        </span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="address" placeholder="Address">
                                    <span class="text-danger">
                                        @error('address')
                                            **{{ $message }}**
                                        @enderror
                                    </span>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" name="phone" placeholder="Phone">
                                    <span class="text-danger">
                                        @error('phone')
                                            **{{ $message }}**
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div>
                        </div>
                        <div class="col mb-2">
                            Gender:
                            <div class="form-check form-check-inline" name="gender">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                    value="Male">
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                    value="Female">
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio3"
                                    value="Other">
                                <label class="form-check-label" for="inlineRadio3">Other</label>
                            </div>
                            <span class="text-danger">
                                @error('gender')
                                    **{{ $message }}**
                                @enderror
                            </span>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <span class="text-danger">
                                    @error('password')
                                        **{{ $message }}**
                                    @enderror
                                </span>
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" name="confirmPassword"
                                    placeholder="Re-Enter Password">
                                <span class="text-danger">
                                    @error('confirmPassword')
                                        **{{ $message }}**
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                    Already have an account? <a href="{{ url('/') }}">Login</a>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
