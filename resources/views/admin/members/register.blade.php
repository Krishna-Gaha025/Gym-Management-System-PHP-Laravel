<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('/cssfile/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('/cssfile/dataTables.bootstrap5.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/cssfile/style.css') }}" />
    <title>Admin Panel</title>
    <style>
        .container {
            width: 80%;
        }

        h2 {
            font-family: fantasy;
        }

        #head {
            background: #bcbfc4;
            height: 50px;
            margin: 0;
            padding-top: 5px;
        }
        #package{margin-top: -50px; border: solid 1px black;}
        #emergency{border: solid 1px black; margin-left: 1px;}
        #otherservice{border: solid 1px black;}
    </style>
</head>

<body>
    {{-- Top and Side Navigation bar --}}
    @include('admin.navbar')
    {{-- Top and Side Navigation bar --}}

    @if ($message = Session::get('success'))
        <script>
            alert('{{ $message }}');
        </script>
    @endif

    {{-- Information Part --}}
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row" id="head">
                <div class="col-md-12">
                    <h2 class="text-center">Register Member</h2>
                </div>
                <div class="row mt-2">
                    <div class="container my-3">
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="first"
                                            placeholder="First name">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="last"
                                            placeholder="Last name">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="address" placeholder="Address">
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="phone" placeholder="Phone">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <input type="number" class="form-control" name="height" placeholder="Age">
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="height"
                                            placeholder="Height(in cm)">
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control" name="weight"
                                            placeholder="Weight(in kg)">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="row">
                                    <div class="col">
                                        Any health issue? <i>if yes(fill out details)</i><input type="text"
                                            class="form-control" name="health" placeholder="Condition">
                                        <input type="text" class="form-control" name="health"
                                            placeholder="Restriciton">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="occupation" placeholder="Occupation">
                                        <div class="row my-3" id="emergency">
                                            <label class="form-label"><b>Emergency</b></label>
                                            <div class="col mb-3">
                                                <input type="number" class="form-control" name="phone1" placeholder="Contact">
                                            </div>
                                            <div class="col mb-3">
                                                <input type="text" class="form-control" name="relation" placeholder="Relation">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col" id="package">
                                    <h5>Choose your package</h5>
                                    <div class="form-check" name="gender">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="1">
                                        <label class="form-check-label">
                                          1 month <i>(Rs.2000)</i>
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="3">
                                        <label class="form-check-label">
                                            3 months <i>(Rs.5500)</i>
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="6">
                                        <label class="form-check-label">
                                            6 months <i>(Rs.10000)</i>
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault" value="12">
                                        <label class="form-check-label">
                                            12 months <i>(Rs.18000)</i>
                                        </label>
                                      </div>
                                </div>
                                <div class="col">
                                    Gender:
                                        <div class="form-check form-check-inline" name="gender">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="Male">
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="Female">
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio3" value="Other">
                                            <label class="form-check-label" for="inlineRadio3">Other</label>
                                        </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="col">
                                    <input type="password" class="form-control" name="ConfirmPassword" placeholder="Re-Enter Password">
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </main>
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>

</html>
