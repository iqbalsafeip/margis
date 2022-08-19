@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">SOP Kebersihan ITG</h1>
        <hr>
        <button type="button" class="btn btn-primary btn-md mt-2 mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            + Tambah SOP Kebersihan
        </button>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah SOP Kebersihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('sop.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_sop" name="nama_sop"
                                    placeholder="nama">
                                <label for="nama_sop">Nama SOP</label>
                            </div>
                            <div class="form m-1">
                                <label for="file_sop">Upload File SOP disini</label>
                            </div>
                            <input type="file" class="form-control" id="file_sop" name="file_sop">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($sops->count() > 0)
            <div class="card-body col-md-auto p-2 table-responsive shadow">
                <table id="table" class="table table-striped text-center">
                    <thead class="table-dark">
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Standar Operasional Prosedur</th>
                        <th class="text-center">Tanggal Upload</th>
                        <th class="text-center">File SOP</th>
                        <th class="text-center">Hapus</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($sops as $sop)
                            <tr>
                                <td><b>{{ $no++ }}</b></td>
                                <td>{{ $sop->nama_sop }}</td>
                                <td>{{ $sop->created_at->translatedFormat('d F, Y') }}</td>
                                <td>
                                    <a class=" badge bg-success mb-3" style="text-decoration: none" type="button"
                                        target="_blank" href="{{ url('/storage/' . $sop->file_sop) }}"><i
                                            class="bi bi-file-earmark-text-fill"></i>
                                        file sop</a>
                                </td>
                                <td>
                                    <a class="btn" style="color: red">
                                        <i class="bi bi-trash-fill fa-lg" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $sop['id'] }}"></i></a>
                                    <div class="modal fade" style="left: 0px" id="deleteModal{{ $sop['id'] }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body mt-3">
                                                    <form action="/admin/sop/{{ $sop->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="mb-3">
                                                            <h5>Apakah anda yakin menghapus
                                                                {{ $sop->nama_sop }} ?
                                                            </h5>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="card border-0 mt-5" style="display: flex; align-items: center;">
                <div class="card bg-light border-0 text-center w-75 h-100">
                    <div class="card-body">
                        <h5 style="font-size: 45px;" class="text-muted mt-3 mb-3">
                            <strong>Data Masih Kosong Nich!</strong>
                        </h5>
                    </div>
                </div>
            </div>
        @endif
    @endsection()
