@extends('admin.layouts.main')
@section('content')
<h1 class="mt-4">Daftar Market</h1>
<hr class="my-0">
<button type="button" class="btn btn-primary btn-md mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#addModal">
    + Tambah Market
</button>
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Market</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('market.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror" id="nama_petugas" name="nama_petugas" placeholder="nama_petugas">
                        @if ($errors->has('nama_petugas'))
                        <span class="text-danger">{{ $errors->first('nama_petugas') }}</span>
                        @endif
                        <label for="nama_petugas">Nama Petugas</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="no_hp">
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
@if ($markets->count() > 0)
<div class="card-body col-md-auto p-2 table-responsive shadow">
    <div class="input-group my-2">
        <select name="" id="kecamatan" class="form-select">
            <option value="">Pilih Kecamatan</option>
            @foreach ($kecamatan as $kec)
            <option value="{{$kec->name}}">{{$kec->name}}</option>
            @endforeach
        </select>
        <select name="" id="tipeMarket" class="form-select">
            <option value="">Pilih Tipe Market</option>
            <option value="Alfamart">Alfamart</option>
            <option value="Indomart">Indomart</option>
            <option value="Yomart">Yomart</option>
            <option value="Alfamidi">Alfamidi</option>
            <option value="Lainnya">Lainnya</option>
        </select>
    </div>
    <table id="table" class="table table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th scope="col" class="text-center">No</th>
                <th scope="col" class="text-center">Nama Perusahaan</th>
                <th scope="col" class="text-center">Kecamatan</th>
                <th scope="col" class="text-center">Tipe Market</th>
                <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $no = 1;
            @endphp
            @foreach ($markets as $market)
            <tr>
                <th scope="row">{{ $no++ }}</th>
                <td class="col-3">
                    {{ $market->nama_perusahaan }}

                </td>
                <td>{{ $market->kecamatan->name }}</td>
                <td>{{ $market->tipe_market }}</td>

                <td class="text-center">
                    
                    <a href="{{ route('market.edit', $market->id) }}/edit}}" data-bs-toggle="modal" data-bs-target="#editModal{{ $market['id'] }}" class="btn edit" style="color: rgb(128, 87, 223)">
                        <i class="bi bi-pencil-fill"></i></a>|
                    <a href="{{route('market.detail', $market->id)}}"  class="btn " style="color: black">
                    <i class="bi bi-map"></i></a>|
                    <!-- Start Edit user Modal -->
                    <div class="modal fade" style="left: 0px" id="editModal{{ $market['id'] }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel"><b>Edit Petugas Kebersihan</b>
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{ route('market.update', $market->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-body">
                                        <div class="mb-3 text-start">
                                            <label for="foto" class="form-label">Upload foto petugas
                                                disini</label>
                                            <input class="form-control  @error('foto') is-invalid @enderror" type="file" name="foto">
                                            @if ($errors->has('foto'))
                                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control @error('nama_petugas') is-invalid @enderror" id="nama_petugas" name="nama_petugas" placeholder="nama_petugas" value="{{ old('nama_petugas', $market->nama_petugas) }}">
                                            @if ($errors->has('nama_petugas'))
                                            <span class="text-danger">{{ $errors->first('nama_petugas') }}</span>
                                            @endif
                                            <label for="nama_petugas">Nama Petugas</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="no_hp" value="{{ old('no_hp', $market->no_hp) }}">
                                            @if ($errors->has('no_hp'))
                                            <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                                            @endif
                                            <label for="no_hp">Nomor Handphone</label>
                                        </div>
                                        <div class="mb-3 text-start">
                                            <label for="ktp" class="form-label">Upload foto KTP
                                                disini</label>
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
                    <!-- End Edit user Modal -->
                    <a class="btn" style="color: red">
                        <i class="bi bi-trash-fill" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $market['id'] }}"></i></a>
                    <!-- Start Delete User Modal -->
                    <div class="modal fade" style="left: 0px" id="deleteModal{{ $market['id'] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action={{ route('market.destroy', $market->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body mt-3">
                                        <div class="mb-3">
                                            <h5>Apakah anda yakin menghapus petugas
                                                {{ $market->nama_petugas }} ?
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
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
                <strong>Data Masih Kosong!</strong>
            </h5>
        </div>
    </div>
</div>
@endif
@endsection

@section('skrip')

<script>
    $(document).ready(function() {
        let table = $('#table').DataTable()



        $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
            let kecamatan = $('#kecamatan').val();
            let tipeMarket = $('#tipeMarket').val();
            console.log(kecamatan);
            if (kecamatan !== "" || tipeMarket !== "") {
                if (
                    (data[2] == kecamatan && data[3] == tipeMarket) ||( data[2] == kecamatan  && tipeMarket == "") || (data[3] == tipeMarket && kecamatan == "")
                ) {
                    return true;
                } else {
                    return false
                }
            } else {
                return true
            }


            return false;
        });

        $('#kecamatan').change(function() {
            table.draw()
        })
        $('#tipeMarket').change(function() {
            table.draw()
        })

    })
</script>

@endsection