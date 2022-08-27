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
    <style>
        body>div>div>div.panel-body>div>nav>div.hidden.sm\:flex-1.sm\:flex.sm\:items-center.sm\:justify-between>div:nth-child(2) {
            display: none;
        }
    </style>
</head>

<body>
    <x-header/>


    <div class="container">
        <br>
        @if (count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                Upload Validation Error<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <strong>{{ $message }}</strong>
            </div>
        @elseif ($message = Session::get('destroy'))
        <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong>
        </div>

        @endif




        <form method="POSt" enctype="multipart/form-data" action="{{ route('user.post') }}">
            @csrf
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td width="40%" align="right"><label>Select File for Upload</label></td>
                        <td width="30">
                            <input type="file" name="file" />
                        </td>
                        <td width="30%" align="left">
                            <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                        </td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"></td>
                        <td width="30"><span class="text-muted">Only.xls, .xslx</span></td>
                        <td width="30%" align="left"></td>
                    </tr>
                </table>
            </div>
        </form>

        <br />
        @foreach ($file as $item)
            <div class="card mb-3" style="width: 18rem; ">
                <div class="card-body">

                    <div style="display: flex;justify-content: space-between;">

                        <a href="/file/{{ $item->id }}/perpage=10?page=1" class="card-link">
                            <h5 class="card-title">{{ $item->name }}</h5>
                        </a>
                        <form method="post" action="{{ route('user.delete',$item->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="btn btn-danger">Remove</button>
                        </form>

                    </div>



                </div>

            </div>
        @endforeach
    </div>
<x-Footer/>
</body>

</html>
