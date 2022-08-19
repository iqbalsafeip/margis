@extends('admin.layouts.main')
@section('content')
    <h1 class="mt-4">Jadwal Kebersihan Lingkungan ITG</h1>
    <hr>
    <button type="button" class="btn btn-primary btn-sm mb-3 mt-2 " data-bs-toggle="modal" data-bs-target="#addModal">
        + Tambah Jadwal Kebersihan
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 10px">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModalLabel">Tambah Jadwal Kebersihan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('schedules.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for=""> Pilih Area Tugas</label>
                            @if ($areas->count() > 0)
                                @foreach ($areas as $area)
                                    <div class="form-check">
                                        <input class="form-check-input" name="area[]" type="checkbox"
                                            value="{{ $area->id }}" id="areas-{{ $area->id }}">
                                        <label class="form-check-label" for="areas-{{ $area->id }}">
                                            {{ $area->area_tugas }}
                                        </label>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-muted  "><i>Area tugas belum ditambahkan!</i></p>
                            @endif
                        </div>
                        <select class="form-select mb-3" name="periode">
                            <option selected>Pilih Periode</option>
                            <option value="1">harian</option>
                            <option value="2">mingguan</option>
                            <option value="3">bulanan</option>
                            <option value="4">triwulan</option>
                        </select>
                        <select class="form-select" name="petugas">
                            <option selected>Pilih Petugas</option>
                            @foreach ($officers as $off)
                                <option value="{{ $off->id }}">{{ $off->nama_petugas }}</option>
                            @endforeach
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
    @if ($schedules->count() > 0)
        <div class="card-body col-md-auto p-2 table-responsive shadow">
            <table id="table" class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Area Tugas</th>
                        <th scope="col" class="text-center">Periode</th>
                        <th scope="col">Petugas</th>
                        <th scope="col" class="text-center">Aksi</th>
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
                            <td class="text-center"><button type="button" class="btn btn-md" data-bs-toggle="modal"
                                    data-bs-target="#editModal">
                                    <i style="color: rgb(167, 167, 12)" class="fas fa-edit "></i>
                                </button>|
                                <!-- Modal -->
                                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border-radius: 10px">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Area Tugas</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingInput"
                                                        placeholder="area">
                                                    <label for="floatingInput">Area Tugas</label>
                                                </div>
                                                <select class="form-select mb-3">
                                                    <option selected>Pilih Periode</option>
                                                    <option value="1">harian</option>
                                                    <option value="2">mingguan</option>
                                                    <option value="3">bulanan</option>
                                                </select>
                                                <select class="form-select">
                                                    <option selected>Pilih Petugas</option>
                                                    <option value="1">Team OB</option>
                                                    <option value="2">Ahmad Ahmudin</option>
                                                    <option value="3">Cecep</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-md" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal">
                                    <i style="color: red" class="fas fa-trash "></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content" style="border-radius: 10px">
                                            <div class="modal-header">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h4>Apakah anda yakin menghapus area tugas ini ?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="button" class="btn btn-danger">Hapus</button>
                                            </div>
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
@endsection()
