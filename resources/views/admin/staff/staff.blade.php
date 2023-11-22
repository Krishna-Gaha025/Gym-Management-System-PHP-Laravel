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
        textarea {
            width: 100%;
            height: 100px;
        }

        a {
            text-decoration: none;
            color: black;
        }

        h2 {
            font-family: fantasy;
        }

        .add {
            text-align: right;
            margin-top: -45px;
            font-family: serif;
        }

        #head {
            background: #bcbfc4;
            height: 50px;
            margin: 0;
            padding-top: 5px;
        }

        #list {
            margin: 25px;
        }

        #handle {
            padding: 3px;
            font-size: 12px;
            margin-bottom: 2px;
        }

        #detail {
            padding-left: 30px;
            font-size: 14px;
        }
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
                    <h2 class="text-center">Staff Records</h2>
                    <h4 class="add"><a type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add Staff</a></h4>
                </div>
            </div>
            <div class="row" id="list">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Post</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff as $i)
                            <tr>
                                <th scope="row">{{ $i->sid }}</th>
                                <td>{{ $i->sname }}</td>
                                <td>{{ $i->sgender }}</td>
                                <td>{{ $i->spost }}</td>
                                <td>
                                    <a href="{{url('/admin/staff/delete')}}/{{$i->sid}}" class="btn btn-danger" id="handle">Dismiss</a>
                                    <a href="{{ url('/admin/staff/view') }}/{{ $i->sid }}" id="detail">
                                        View Details
                                        <span class="ms-auto">
                                            <i class="bi bi-chevron-right"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Staff</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/staff/insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    Gender:
                                    <div class="form-check form-check-inline">
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
                                        <input class="form-check-input" type="radio" name="gender"
                                            id="inlineRadio3" value="Other">
                                        <label class="form-check-label" for="inlineRadio3">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Post</label>
                            <select class="form-select" aria-label="Default select example" name="post">
                                <option value="Trainer" selected>Trainer</option>
                                <option value="Cashier">Cashier</option>
                                <option value="Cleaner">Cleaner</option>
                                <option value="Manager">Manager</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Salary</label>
                            (Rs)<input type="number" class="form-control" name="salary"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" class="form-control" name="image" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>

</html>
