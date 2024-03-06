<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header font-weight-bold">
                <h2> import export excel </h2>
                <h2 class="float-right"><a href="{{ url('export-excel-csv-file/xlsx') }}"
                        class="btn btn-success mr-1">Export Excel</a><a href="{{ url('export-excel-csv-file/csv') }}"
                        class="btn btn-success">Export CSV</a></h2>
            </div>
        </div>

        <div class="card-body">
            <form id="excel-csv-import-form" method="POST" action="{{ url('/compare-excel-data') }}"
                accept-charset="utf-8" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="file1" placeholder="choose">
                        </div>
                        @error('file1')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="file2" placeholder="choose">
                        </div>
                        @error('file2')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

</body>

</html>
