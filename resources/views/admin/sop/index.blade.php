@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Petugas Kebersihan</h1>
        <hr>
        <button type="button" class="btn btn-primary btn-md mt-2 mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            + Tambah Petugas
        </button>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Petugas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="nama">
                            <label for="floatingInput">Nama</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="jabatan">
                            <label for="floatingInput">Jabatan</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row d-flex justify-content-lg-start align-items-center h-100">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card shadow" style="border-radius: 5px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    <img src="/img/avatar.jpg"class="img-fluid img-thumbnail"
                                        style="width: 180px; height: 160px; border-radius: 10px; object-fit: cover">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Ahmad Ahmudin<button type="button" class="btn btn-md"
                                            data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i style="color: rgb(167, 167, 12)" class="fas fa-edit fa-sm  "></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content" style="border-radius: 10px">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Petugas Kebersihan
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput"
                                                                placeholder="username">
                                                            <label for="floatingInput">Username</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput"
                                                                placeholder="jabatan">
                                                            <label for="floatingInput">Jabatan</label>
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
                                    </h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Head Of Office Boy</p>

                                    <div class="d-flex pt-1">
                                        <a type="button" class="btn btn-outline-primary me-1 flex-grow-1"
                                            href="/admin/sop/schedule"><i style="color: white"
                                                class="bi bi-file-earmark-text-fill" aria-hidden="true"></i>
                                            Tugas</a>
                                        <button type="button" class="btn  btn-outline-danger me-1 flex-grow-1"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <i style="color: white" class="fas fa-trash fa-sm  "></i> Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content" style="border-radius: 10px">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4>Apakah anda yakin menghapus petugas ini ?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="button" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-3">
            <div class="row d-flex justify-content-lg-start align-items-center h-100">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card shadow" style="border-radius: 5px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    <img src="/img/avatar.jpg"class="img-fluid img-thumbnail"
                                        style="width: 180px; height: 160px; border-radius: 10px; object-fit: cover">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Ahmad Ahmudin<button type="button" class="btn btn-md"
                                            data-bs-toggle="modal" data-bs-target="#editModal">
                                            <i style="color: rgb(167, 167, 12)" class="fas fa-edit fa-sm  "></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="editModal" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content" style="border-radius: 10px">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Petugas
                                                            Kebersihan
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput"
                                                                placeholder="nama">
                                                            <label for="floatingInput">Nama</label>
                                                        </div>
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingInput"
                                                                placeholder="jabatan">
                                                            <label for="floatingInput">Jabatan</label>
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
                                    </h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Head Of Office Boy</p>

                                    <div class="d-flex pt-1">
                                        <a type="button" class="btn btn-outline-primary me-1 flex-grow-1"
                                            href="/admin/sop/schedule"><i style="color: white"
                                                class="bi bi-file-earmark-text-fill" aria-hidden="true"></i>
                                            Tugas</a>
                                        <button type="button" class="btn  btn-outline-danger me-1 flex-grow-1"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <i style="color: white" class="fas fa-trash fa-sm  "></i> Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="deleteModal" tabindex="-1"
                                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content" style="border-radius: 10px">
                                                    <div class="modal-header">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <h4>Apakah anda yakin menghapus petugas ini ?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="button" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
