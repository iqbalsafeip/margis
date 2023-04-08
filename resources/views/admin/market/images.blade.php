@extends('admin.layouts.main')

@section('content')
<div class="row mt-4">

    <div class="col-8">
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Gambar
        </button>
        <div class="card">
            <div class="card-header">
                <div class="card-action">

                </div>
                @lang('Gambar Market')
            </div>



            <div class="card-body">
                <div class="row">
                    @foreach ($market->gambar as $i => $g)
                    <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <!-- <div class="carousel-item {{ $i === 0 ? 'active' : null }}"> -->
                    <!-- <button class="btn btn-danger" style="z-index: 999; ">hapus</button> -->

                    <img src="{{URL::to('/')}}/gambar/{{ $g->doc }}" class="w-100 shadow-1-strong rounded mb-4" alt="...">
                    <!-- </div> -->
                    </div>
                    @endforeach
                </div>
                <!-- <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel"> -->
                <!-- <div class="carousel-inner"> -->


                <!-- </div> -->
                <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> -->
                <!-- </div> -->
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header">

                @lang('Market Map')
            </div>



            <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($market->gambar as $i => $g)
                        <div class="carousel-item {{ $i === 0 ? 'active' : null }}">
                            <!-- <img src="http://sigmarket.itg.ac.id/public/gambar/{{ $g->doc }}" class="d-block w-100" alt="..."> -->
                        </div>
                        @endforeach

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <span style="font-size: 16px; font-weight: bold;">Nama Perusahaan : </span> <br>
                <span>{{ $market->nama_perusahaan }}</span><br>
                <span style="font-size: 16px; font-weight: bold;">Kecamatan : </span> <br>
                <span>{{ $market->kecamatan->name }}</span><br>
                <span style="font-size: 16px; font-weight: bold;">Tipe Market : </span> <br>
                <span>{{ $market->tipe_market }}</span><br>
                <span style="font-size: 16px; font-weight: bold;">Alamat : </span> <br>
                <span>{{ $market->alamat }}</span><br>
                <span style="font-size: 16px; font-weight: bold;">Koordinat : </span> <br>
                <span>{{ $market->longitude }}, {{ $market->latitude }}</span><br>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('market.addImage', $market->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <label for="files" class="form-label">Select files:</label>
                        <input type="file" id="files" required name="gambar[]" class="form-control" multiple>
                        <button type="submit" class="btn btn-primary">Upload</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('skrip')

@endsection