@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laporan Kebersihan Lingkungan ITG</h1>
        <p class="text-black-50 disabled">Tanggal 02/07/2022</p>
        <hr>
        <a href="/admin/report" class="btn btn-sm btn-secondary mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            Kembali</a>
        <div class="row">
            <div class="card col-10 border-0">
                <table class="table text-center table-bordered shadow">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Area Tugas</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Laporan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <ul class="text-start">
                                    <li>BAAK</li>
                                    <li>Saluran Air ITG</li>
                                    <li>Listrik ITG</li>
                                    <li>Area Mahasiswa</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-sm btn-success">Harian</button></td>
                            <td>Ahmad Ahmudin</td>
                            <td><button type="button" class="btn btn-primary btn-sm mb-3 mt-2 " data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    + Upload File
                                </button>
                                <div class="mt-0">
                                    <img src="/img/contoh.jpg" width="100px" height="100px" style="object-fit: cover">
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border-radius: 10px">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addModalLabel">Tambah Bukti Pekerjaan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input class="form-control" type="file" id="formFile">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>selesai</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <ul class="text-start">
                                    <li>USI</li>
                                    <li>Parkiran atas ITG</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-sm btn-success">Harian</button></td>
                            <td>Jane</td>
                            <td><button type="button" class="btn btn-primary btn-sm mb-3 mt-2 " data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    + Upload File
                                </button>
                                <div class="mt-0">
                                    <img src="/img/contoh.jpg" width="100px" height="100px" style="object-fit: cover">
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border-radius: 10px">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addModalLabel">Tambah Bukti Pekerjaan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input class="form-control" type="file" id="formFile">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>selesai</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <ul class="text-start">
                                    <li>BAAK</li>
                                    <li>Saluran Air ITG</li>
                                    <li>Dapur ITG</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-sm btn-success">Harian</button></td>
                            <td>Cecep</td>
                            <td><button type="button" class="btn btn-primary btn-sm mb-3 mt-2 " data-bs-toggle="modal"
                                    data-bs-target="#addModal">
                                    + Upload File
                                </button>
                                <div class="mt-0">
                                    <img src="/img/contoh.jpg" width="100px" height="100px" style="object-fit: cover">
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border-radius: 10px">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addModalLabel">Tambah Bukti Pekerjaan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input class="form-control" type="file" id="formFile">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>selesai</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()
