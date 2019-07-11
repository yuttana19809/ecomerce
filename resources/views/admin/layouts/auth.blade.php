<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>:: ระบบอิเล็กทรอนิกส์เพื่อบริหารยุทธศาสตร์การคุ้มครองผู้บริโภค - @yield('title') ::</title>

    @section('styles')
        @if (App::environment('local'))
            <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
            <link href="{{ asset('css/coreui-icons.css') }}" rel="stylesheet">
            <link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet">
            <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
            <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">
            <link href="{{ asset('css/sweetalert2.css') }}" rel="stylesheet">
            <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">

            <link href="{{ asset('css/coreui.css') }}" rel="stylesheet">
            <link href="{{ asset('css/pace.css') }}" rel="stylesheet">
        @else
            <link href="{{ mix('css/bootstrap.min.css') }}" rel="stylesheet">
            <link href="{{ mix('css/coreui-icons.min.css') }}" rel="stylesheet">
            <link href="{{ mix('css/simple-line-icons.min.css') }}" rel="stylesheet">
            <link href="{{ mix('css/font-awesome.min.css') }}" rel="stylesheet">
            <link href="{{ mix('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
            <link href="{{ mix('css/sweetalert2.min.css') }}" rel="stylesheet">
            <link href="{{ mix('css/toastr.min.css') }}" rel="stylesheet">

            <link href="{{ mix('css/coreui.min.css') }}" rel="stylesheet">
            <link href="{{ mix('css/pace.min.css') }}" rel="stylesheet">
        @endif
    @show
</head>
<body class="app flex-row align-items-center">
    <div id="app" class="container">
        @yield('content')
    </div>
    <!--/.container-->

    @section('scripts')
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
	            'baseUrl' => url('/'),
                'routes' => collect(Route::getRoutes())
                    ->mapWithKeys(function ($route) { 
                        return [$route->getName() => $route->uri()]; 
                    })
            ]) !!};
        </script>

        @if (App::environment('local'))
            <script src="{{ asset('js/admin.js') }}"></script>
            <script src="{{ asset('js/pace.js') }}"></script>
            <script src="{{ asset('js/perfect-scrollbar.js') }}"></script>
            <script src="{{ asset('js/coreui.js') }}"></script>
            <script src="{{ asset('js/moment.js') }}"></script>
            <script src="{{ asset('js/bootstrap-datetimepicker.js') }}"></script>
        @else
            <script src="{{ mix('js/admin.min.js') }}"></script>
            <script src="{{ mix('js/pace.min.js') }}"></script>
            <script src="{{ mix('js/perfect-scrollbar.min.js') }}"></script>
            <script src="{{ mix('js/coreui.min.js') }}"></script>
            <script src="{{ mix('js/moment.min.js') }}"></script>
            <script src="{{ mix('js/bootstrap-datetimepicker.min.js') }}"></script>
        @endif

        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();  
                
                toastr.options = {
                    "positionClass": "toast-bottom-right",
                }

                @if(session('status'))
                toastr.success("{{ session('status') }}");
                @endif
            });
        </script>
    @show
  </body>
</html>
