@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Area Tugas </h1>
        <p class="disabled text-black-50">Ahmad Ahmudin</p>
        <hr>
        <a href="/admin/sop" class="btn btn-secondary btn-sm mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            Kembali</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            + Tambah Area Tugas
        </button>

        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Area Tugas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="area">
                            <label for="floatingInput">Area Tugas</label>
                        </div>
                        <select class="form-select">
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
        <div class="card shadow  w-50">
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col"> #</th>
                            <th scope="col">Area Tugas</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Aksi</th>
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
                            <td><button class="btn btn-sm btn-success">harian</button></td>
                            <td><button type="button" class="btn btn-md" data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    <i style="color: rgb(167, 167, 12)" class="fas fa-edit fa-lg  "></i>
                                </button>|

                                <!-- Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border-radius: 10px">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Area Tugas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="area">
                                                    <label for="floatingInput">Area Tugas</label>
                                                </div>
                                                <select class="form-select">
                                                    <option selected>Pilih Status</option>
                                                    <option value="1">harian</option>
                                                    <option value="2">mingguan</option>
                                                    <option value="3">bulanan</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-md" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    <i style="color: red" class="fas fa-trash fa-lg  "></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border-radius: 10px">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Apakah anda yakin menghapus area tugas ini ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()
