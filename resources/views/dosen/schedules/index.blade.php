@extends('dosen.layouts.main')
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
                <table class="table text-center table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Area Tugas</th>
                            <th scope="col">Periode</th>
                            <th scope="col">Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <ul class="text-start">
                                    <li>BAAK</li>
                                    <li>Saluran Air ITG</li>
                                    <li>Listrik ITG</li>
                                    <li>Area Mahasiswa</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-sm btn-success">Harian</button></td>
                            <td>Ahmad Ahmudin</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <ul class="text-start">
                                    <li>BAAK</li>
                                    <li>Saluran Air ITG</li>
                                    <li>Listrik ITG</li>
                                    <li>Area Mahasiswa</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-sm btn-warning">Mingguan</button></td>
                            <td>Team OB</td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>
                                <ul class="text-start">
                                    <li>BAAK</li>
                                    <li>Saluran Air ITG</li>
                                    <li>Listrik ITG</li>
                                    <li>Area Mahasiswa</li>
                                </ul>
                            </td>
                            <td><button class="btn btn-sm btn-info">Bulanan</button></td>
                            <td>Team OB</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()
