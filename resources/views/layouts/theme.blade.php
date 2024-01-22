<!DOCTYPE html>
<html lang="en" data-theme="mi-dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Management</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <input type="hidden" name="params" id="_params" value="{{ json_encode(request()->request->all()) }}">

    <script>
        var baseurl = window.location.origin;
    </script>
</head>


<div class="mi-loader d-none">
    <div class="loader m-auto"></div>
</div>

<body>

    @include('theme.toaster')
    @include('theme.header')
    @include('theme.delete-modal')

    <div class="container-fluid">
        <div class="row mi-light-theme">
            <div class="mi-sidebar mi-collapse">
                @include('theme.sidebar')
            </div>
            <div class="mi-content">
                <div class="w-100">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/theme.js') }}"></script>
    <!-- <script src="{{ asset('/js/app.js') }}"></script> -->

    @yield("customscript")
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>

</html>
