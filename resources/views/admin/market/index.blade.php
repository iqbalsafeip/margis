@extends('admin.layouts.main')
@section('content')
<h1 class="mt-4">Daftar Market</h1>
<hr class="my-0">
<div class="d-flex flex-row">

    <button type="button" class=" btn btn-primary btn-md mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#addModal">
        + Tambah Market
    </button>
    <a href="{{route('exports')}}" class="ms-2 btn btn-primary btn-md mb-3 mt-3"  >
        Export Data
    </a>
</div>
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

                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <div class="form-label">Kecamatan</div>
                            <select name="kecamatan" id="" class="form-select">
                                <option value="">Pilih kecamatan</option>
                                @foreach ($kecamatan as $kec)
                                <option value="{{$kec->id}}">{{$kec->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <div class="form-label">Nama Permohonan</div>
                            <input type="text" name="nama_permohonan" placeholder="Nama Permohonan" class="form-control">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <div class="form-label">Nama Perusahaan</div>
                            <input type="text" name="nama_perusahaan" placeholder="Nama Permohonan" class="form-control">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <div class="form-label">Alamat</div>
                            <input type="text" name="alamat" placeholder="Nama Permohonan" class="form-control">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <div class="form-label">Nomor Izin</div>
                            <input type="text" name="nomor_izin" placeholder="Nama Permohonan" class="form-control">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <div class="form-label">Tanggal Izin</div>
                            <input type="text" name="tanggal_izin" placeholder="Nama Permohonan" class="form-control">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <div class="form-label">Tipe Market</div>
                            <select name="" id="tipeMarket" class="form-select">
                                <option value="">Pilih Tipe Market</option>
                                <option value="Alfamart">Alfamart</option>
                                <option value="Indomaret">Indomaret</option>
                                <option value="Yomart">Yomart</option>
                                <option value="Alfamidi">Alfamidi</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <div class="form-label">Longitude</div>
                            <input type="text" name="longitude" placeholder="Nama Permohonan" class="form-control">
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <div class="form-group">
                            <div class="form-label">Latitude</div>
                            <input type="text" name="latitude" placeholder="Nama Permohonan" class="form-control">
                        </div>
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
            <option value="Indomaret">Indomaret</option>
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

                    <a href="{{route('market.images', $market->id)}}" class="btn edit" style="color: rgb(128, 87, 223)">
                        <i class="bi bi-images"></i></a>|
                    <a href="{{ route('market.edit', $market->id) }}/edit}}" data-bs-toggle="modal" data-bs-target="#editModal{{ $market['id'] }}" class="btn edit" style="color: rgb(128, 87, 223)">
                        <i class="bi bi-pencil-fill"></i></a>|
                    <a href="{{route('market.detail', $market->id)}}" class="btn " style="color: black">
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
                                        <div class="form-floating mb-3">
                                            <div class="form-group">
                                                <div class="form-label">Kecamatan</div>
                                                <select name="kecamatan" selected="{{$market->kecamatan}}" id="" class="form-select">
                                                    <option value="">Pilih kecamatan</option>
                                                    @foreach ($kecamatan as $kec)
                                                    <option value="{{$kec->id}}" {{$market->kecamatan->id == $kec->id ? "selected" : ""}} >{{$kec->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <div class="form-group">
                                                <div class="form-label">Nama Permohonan</div>
                                                <input type="text" name="nama_permohonan" value="{{$market->nama_permohonan}}" placeholder="Nama Permohonan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <div class="form-group">
                                                <div class="form-label">Nama Perusahaan</div>
                                                <input type="text" name="nama_perusahaan" value="{{$market->nama_perusahaan}}" placeholder="Nama Permohonan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <div class="form-group">
                                                <div class="form-label">Alamat</div>
                                                <input type="text" name="alamat" value="{{$market->alamat}}" placeholder="Nama Permohonan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <div class="form-group">
                                                <div class="form-label">Nomor Izin</div>
                                                <input type="text" name="nomor_izin" value="{{$market->nomor_izin}}" placeholder="Nama Permohonan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <div class="form-group">
                                                <div class="form-label">Tanggal Izin</div>
                                                <input type="text" name="tanggal_izin" value="{{$market->tanggal_izin}}" placeholder="Nama Permohonan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <div class="form-group">
                                                <div class="form-label">Tipe Market</div>
                                                <select name="" id="tipeMarket"  class="form-select">
                                                    <option value="">Pilih Tipe Market</option>
                                                    <option value="Alfamart">Alfamart</option>
                                                    <option value="Indomaret">Indomaret</option>
                                                    <option value="Yomart">Yomart</option>
                                                    <option value="Alfamidi">Alfamidi</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <div class="form-group">
                                                <div class="form-label">Longitude</div>
                                                <input type="text" name="longitude" value="{{$market->longitude}}" placeholder="Nama Permohonan" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <div class="form-group">
                                                <div class="form-label">Latitude</div>
                                                <input type="text" name="latitude" value="{{$market->latitude}}" placeholder="Nama Permohonan" class="form-control">
                                            </div>
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
                    (data[2] == kecamatan && data[3] == tipeMarket) || (data[2] == kecamatan && tipeMarket == "") || (data[3] == tipeMarket && kecamatan == "")
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