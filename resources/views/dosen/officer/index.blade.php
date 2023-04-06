@extends('dosen.layouts.main')
@section('content')
    <h1 class="mt-4">Daftar Petugas Kebersihan</h1>
    <hr class="my-0">

    @if ($officers->count() > 0)
        <div class="card-body col-md-auto p-2 table-responsive shadow">
            <table id="table" class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col"class="text-center">Nama Petugas</th>
                        <th scope="col" class="text-center">Jabatan</th>
                        <th scope="col">Nomor Handphone</th>
                        <th scope="col" class="text-center">Foto KTP</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($officers as $officer)
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td class="text-sm-center">
                                <p>{{ $officer->nama_petugas }}</p>
                                <img src="{{ asset('storage/' . $officer->foto) }}"
                                    style="height: 100px; width: 60px; object-fit: cover">
                            </td>
                            <td class="text-center">{{ $officer->jabatan }}</td>
                            <td>{{ $officer->no_hp }}</td>
                            <td class="text-center">
                                <img src="{{ asset('storage/' . $officer->ktp) }}"
                                    style="height: 70px; width: 150px; object-fit: cover">
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
