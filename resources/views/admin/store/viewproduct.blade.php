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
                    <h4> <a href="{{ url('/admin/store') }}">
                            <span class="ms-auto">
                                <i class="fa-solid fa-backward"></i>
                            </span>
                        </a>
                        <a type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Edit Product</a>
                    </h4>
                </div>
            </div>

            <div class="container">
                    <div class="image">
                        <img src="/products/{{$product->pimage}}" class="card-img-top" alt="...">
                    </div>
                    <h3 class="card-title"><b>{{$product->pname}}</b></h3>
                    <h5 class="card-title"><b>Rs.{{$product->price}}</b></h5><br>
                    <h5>Description</h5>
                    <p class="card-text">{{$product->pdesc}}</p>
            </div>
        </div>
    </main>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{url('/admin/store/update')}}/{{$product->pid}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" value="{{old('name',$product->pname)}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Product Price</label>
                            <input type="number" class="form-control" name="price" aria-describedby="emailHelp" value="{{old('price',$product->price)}}">
                        </div>
                        <label class="form-label">Product Description</label>
                        <div class="mb-3">
                            <textarea name="description" placeholder="Provide Description">{{old('description', $product->pdesc)}}</textarea>
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
