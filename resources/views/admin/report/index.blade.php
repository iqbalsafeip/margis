@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laporan Kebersihan Ruangan ITG</h1>
        <hr>
        <button type="button" class="btn btn-primary btn-sm mb-3 mt-2 " data-bs-toggle="modal" data-bs-target="#addModal">
            + Tambah Laporan Kebersihan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Laporan Kebersihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Tanggal">Tanggal:</label>
                            <input type="date" id="Tanggal" name="Tanggal">
                        </div>
                        <select class="form-select mb-3">
                            <option selected>Pilih Periode</option>
                            <option value="1">harian</option>
                            <option value="2">mingguan</option>
                            <option value="3">bulanan</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 py-2 shadow">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class=" btn btn-sm btn-outline-primary text-xs font-weight-bold mb-1"
                                    style="text-decoration: none" href="/admin/report/main">
                                    <i class="bi bi-file-earmark-check-fill"></i> Buat Laporan</a>
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
                                    style="text-decoration: none" href="/admin/report/main">
                                    <i class="bi bi-file-earmark-check-fill"></i> Buat Laporan</a>
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
                                    style="text-decoration: none" href="/admin/report/main">
                                    <i class="bi bi-file-earmark-check-fill"></i> Buat Laporan</a>
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
                                    style="text-decoration: none" href="/admin/report/main">
                                    <i class="bi bi-file-earmark-check-fill"></i> Buat Laporan</a>
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
