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
        h2{font-family: fantasy;}
        .add{text-align: right; margin-top: -45px; font-family: serif;}
        #head{
            background: #bcbfc4;
            height: 50px;
            margin: 0;
            padding-top: 5px;
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
                    <h2 class="text-center">Store</h2>
                    <h4 class="add"><a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Add Product</a></h4>
                </div>
            </div>
            <div class="row mt-2">
                @foreach ($product as $i)
                    <div class="col-md-3 mb-3">
                        <div class="card bg-light text-dark h-100">
                            <div class="card-body"><img src="/products/{{ $i->pimage }}" alt="No Image Found"
                                    height="200" width="200">
                                <h5>{{ substr($i->pname, 0, 25) }}...</h5>
                                <span>Rs.{{ $i->price }}</span>
                            </div>
                            <div class="card-footer d-flex">
                                <a href='{{url('/admin/store/delete')}}/{{$i->pid}}' class="px-4 text-danger">
                                    <span class="ms-auto">
                                        <i class="fa-solid fa-trash-can"></i>{{-- Delete Icon --}}
                                    </span>
                                </a>
                                <a href='{{ url("/admin/store/view") }}/{{$i->pid}}'>
                                    View Details
                                    <span class="ms-auto">
                                        <i class="bi bi-chevron-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/admin/store/insert') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Price</label>
                            <input type="number" class="form-control" name="price" aria-describedby="emailHelp">
                        </div>
                        <label class="form-label">Product Description</label>
                        <div class="mb-3">
                            <textarea name="description" placeholder="Provide Description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Image</label>
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
