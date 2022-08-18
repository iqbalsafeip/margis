@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Ruangan Institut Teknologi Garut</h1>
        <hr>
        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 py-2 shadow">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class="text-xs font-weight-bold text-primary mb-1" style="text-decoration: none"
                                    href="/admin/dashboard/rooms/staff">
                                    RUANG STAFF</a>
                                <hr>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">4 Unit</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-person-badge fa-2x text-gray-300 "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 py-2 shadow">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class="text-xs font-weight-bold text-primary mb-1" style="text-decoration: none"
                                    href="/admin/dashboard/rooms/kelas">
                                    RUANG KELAS</a>
                                <hr>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">4 Unit</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-easel2 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 py-2 shadow">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class="text-xs font-weight-bold text-primary mb-1" style="text-decoration: none"
                                    href="/admin/dashboard/rooms/lecturer">
                                    RUANG DOSEN</a>
                                <hr>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">4 Unit</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-person-video2 fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 py-2 shadow">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class="text-xs font-weight-bold text-primary mb-1" style="text-decoration: none"
                                    href="/admin/dashboard/rooms/lab">
                                    RUANG LABORATORIUM</a>
                                <hr>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">4 Unit</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-pc-display fa-2x text-gray-300 "></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100 py-2 shadow">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <a class="text-xs font-weight-bold text-primary mb-1" style="text-decoration: none"
                                    href="/admin/dashboard/rooms/etc">
                                    RUANG LAINNYA</a>
                                <hr>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">4 Unit</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-list-ul fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-xl-2">
                <div class="card bg-primary shadow text-white mb-4">
                    <div class="card-body ">Ruang Staff</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="card bg-warning shadow text-white mb-4">
                    <div class="card-body ">Ruang Kelas</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Ruang Dosen</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Ruang Lab</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">Ruang Lainnya</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection()
