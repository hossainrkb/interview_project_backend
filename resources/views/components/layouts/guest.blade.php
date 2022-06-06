<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title ?? 'Polytech' }}</title>
    <x-libs.css/>
        <style>
            .guest-bg{
                background-color: #f4f6f9
            }
        </style>
</head>

<body class="hold-transition sidebar-mini guest-bg">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div>
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    {{ $body }}
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <x-libs.js/>
</body>



<input type="hidden" value="{{ csrf_token() }}" id="csrf_token_identifier">


</html>
