@extends('admin.layouts.main')
@section('content')
    <h1 class="mt-4">Daftar Kecamatan</h1>
    <hr class="my-0">
    <button type="button" class="btn btn-primary btn-md mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#addModal">
        + Tambah Kecamatan
    </button>
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Kecamatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('officer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Upload foto petugas disini</label>
                            <input class="form-control  @error('foto') is-invalid @enderror" type="file" name="foto">
                            @if ($errors->has('foto'))
                                <span class="text-danger">{{ $errors->first('foto') }}</span>
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror"
                                id="nama_petugas" name="nama_petugas" placeholder="nama_petugas">
                            @if ($errors->has('nama_petugas'))
                                <span class="text-danger">{{ $errors->first('nama_petugas') }}</span>
                            @endif
                            <label for="nama_petugas">Nama Petugas</label>
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
                            <label for="ktp" class="form-label">Upload foto KTP disini</label>
                            <input class="form-control  @error('ktp') is-invalid @enderror" type="file" name="ktp">
                            @if ($errors->has('ktp'))
                                <span class="text-danger">{{ $errors->first('ktp') }}</span>
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
    @if ($kecamatan->count() > 0)
        <div class="card-body col-md-auto p-2 table-responsive shadow">
            <table id="table" class="table table-striped text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Nama</th>
                        
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($kecamatan as $kec)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td class="text-sm-center">
                                <p>{{ $kec->name }}</p>
                            </td>
                            
                            <td class="text-center">
                                <a href="{{ route('officer.edit', $kec->id) }}/edit}}" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $kec['id'] }}"
                                    class="btn edit"style="color: rgb(128, 87, 223)">
                                    <i class="bi bi-pencil-fill"></i></a>|
                                <!-- Start Edit user Modal -->
                                <!-- End Edit user Modal -->
                                <a class="btn" style="color: red">
                                    <i class="bi bi-trash-fill" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $kec['id'] }}"></i></a>
                                <!-- Start Delete User Modal -->
                                <div class="modal fade" style="left: 0px" id="deleteModal{{ $kec['id'] }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action={{ route('officer.destroy', $kec->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body mt-3">
                                                    <div class="mb-3">
                                                        <h5>Apakah anda yakin menghapus petugas
                                                            {{ $kec->nama_petugas }} ?
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
                        <strong>Data Masih Kosong </strong>
                    </h5>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('skrip')
<script>

    let table = $('#table').DataTable()
</script>
@endsection
