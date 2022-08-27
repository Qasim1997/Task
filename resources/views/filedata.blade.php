<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<x-header/>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center mt-3 mb-3">Employee Data file Name : {{ $file }}</h3>
        </div>
        <div class="panel-body p-3">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Department</th>
                        <th>Title</th>
                    </tr>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->department }}</td>
                            <td>{{ $row->title }}</td>
                        </tr>
                    @endforeach
                </table>
                <div style="display:flex; justify-content:center;align-items:baseline;">
                    {{ $data->links() }}
                    <span class="ms-2">
                        Per Page  {{ $data->perPage() }}

                    </span>


                </div>

            </div>
        </div>
    </div>
<x-Footer/>

</body>
</html>
