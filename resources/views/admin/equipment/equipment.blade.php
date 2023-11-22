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
        .add {
            text-align: right;
            margin-top: -20px;
        }

        .head {
            height: 50px;
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
                <div class="col-md-12 mb-3">
                    <div class="card">
                        <div class="card-header head">
                            <span><i class="fa-solid fa-wrench"></i></span> Equipment List
                            <h4 class="add"><a href="#" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"><i class="fa-solid fa-plus"></i></a></h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Name Of Equipments</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Vendor Name</th>
                                            <th>Purchase_Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($equipment as $i)
                                        <tr>
                                            <td>{{$i->ename}}</td>
                                            <td>Rs.{{$i->eprice}}</td>
                                            <td>{{$i->equantity}}</td>
                                            <td>Rs.{{$i->etotal}}</td>
                                            <td>{{$i->evendor}}</td>
                                            <td>{{$i->created_at}}</td>
                                            <td>
                                                <a href="{{url('/admin/equipment/delete')}}/{{$i->eid}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name Of Equipments</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Vendor Name</th>
                                            <th>Purchase_Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Equipment</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/admin/equipment/insert')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Equipment Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" name="quantity" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Vendor Name</label>
                            <input type="text" class="form-control" name="vendor" aria-describedby="emailHelp">
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
