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
                        <div class="card-header">
                            <span><i class="fa-solid fa-trash-can"></i></span> Trash Bin
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Entity</th>
                                            <th>Name</th>
                                            <th>Delete_at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $i)
                                        <tr>
                                            <td>{{$entityP}}</td>
                                            <td>{{$i->pname}}</td>
                                            <td>{{$i->deleted_at}}</td>
                                            <td>
                                                <a href="{{url('/admin/trash/restore')}}/{{$i->pid}}" class="btn btn-success">Restore</a>
                                                <a href="{{url('/admin/store/force-delete')}}/{{$i->pid}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @foreach ($staff as $index)
                                        <tr>
                                            <td>{{$entityS}}</td>
                                            <td>{{$index->sname}}</td>
                                            <td>{{$index->deleted_at}}</td>
                                            <td>
                                                <a href="{{url('/admin/trash/restore')}}/{{$index->pid}}" class="btn btn-success">Restore</a>
                                                <a href="{{url('/admin/store/force-delete')}}/{{$index->pid}}" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Entity</th>
                                            <th>Name</th>
                                            <th>Delete_at</th>
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
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="{{ asset('/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>

</html>
