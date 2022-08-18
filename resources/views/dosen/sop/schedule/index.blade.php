@extends('dosen.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Area Tugas </h1>
        <p class="disabled text-black-50">Ahmad Ahmudin</p>
        <hr>
        <a href="/dosen/sop" class="btn btn-secondary btn-sm mb-3"><i class="fa fa-arrow-left" aria-hidden="true"></i>
            Kembali</a>

        <div class="card shadow  w-50">
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col"> #</th>
                            <th scope="col">Area Tugas</th>
                            <th scope="col">Status</th>

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
                            <td><button class="btn btn-sm btn-success">harian</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()
