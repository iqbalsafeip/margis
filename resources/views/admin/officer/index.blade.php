@extends('admin.layouts.main')
@section('content')
    <h1 class="mt-4">Daftar Petugas Kebersihan</h1>
    <hr class="my-0">
    <button type="button" class="btn btn-primary btn-md mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#addModal">
        + Tambah Petugas Kebersihan
    </button>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Petugas Kebersihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('officer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror"
                                id="nama_petugas" name="nama_petugas" placeholder="nama_petugas">
                            @if ($errors->has('nama_petugas'))
                                <span class="text-danger">{{ $errors->first('nama_petugas') }}</span>
                            @endif
                            <label for="nama_petugas">Nama Petugas</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                                name="jabatan" placeholder="jabatan">
                            @if ($errors->has('jabatan'))
                                <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                            @endif
                            <label for="jabatan">Jabatan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                                name="no_hp" placeholder="no_hp">
                            @if ($errors->has('no_hp'))
                                <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                            @endif
                            <label for="no_hp">Nomor Handphone</label>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Upload foto disini</label>
                            <input class="form-control  @error('foto') is-invalid @enderror" type="file" name="foto">
                            @if ($errors->has('foto'))
                                <span class="text-danger">{{ $errors->first('foto') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <table class="table table-bordered w-50 shadow text-center">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Petugas</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Nomor Handphone</th>
                <th scope="col">Foto</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($officers as $officer)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $officer->nama_petugas }}</td>
                    <td>{{ $officer->jabatan }}</td>
                    <td>{{ $officer->no_hp }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $officer->foto) }}"
                            style="height: 100px; width: 60px; object-fit: cover">

                    </td>
                    <td>
                        <a href="{{ route('officer.edit', $officer->id) }}/edit}}" data-bs-toggle="modal"
                            data-bs-target="#editModal{{ $officer['id'] }}"
                            class="btn edit"style="color: rgb(128, 87, 223)">
                            <i class="bi bi-pencil-fill"></i></a>|
                        <!-- Start Edit user Modal -->
                        <div class="modal fade" style="left: 0px" id="editModal{{ $officer['id'] }}" tabindex="-1"
                            aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel"><b>Edit Petugas Kebersihan</b></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('officer.update', $officer->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-floating mb-3">
                                                <input type="text"
                                                    class="form-control @error('nama_petugas') is-invalid @enderror"
                                                    id="nama_petugas" name="nama_petugas" placeholder="nama_petugas"
                                                    value="{{ old('nama_petugas', $officer->nama_petugas) }}">
                                                @if ($errors->has('nama_petugas'))
                                                    <span class="text-danger">{{ $errors->first('nama_petugas') }}</span>
                                                @endif
                                                <label for="nama_petugas">Nama Petugas</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text"
                                                    class="form-control @error('jabatan') is-invalid @enderror"
                                                    id="jabatan" name="jabatan" placeholder="jabatan"
                                                    value="{{ old('jabatan', $officer->jabatan) }}">
                                                @if ($errors->has('jabatan'))
                                                    <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                                                @endif
                                                <label for="jabatan">Jabatan</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text"
                                                    class="form-control @error('no_hp') is-invalid @enderror"
                                                    id="no_hp" name="no_hp" placeholder="no_hp"
                                                    value="{{ old('no_hp', $officer->no_hp) }}">
                                                @if ($errors->has('no_hp'))
                                                    <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                                @endif
                                                <label for="no_hp">Nomor Handphone</label>
                                            </div>
                                            <div class="mb-3">
                                                <label for="foto" class="form-label">Upload foto disini</label>
                                                <input class="form-control  @error('foto') is-invalid @enderror"
                                                    type="file" name="foto"
                                                    value="{{ old('foto', $officer->foto) }}">
                                                @if ($errors->has('foto'))
                                                    <span class="text-danger">{{ $errors->first('foto') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Edit user Modal -->
                        <a class="btn" style="color: red">
                            <i class="bi bi-trash-fill" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $officer['id'] }}"></i></a>
                        <!-- Start Delete User Modal -->
                        <div class="modal fade" style="left: 0px" id="deleteModal{{ $officer['id'] }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action={{ route('officer.destroy', $officer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body mt-3">
                                            <div class="mb-3">
                                                <h5>Apakah anda yakin menghapus petugas
                                                    {{ $officer->nama_petugas }} ?
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
@endsection
