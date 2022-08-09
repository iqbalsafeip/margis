@extends('pimpinan.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laporan Kebersihan Ruangan ITG</h1>
        <hr>

        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 py-2 shadow">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class=" btn btn-sm btn-outline-primary text-xs font-weight-bold mb-1"
                                    style="text-decoration: none" href="/pimpinan/report/main">
                                    <i class="bi bi-file-earmark-check-fill"></i> Detail Laporan</a>
                                <hr class="bg-primary">
                                <div class="mb-0 font-weight-bold text-gray-800">Periode: <button
                                        class="btn btn-sm btn-success">Harian</button>
                                </div>
                                <div class="mb-0 font-weight-bold text-gray-800">Tanggal: 07/03/2022
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 py-2 shadow">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class=" btn btn-sm btn-outline-primary text-xs font-weight-bold mb-1"
                                    style="text-decoration: none" href="/pimpinan/report/main">
                                    <i class="bi bi-file-earmark-check-fill"></i> Detail Laporan</a>
                                <hr class="bg-primary">
                                <div class="mb-0 font-weight-bold text-gray-800">Periode: <button
                                        class="btn btn-sm btn-warning">Mingguan</button>
                                </div>
                                <div class="mb-0 font-weight-bold text-gray-800">Tanggal: 07/03/2022
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 py-2 shadow">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class=" btn btn-sm btn-outline-primary text-xs font-weight-bold mb-1"
                                    style="text-decoration: none" href="/pimpinan/report/main">
                                    <i class="bi bi-file-earmark-check-fill"></i> Detail Laporan</a>
                                <hr class="bg-primary">
                                <div class="mb-0 font-weight-bold text-gray-800">Periode: <button
                                        class="btn btn-sm btn-info">Bulanan</button>
                                </div>
                                <div class="mb-0 font-weight-bold text-gray-800">Tanggal: 07/03/2022
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 py-2 shadow">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class=" btn btn-sm btn-outline-primary text-xs font-weight-bold mb-1"
                                    style="text-decoration: none" href="/pimpinan/report/main">
                                    <i class="bi bi-file-earmark-check-fill"></i> Detail Laporan</a>
                                <hr class="bg-primary">
                                <div class="mb-0 font-weight-bold text-gray-800">Periode: <button
                                        class="btn btn-sm btn-light border">Triwulan</button>
                                </div>
                                <div class="mb-0 font-weight-bold text-gray-800">Tanggal: 07/03/2022
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
