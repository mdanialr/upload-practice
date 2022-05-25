<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body style="background-color: grey">

    <style>
        .vertical-center {
            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 80vh; /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }
    </style>


    <div class="container">
        <div class="vertical-center row">
            @if(session()->has('filename'))
                <div class="alert alert-primary" role="alert">
                    {{ session()->get('filename') }}
                </div>
            @endif

            <form method="POST" action="{{ url('/upload') }}" enctype="multipart/form-data">
                @csrf
                <div class="custom-file">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    <input type="file" name="file" class="form-control form-control-lg" id="inputGroupFile01">
                </div>

                <div class="d-grid mt-lg-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
