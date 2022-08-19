@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laporan Kebersihan Ruangan ITG</h1>
        <hr>
        <button type="button" class="btn btn-primary btn-sm mb-3 mt-2 " data-bs-toggle="modal" data-bs-target="#addModal">
            + Tambah Laporan Kebersihan
        </button>
        <!-- Modal -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Laporan Kebersihan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('report.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" id="tanggal" name="tanggal">
                            </div>
                            <select class="form-select mb-3" name="periode">
                                <option selected>Pilih Periode</option>
                                <option value="1">harian</option>
                                <option value="2">mingguan</option>
                                <option value="3">bulanan</option>
                                <option value="4">triwulan</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($reports->count() > 0)
            <div class="card-body col-md-auto p-2 table-responsive shadow">
                <table id="table" class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Pelaporan</th>
                            <th scope="col" class="text-center">Periode</th>
                            <th scope="col" class="text-center">Buat Laporan</th>
                            <th scope="col" class="text-center">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($reports as $report)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <td>{{ $report->created_at->translatedFormat('d F, Y') }}</td>
                                <td class="text-center"> @switch($report->periode)
                                        @case('harian')
                                            <div class="badge bg-success">{{ $report->periode }}</div>
                                        @break

                                        @case('mingguan')
                                            <div class="badge bg-warning">{{ $report->periode }}</div>
                                        @break

                                        @case('bulanan')
                                            <div class="badge bg-danger">{{ $report->periode }}</div>
                                        @break

                                        @case('triwulan')
                                            <div class="badge bg-info">{{ $report->periode }}</div>
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('main', ['periode' => $report->periode, 'report' => $report->id]) }}"><i
                                            class="bi bi-journal-text"></i></a>
                                </td>
                                <td class="text-center">
                                    <a class="btn" style="color: red">
                                        <i class="bi bi-trash-fill fa-lg" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $report['id'] }}"></i></a>
                                    <div class="modal fade" style="left: 0px" id="deleteModal{{ $report['id'] }}"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body mt-3">
                                                    <form action="/admin/report/{{ $report->id }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="mb-3">
                                                            <h5>Apakah anda yakin menghapus laporan ini ?
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
    </div>
@endsection()
