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

        #package {
            font-size: 18px;
            border: solid 1px black;
        }
    </style>
</head>

<body>
    @include('members.navbar')
    <script>
        function getValue() {
            var data = document.getElementsByName('package');
            var i;
            for (i = 0; i < data.length; i++) {
                if (data[i].checked) {
                    document.getElementById('output').value = data[i].value;
                    document.getElementById('output1').value = data[i].value;
                }
                if (data[i].checked) {
                    document.getElementById('save').innerHTML = "Saved!!";
                }
            }
        }
    </script>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form action="https://uat.esewa.com.np/epay/main" method="POST">
                        @csrf
                        <div class="row mb-3" id="package">
                            <div class="col" id="package">
                                <h4>Choose your package</h4>
                                <div class="form-check" name="gender">
                                    <input class="form-check-input" type="radio" name="package" value="10">
                                    <label class="form-check-label">
                                        1 month <i>(Rs.10)</i>
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="package" value="20">
                                    <label class="form-check-label">
                                        2 months <i>(Rs.20)</i>
                                    </label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="package" value="30">
                                    <label class="form-check-label">
                                        3 months <i>(Rs.30)</i>
                                    </label>
                                </div>
                                <div class="mb-2">
                                    <input type="button" value="Save" onclick="getValue()">
                                    {{-- <input type="text" id="output" value=""> --}}
                                    <span class="text-primary" id="save"></span>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input value="" id="output1" name="tAmt" type="hidden">
                            <input value="" id="output" name="amt" type="hidden">
                            <input value="0" name="txAmt" type="hidden">
                            <input value="0" name="psc" type="hidden">
                            <input value="0" name="pdc" type="hidden">
                            <input value="EPAYTEST" name="scd" type="hidden">
                            <input value="gym{{Session::get('member_id')}}" name="pid" type="hidden">
                            <input value="http://127.0.0.1:8000/verify-payment?q=su" type="hidden"
                                name="su">
                            <input value="http://127.0.0.1:8000/verify-payment?q=fu" type="hidden"
                                name="fu">
                            <input value="Pay via Esewa" class="btn btn-success" type="submit">
                            <img src="/images/esewalogo.jpg" height="50" width="80">
                        </div>
                    </form>
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
