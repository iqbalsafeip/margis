@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jadwal Kebersihan Lingkungan ITG</h1>
        <hr>
        <div class="col-sm-3 mb-2">
            <h6>Pilih Periode Kebersihan</h6>
            <select class="form-select ">
                <option selected>--Periode--</option>
                <option value="1">Harian</option>
                <option value="2">Mingguan</option>
                <option value="3">Bulanan</option>
                <option value="4">Triwulan</option>
            </select>
        </div>
        <div class="row">
            <div class="card col-10 border-0">
                <div class="text-end">
                    <button type="button" class="btn btn-primary btn-sm mb-3 mt-2 " data-bs-toggle="modal"
                        data-bs-target="#addModal">
                        + Tambah Area Tugas
                    </button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 10px">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Tambah Area Tugas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('schedules.store') }}" method="POST">
                                @csrf
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for=""> Pilih Area Tugas</label>
                                        @foreach ($areas as $area)
                                            <div class="form-check">
                                                <input class="form-check-input" name="area[]" type="checkbox"
                                                    value="{{ $area->id }}" id="areas-{{ $area->id }}">
                                                <label class="form-check-label" for="areas-{{ $area->id }}">
                                                    {{ $area->area_tugas }}
                                                </label>
                                            </div>
                                        @endforeach
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
                                    <button type="button" class="btn btn-outline-secondary"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <table class="table text-center table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Area Tugas</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Petugas</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
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
                                <td><button type="button" class="btn btn-md" data-bs-toggle="modal"
                                        data-bs-target="#editModal">
                                        <i style="color: rgb(167, 167, 12)" class="fas fa-edit fa-lg  "></i>
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
                                        <i style="color: red" class="fas fa-trash fa-lg  "></i>
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



        </div>
    </div>
@endsection()
