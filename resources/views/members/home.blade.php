<!doctype html>
<html lang="en">

<head>
    <title>Home</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    #carouselExampleIndicators {
        background: black;
        height: 500px;
    }

    .carousel-inner img {
        height: 500px;
        margin: auto;
    }

    #product {
        background: red;
        color: white;
        font-size: 14px;
    }

    #trainer {
        background: green;
        color: white;
        font-size: 14px;
    }

    h4 {
        line-height: 50px;
    }

    h5 {
        padding-top: 5px;
    }

    #cardbody a {
        text-decoration: none;
        color: black;
    }
</style>

<body>
    <main>
        @include('members.navbar')
        <div class="container mt-3">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-inner">
                    @foreach ($advertisement as $i)
                        <div class="carousel-item active">
                            <img src="/advertisement/{{ $i->ad_image }}" class="d-block" alt="...">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="my-3" id="trainer">
            <h4 class="text-center">Trainers</h4>
        </div>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($staff as $i)
                            @if ($i->status == '' || $i->status == 'Requested')
                                <tr class="">
                                    <td scope="row">{{ $i->sname }}</td>
                                    <td>{{ $i->sgender }}</td>
                                    @if ($i->status == 'Requested')
                                        <td><a href="{{ url('/home/hire') }}/{{ $i->sid }}"
                                                class="btn btn-success">Requested</a>
                                            <a href="{{ url('/home/hire/cancel') }}/{{ $i->sid }}" class="btn btn-danger">Cancel</a>
                                        </td>
                                    @else
                                        <td><a href="{{ url('/home/hire') }}/{{ $i->sid }}"
                                                class="btn btn-primary">Hire</a></td>
                                    @endif
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


        <div class="my-3" id="product">
            <h4 class="text-center">Buy Products</h4>
        </div>
        <div class="container">
            <div class="row mt-2">
                @foreach ($product as $i)
                    <div class="col-md-3 mb-3">
                        <div class="card bg-light text-dark h-100" id="cardbody">
                            <a href="{{ url('/home/view') }}/{{ $i->pid }}">
                                <div class="card-body"><img src="/products/{{ $i->pimage }}" alt="No Image Found"
                                        height="200" width="200">
                                    <h5>{{ substr($i->pname, 0, 30) }}...</h5>
                                    <span><b>Rs.{{ $i->price }}</b></span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
    <footer class="bg-primary text-light">
        <p class="text-center p-1">Copyright © 2023. All rights reserved.</p>
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
