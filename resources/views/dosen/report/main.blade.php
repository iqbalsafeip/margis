@extends('dosen.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Laporan Kebersihan Lingkungan ITG</h1>
        <hr>
        <a href="/dosen/report" class="btn btn-sm btn-secondary mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            Kembali</a>
        <div class="row">
            <div class="card-body col-md-auto p-2 table-responsive shadow">
                <table id="table" class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Area Tugas</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Laporan</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($schedules as $schedule)
                            <tr>
                                <th scope="row">1</th>
                                <td>
                                    <ul class="text-start">
                                        @foreach ($schedule->areaTugasItem as $item)
                                            <li>{{ $item->area->area_tugas }}</li>
                                        @endforeach

                                    </ul>
                                </td>
                                <td>
                                    @switch($schedule->periode)
                                        @case('harian')
                                            <div class="badge bg-success">{{ $schedule->periode }}</div>
                                        @break

                                        @case('mingguan')
                                            <div class="badge bg-warning">{{ $schedule->periode }}</div>
                                        @break

                                        @case('bulanan')
                                            <div class="badge bg-danger">{{ $schedule->periode }}</div>
                                        @break

                                        @case('triwulan')
                                            <div class="badge bg-info">{{ $schedule->periode }}</div>
                                        @break

                                        @default
                                    @endswitch
                                </td>
                                <td>{{ $schedule->officers->nama_petugas }}</td>
                                <td>
                                    <div class="mt-0">
                                        @foreach ($schedule->media()->where('report_id', $report)->get() as $media)
                                            <img src="{{ asset('storage/' . $media->photos) }}"
                                                style="height: 100px; width: 60px; object-fit: cover">
                                        @endforeach
                                    </div>

                                </td>
                                <td>
                                    @if (count(
                                        $schedule->media()->where('report_id', $report)->get()) > 0)
                                        <div class="badge bg-success">Selesai</div>
                                    @else
                                        <div class="badge bg-danger">Belum Selesai</div>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()
