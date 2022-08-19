@extends('dosen.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">SOP Kebersihan ITG</h1>
        <hr>
        @if ($sops->count() > 0)
            <div class="card-body col-md-auto p-2 table-responsive shadow">
                <table id="table" class="table table-striped text-center">
                    <thead class="table-dark">
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Standar Operasional Prosedur</th>
                        <th class="text-center">Tanggal Upload</th>
                        <th class="text-center">File SOP</th>
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
