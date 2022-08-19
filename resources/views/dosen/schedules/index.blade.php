@extends('dosen.layouts.main')
@section('content')
    <h1 class="mt-4">Jadwal Kebersihan Lingkungan ITG</h1>
    <hr>
    @if ($schedules->count() > 0)
        <div class="card-body col-md-auto p-2 table-responsive shadow">
            <table id="table" class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Area Tugas</th>
                        <th scope="col" class="text-center">Periode</th>
                        <th scope="col">Petugas</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($schedules as $schedule)
                        <tr>
                            <th scope="row" class="text-center">{{ $no++ }}</th>
                            <td>
                                <ul class="text-start">
                                    @foreach ($schedule->areaTugasItem as $item)
                                        <li>{{ $item->area->area_tugas }}</li>
                                    @endforeach

                                </ul>
                            </td>
                            <td class="text-center">
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
