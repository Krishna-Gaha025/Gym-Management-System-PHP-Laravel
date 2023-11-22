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
        body {
            height: 800px;
        }

        textarea {
            width: 100%;
            height: 100px;
        }

        .container {
            align: center;
        }

        .image {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 25%;
        }

        #details {
            width: 60%;
            border: solid 2px black;
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
            <div class="row">
                <div class="col-md-12">
                    <h4> <a href="{{ url('/admin/staff') }}">
                            <span class="ms-auto">
                                <i class="fa-solid fa-backward"></i>
                            </span>
                        </a>
                        <a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Edit Staff</a>
                    </h4>
                </div>
            </div>

            <div class="container">
                <div class="image">
                    <img src="/staffs/{{ $staff->simage }}" class="card-img-top" alt="...">
                </div>
                <div class="container mt-3" id="details">
                    <table class="table">
                        <tr>
                            <th class="col">Name</th>
                            <td>{{$staff->sname}}</td>
                        </tr>
                        <tr>
                            <th class="col">Address</th>
                            <td>{{$staff->saddress}}</td>
                        </tr>
                        <tr>
                            <th class="col">Phone</th>
                            <td>{{$staff->sphone}}</td>
                        </tr>
                        <tr>
                            <th class="col">Gender</th>
                            <td>{{$staff->sgender}}</td>
                        </tr>
                        <tr>
                            <th class="col">Post</th>
                            <td>{{$staff->spost}}</td>
                        </tr>
                        <tr>
                            <th class="col">Salary</th>
                            <td>Rs.{{$staff->ssalary}}</td>
                        </tr>
                        <tr>
                            <th class="col">Joining Date</th>
                            <td>{{$staff->created_at}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </main>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Staff</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/staff/update') }}/{{$staff->sid}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp"
                                value="{{old('name',$staff->sname)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address" aria-describedby="emailHelp" value="{{old('address',$staff->saddress)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" class="form-control" name="phone" aria-describedby="emailHelp" value="{{old('phone',$staff->sphone)}}">
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col">
                                    Gender:
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1"
                                            value="Male" {{$staff->sgender == "Male" ? "checked" : ""}}>
                                        <label class="form-check-label" for="inlineRadio1">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2"
                                            value="Female" {{$staff->sgender == "Female" ? "checked" : ""}}>
                                        <label class="form-check-label" for="inlineRadio2">Female</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="inlineRadio3"
                                            value="Other" {{$staff->sgender == "Other" ? "checked" : ""}}>
                                        <label class="form-check-label" for="inlineRadio3">Other</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Post</label>
                            <select class="form-select" aria-label="Default select example" name="post">
                                <option value="Trainer" {{$staff->spost == "Trainer" ? "selected" : ""}}>Trainer</option>
                                <option value="Cashier" {{$staff->spost == "Cashier" ? "selected" : ""}}>Cashier</option>
                                <option value="Cleaner" {{$staff->spost == "Cleaner" ? "selected" : ""}}>Cleaner</option>
                                <option value="Manager" {{$staff->spost == "Manager" ? "selected" : ""}}>Manager</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Salary</label>
                            (Rs)<input type="number" class="form-control" name="salary"
                                aria-describedby="emailHelp" value="{{old('salary',$staff->ssalary)}}">
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
