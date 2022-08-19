@extends('dosen.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Ruangan {{ $tipe }}</h1>
        <hr>
        <div class="mt-2 mb-4">
            <a class="btn btn-sm btn-secondary" href="/dosen/dashboard"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                kembali</a>

        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($rooms as $room)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body shadow">
                            <img src="{{ asset('storage/' . $room->foto_ruangan) }}" class="card-img-top" width="70px"
                                height="200px" style="object-fit: cover">
                            <h5 class="card-title">{{ $room->nama_ruangan }} </h5>
                            <p class="card-text">Ket: {{ $room->keterangan }}</p>
                            <p class="card-text">Fasilitas:
                            <ul class="text-start">
                                @foreach ($room->fasilitasItem as $item)
                                    <li>{{ $item->fasilitas->nama_fasilitas }} ({{ $item->jumlah }})</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection()
