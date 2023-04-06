@extends('dosen.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laporan Kebersihan Ruangan ITG</h1>
        <hr>

        @if ($reports->count() > 0)
            <div class="card-body col-md-auto p-2 table-responsive shadow">
                <table id="table" class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Pelaporan</th>
                            <th scope="col" class="text-center">Periode</th>
                            <th scope="col" class="text-center">Detail Laporan</th>
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
                                    <a href="{{ route('mainDosen', ['periode' => $report->periode, 'report' => $report->id]) }}"><i
                                            class="bi bi-journal-text"></i></a>
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
    </div>
@endsection()
