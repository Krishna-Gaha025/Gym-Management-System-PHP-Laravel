<!doctype html>
<html lang="en">

<head>
    <title>wheyprotein</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<style>
    .container {
        height: 540px;
    }

    #image {
        border: solid 1px black;
        border-radius: 15px;
        padding: 15px;
    }

    #pname {
        padding-top: 20px;
    }

    form {
        margin-top: 30px;
    }
</style>

<body>
    @include('members.navbar')
    @if ($message = Session::get('success'))
        <script>
            alert('{{ $message }}');
        </script>
    @endif
    <div class="container">
        <div class="row mt-3">
            <div class="col" id="image">
                <img src="/products/{{ $product->pimage }}" alt="No Image Found" height="300" width="300">
            </div>
            <div class="col mt-3">
                <h4 class="mt-3" id="pname">{{ $product->pname }}</h4>
                <h5>Rs.{{$product->price}}</h5>
                <form action="{{ url('/home/buy') }}/{{$product->pid}}" method="post">
                    @csrf
                    <input type="hidden" name="product" value="{{ $product->price }}">
                    <input type="submit" class="btn btn-success" value="Buy Now">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h4 class="mt-5"><u>Product Details</u></h4>
                <p>{{ $product->pdesc }}</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
