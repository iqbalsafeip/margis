@extends('dosen.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Petugas Kebersihan</h1>
        <hr>

        <div class="row">
            <div class="row d-flex justify-content-lg-start align-items-center h-100">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card shadow" style="border-radius: 5px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    <img src="/img/avatar.jpg"class="img-fluid img-thumbnail"
                                        style="width: 180px; height: 160px; border-radius: 10px; object-fit: cover">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Ahmad Ahmudin </h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Head Of Office Boy</p>
                                    <div class="d-flex pt-1">
                                        <a type="button" class="btn btn-outline-primary me-1 flex-grow-1"
                                            href="/dosen/sop/schedule"><i style="color: white"
                                                class="bi bi-file-earmark-text-fill" aria-hidden="true"></i>
                                            Tugas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row  mt-3">
            <div class="row d-flex justify-content-lg-start align-items-center h-100">
                <div class="col col-md-9 col-lg-7 col-xl-5">
                    <div class="card shadow" style="border-radius: 5px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">
                                <div class="flex-shrink-0">
                                    <img src="/img/avatar.jpg"class="img-fluid img-thumbnail"
                                        style="width: 180px; height: 160px; border-radius: 10px; object-fit: cover">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Ahmad Ahmudin </h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Head Of Office Boy</p>

                                    <div class="d-flex pt-1">
                                        <a type="button" class="btn btn-outline-primary me-1 flex-grow-1"
                                            href="/dosen/sop/schedule"><i style="color: white"
                                                class="bi bi-file-earmark-text-fill" aria-hidden="true"></i>
                                            Tugas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection()
