@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">SOP Kebersihan</h1>
        <hr>
        <button type="button" class="btn btn-primary btn-md mt-2 mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            + Tambah Petugas Kebersihan
        </button>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Petugas Kebersihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('sop.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="officer_name" name="'officer_name"
                                    placeholder="nama">
                                <label for="officer_name">Nama Petugas</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="position" name="'position"
                                    placeholder="position">
                                <label for="position">Jabatan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="no_hp" name="'no_hp"
                                    placeholder="no_hp">
                                <label for="no_hp">Nomor Handphone</label>
                            </div>
                            <div class="form m-1">
                                <label for="officer_photo">Upload Foto Petugas</label>
                            </div>
                            <input type="file" class="form-control" id="officer_photo" name="'officer_photo"
                                accept="image">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-bordered border-1 border-dark">
            <thead class="text-center">
                <th>nama</th>
                <th>posisi</th>
                <th>no hp</th>
                <th>foto</th>
            </thead>
            <tbody>
                @foreach ($sops as $sop)
                    <tr>
                        <td>{{ $sop->officer_name }}</td>
                        <td>{{ $sop->position }}</td>
                        <td>{{ $sop->no_hp }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $sop->officer_photo) }}" class="img-fluid img-thumbnail"
                                style="width: 180px; height: 160px; border-radius: 10px; object-fit: cover">

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- @foreach ($sops as $sop)
            <div class="row">
                <div class="row d-flex justify-content-lg-start align-items-center h-100">
                    <div class="col col-md-9 col-lg-7 col-xl-5">
                        <div class="card shadow" style="border-radius: 5px;">
                            <div class="card-body p-4">
                                <div class="d-flex text-black">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('storage/' . $sop->officer_photo) }}"
                                            class="img-fluid img-thumbnail"
                                            style="width: 180px; height: 160px; border-radius: 10px; object-fit: cover">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1">{{ $sop->officer_name }}<a
                                                href="{{ route('sop.edit', $sop->id) }}" class="btn btn-md"
                                                data-bs-toggle="modal" data-bs-target="#editModal{{ $sop['id'] }}">
                                                <i style="color: rgb(167, 167, 12)" class="fas fa-edit fa-sm  "></i>
                                            </a>
                                            <div class="modal fade" id="editModal{{ $sop['id'] }}" tabindex="-1"
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
                                                        <form action="{{ route('sop.update', $sop->id) }}" method="POST">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control"
                                                                        id="officer_name" name="'officer_name"
                                                                        placeholder="officer_name"
                                                                        value="{{ old('officer_name', $sop->officer_name) }}">
                                                                    <label for="officer_name">Nama Petugas</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control"
                                                                        id="position" name="'position"
                                                                        placeholder="position"
                                                                        value="{{ old('position', $sop->position) }}">
                                                                    <label for="position">Jabatan</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control"
                                                                        id="no_hp" name="'no_hp" placeholder="no_hp"
                                                                        value="{{ old('no_hp', $sop->no_hp) }}">
                                                                    <label for="no_hp">Nomor Handphone</label>
                                                                </div>
                                                                <div class="form m-1">
                                                                    <label for="officer_photo">Upload Foto
                                                                        Petugas</label>
                                                                </div>
                                                                <input type="file" class="form-control"
                                                                    id="officer_photo" name="'officer_photo"
                                                                    accept="image">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-outline-secondary"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </h5>
                                        <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $sop->position }}</p>
                                        <p class="mb-2 pb-1" style="color: #2b2a2a;">No Hp:{{ $sop->no_hp }}</p>
                                        <div class="d-flex pt-1">
                                            <a type="button" class="btn btn-outline-primary me-1 flex-grow-1"
                                                href="/admin/sop/schedule"><i style="color: white"
                                                    class="bi bi-file-earmark-text-fill" aria-hidden="true"></i>
                                                Tugas</a>
                                            <a class="btn  btn-outline-danger me-1 flex-grow-1" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $sop['id'] }}">
                                                <i style="color: white" class="fas fa-trash fa-sm  "></i> Hapus
                                            </a>
                                            <div class="modal fade" id="deleteModal{{ $sop['id'] }}" tabindex="-1"
                                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content" style="border-radius: 10px">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('sop.destroy', $sop->id) }}"></form>
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
        @endforeach --}}

    </div>
@endsection()
