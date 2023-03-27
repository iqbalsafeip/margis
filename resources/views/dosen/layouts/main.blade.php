<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="/img/itg.png" type="image/icon type">
    <title> Kebersihan ITG</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    {{-- datatable --}}
    <link rel="stylesheet" href="/DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="/DataTables/Buttons-2.2.3/css/buttons.bootstrap5.min.css">
    {{-- Datepicker --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

</head>

<body class="sb-nav-fixed">
    @include('dosen.layouts.header')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('dosen.layouts.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container">
                    @yield('content')
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Institut Teknologi Garut 2022</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="/js/scripts.js"></script>

    <script src="/js/jquery.min.js"></script>
    {{-- Data Tables --}}
    <script src="/DataTables/DataTables-1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="/DataTables/DataTables-1.12.1/js/dataTables.bootstrap5.min.js"></script>
    {{-- button datatables --}}
    <script src="/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="/DataTables/Buttons-2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="/DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="/DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="/DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="/DataTables/Buttons-2.2.3/js/buttons.html5.min.js"></script>
    <script src="/DataTables/Buttons-2.2.3/js/buttons.print.min.js"></script>
    <script src="/DataTables/Buttons-2.2.3/js/buttons.colVis.min.js"></script>


    <script>
        $(document).ready(function() {
            var table = $('cetak').DataTable({
                lengthChange: false,
                buttons: ['pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('cetak_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

    <script>
        $("#waktu_absensi").datepicker({
            format: "MM, yyyy",
            startView: "months",
            minViewMode: "months"
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#example1').datepicker({
                autoclose: true,
                format: "dd/mm/yyyy"
            });
        });
    </script>
</body>

</html>
