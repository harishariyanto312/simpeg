<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $page_title ?? config('app.name', 'Laravel') }}</title>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/adminlte/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/admin/custom.css') }}">
        @stack('styles')

        @if ($wysiwyg == '1')
            <script>
                const uploadURL = '{{ route('upload_image') }}';
            </script>
            <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>
            <script src="{{ asset('assets/js/tinymce.js') }}"></script>    
        @endif
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
        <div class="wrapper">
            @include('layouts.sections.navbar')
            @include('layouts.sections.sidebar')

            <!-- Content wrapper -->
            <div class="content-wrapper">

                <!-- Content header -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0">{{ $page_title ?? config('app.name', 'Laravel') }}</h1>
                            </div>
                            <div class="col-sm-6">
                                @isset($breadcrumb)
                                    <ol class="breadcrumb float-sm-right">
                                        @foreach ($breadcrumb as $anchor => $url)
                                            @empty($url)
                                                <li class="breadcrumb-item active">{{ $anchor }}</li>
                                            @else
                                                <li class="breadcrumb-item">
                                                    <a href="{{ $url }}">{{ $anchor }}</a>
                                                </li>
                                            @endempty
                                        @endforeach
                                    </ol>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        {{ $slot }}
                    </div>
                </div>
                <!-- /.content -->


            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /.wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap4/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/plugins/adminlte/js/adminlte.min.js') }}"></script>

        @stack('scripts')
    </body>
</html>