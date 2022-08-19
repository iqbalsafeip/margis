@extends('admin.layouts.main')
@section('content')
    <h1 class="mt-4">Daftar Area Tugas Kebersihan</h1>
    <hr class="my-0">
    <button type="button" class="btn btn-primary btn-md mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#addModal">
        + Tambah Area Tugas Kebersihan
    </button>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Petugas Kebersihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('area.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('area_tugas') is-invalid @enderror"
                                id="area_tugas" name="area_tugas" placeholder="area_tugas">
                            @if ($errors->has('area_tugas'))
                                <span class="text-danger">{{ $errors->first('area_tugas') }}</span>
                            @endif
                            <label for="area_tugas">Area Tugas Kebersihan</label>
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
    @if ($areas->count() > 0)
        <div class="card-body col-md-auto p-2 table-responsive shadow">
            <table id="table" class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Area Tugas</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($areas as $area)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $area->area_tugas }}</td>
                            <td class="text-center">
                                <a href="{{ route('area.edit', $area->id) }}" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $area['id'] }}"
                                    class="btn edit"style="color: rgb(128, 87, 223)">
                                    <i class="bi bi-pencil-fill"></i></a>|
                                <!-- Start Edit user Modal -->
                                <div class="modal fade" style="left: 0px" id="editModal{{ $area['id'] }}" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel"><b>Edit Area Tugas
                                                        Kebersihan</b>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('area.update', $area->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input type="text"
                                                            class="form-control @error('area_tugas') is-invalid @enderror"
                                                            id="area_tugas" name="area_tugas" placeholder="area_tugas"
                                                            value="{{ old('area_tugas', $area->area_tugas) }}">
                                                        @if ($errors->has('area_tugas'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('area_tugas') }}</span>
                                                        @endif
                                                        <label for="area_tugas">Area Tugas Kebersihan</label>
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
                                        data-bs-target="#deleteModal{{ $area['id'] }}"></i></a>
                                <!-- Start Delete User Modal -->
                                <div class="modal fade" style="left: 0px" id="deleteModal{{ $area['id'] }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action={{ route('area.destroy', $area->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body mt-3">
                                                    <div class="mb-3">
                                                        <h5>Apakah anda yakin menghapus area tugas
                                                            {{ $area->area_tugas }} ?
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

@endsection
