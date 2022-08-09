@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Ruang Kelas</h1>
        <hr>
        <div class="mt-2 mb-4">
            <a class="btn btn-sm btn-secondary" href="/admin/dashboard"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                kembali</a>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                + Tambah Ruang Kelas
            </button>
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border-radius: 10px">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Tambah Ruangan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Upload Foto Ruangan</label>
                                <input class="form-control" type="file" id="formFileMultiple" multiple>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name">
                                <label for="floatingInput">Nama Ruangan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name">
                                <label for="floatingInput">Keterangan</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body shadow">
                        <img src="/img/itg.png" class="card-img-top-center" width="70px" height="70px">
                        <h5 class="card-title">Ruang Kelas A <a href="" data-bs-toggle="modal"
                                data-bs-target="#editModal"><i style="color: darkgoldenrod"
                                    class="fas fa-edit fa-sm  "></i></a></h5>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 10px">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Ruangan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Upload Foto Ruangan</label>
                                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput">Nama Ruangan</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput">Keterangan</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">Ket: Ruangan Kelas ITG</p>
                        <a href="#" class="btn btn-md float-end" data-bs-toggle="modal"
                            data-bs-target="#deleteModal"><i style="color:red" class="fas fa-trash fa-lg  "></i></a>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 10px">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Apakah anda yakin menghapus ruangan ini?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body shadow">
                        <img src="/img/itg.png" class="card-img-top-center" width="70px" height="70px">
                        <h5 class="card-title">Ruang Kelas A <a href="" data-bs-toggle="modal"
                                data-bs-target="#editModal"><i style="color: darkgoldenrod"
                                    class="fas fa-edit fa-sm  "></i></a></h5>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 10px">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Ruangan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Upload Foto Ruangan</label>
                                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput">Nama Ruangan</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput">Keterangan</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">Ket: Ruangan Kelas ITG</p>
                        <a href="#" class="btn btn-md float-end" data-bs-toggle="modal"
                            data-bs-target="#deleteModal"><i style="color:red" class="fas fa-trash fa-lg  "></i></a>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 10px">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Apakah anda yakin menghapus ruangan ini?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body shadow">
                        <img src="/img/itg.png" class="card-img-top-center" width="70px" height="70px">
                        <h5 class="card-title">Ruang Kelas A <a href="" data-bs-toggle="modal"
                                data-bs-target="#editModal"><i style="color: darkgoldenrod"
                                    class="fas fa-edit fa-sm  "></i></a></h5>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 10px">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Ruangan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Upload Foto Ruangan</label>
                                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput">Nama Ruangan</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput">Keterangan</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">Ket: Ruangan Kelas ITG</p>
                        <a href="#" class="btn btn-md float-end" data-bs-toggle="modal"
                            data-bs-target="#deleteModal"><i style="color:red" class="fas fa-trash fa-lg  "></i></a>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 10px">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Apakah anda yakin menghapus ruangan ini?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body shadow">
                        <img src="/img/itg.png" class="card-img-top-center" width="70px" height="70px">
                        <h5 class="card-title">Ruang Kelas A <a href="" data-bs-toggle="modal"
                                data-bs-target="#editModal"><i style="color: darkgoldenrod"
                                    class="fas fa-edit fa-sm  "></i></a></h5>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 10px">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit Ruangan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="formFileMultiple" class="form-label">Upload Foto Ruangan</label>
                                            <input class="form-control" type="file" id="formFileMultiple" multiple>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput">Nama Ruangan</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"
                                                placeholder="name">
                                            <label for="floatingInput">Keterangan</label>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p class="card-text">Ket: Ruangan Kelas ITG</p>
                        <a href="#" class="btn btn-md float-end" data-bs-toggle="modal"
                            data-bs-target="#deleteModal"><i style="color:red" class="fas fa-trash fa-lg  "></i></a>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content" style="border-radius: 10px">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel"></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Apakah anda yakin menghapus ruangan ini?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
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
@endsection()
