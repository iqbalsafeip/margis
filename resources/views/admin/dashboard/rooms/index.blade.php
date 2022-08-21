@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Ruangan {{ $tipe }}</h1>
        <p class="text-muted" style="font-size: 12px"><i>*pastikan sudah menambah petugas dan fasilitas</i></p>
        <hr>
        <div class="mt-2 mb-4">
            <a class="btn btn-sm btn-secondary" href="/admin/dashboard"><i class="fa fa-arrow-left" aria-hidden="true"></i>
                kembali</a>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                + Tambah Ruang {{ $tipe }}
            </button>
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border-radius: 10px">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addModalLabel">Tambah Ruangan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('store', $tipe) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="{{ $type }}">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="foto_ruangan" class="form-label">Upload Foto Ruangan</label>
                                    <input class="form-control" type="file" id="foto_ruangan" name="foto_ruangan"
                                        multiple>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan"
                                        placeholder="nama_ruangan">
                                    <label for="nama_ruangan">Nama Ruangan</label>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" name="petugas">
                                        <option selected>Pilih Petugas Penanggung Jawab</option>
                                        @foreach ($officers as $off)
                                            <option value="{{ $off->nama_petugas }}">{{ $off->nama_petugas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="fasilitas"> Pilih fasilitas ruangan</label>
                                    @foreach ($data as $fasilitas)
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" name="fasilitas[]" type="checkbox"
                                                    value="{{ $fasilitas->id }}" id="fasilitas{{ $fasilitas->id }}">
                                                <label class="form-check-label" for="fasilitas{{ $fasilitas->id }}">
                                                    {{ $fasilitas->nama_fasilitas }}
                                                </label>
                                                <label for="jumlah"></label>
                                                <input type="text" name="jumlah[{{ $fasilitas->id }}]" id="jumlah"
                                                    placeholder="..." style="border: 0ch; width: 25px" class="shadow-sm">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($rooms as $room)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body shadow">
                            <img src="{{ asset('storage/' . $room->foto_ruangan) }}" class="card-img-top" width="70px"
                                height="200px" style="object-fit: cover">
                            <h5 class="card-title">{{ $room->nama_ruangan }}<a
                                    href="/admin/dashboard/rooms/{{ $room->id }}/edit" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $room['id'] }}"><i style="color: darkgoldenrod"
                                        class="fas fa-edit fa-sm  "></i></a></h5>
                            <div class="modal fade" id="editModal{{ $room['id'] }}" tabindex="-1"
                                aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 10px">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">Edit Ruangan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('update', $tipe) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $room->id }}">
                                            <input type="hidden" name="type" value="{{ $type }}">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="foto_ruangan" class="form-label">Upload Foto
                                                        Ruangan</label>
                                                    <input class="form-control" type="file" id="foto_ruangan"
                                                        name="foto_ruangan" multiple>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="nama_ruangan"
                                                        name="nama_ruangan" placeholder="nama_ruangan"
                                                        value="{{ old('nama_ruangan', $room->nama_ruangan) }}">
                                                    <label for="nama_ruangan">Nama Ruangan</label>
                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-select" name="petugas">
                                                        <option selected>Pilih Petugas Penanggung Jawab</option>
                                                        @foreach ($officers as $off)
                                                            <option value="{{ $off->id }}">{{ $off->nama_petugas }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="fasilitas"> Pilih fasilitas ruangan</label>
                                                    @foreach ($data as $fasilitas)
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="fasilitas[]"
                                                                type="checkbox" value="{{ $fasilitas->id }}"
                                                                id="fasilitas{{ $fasilitas->id }}">
                                                            <label class="form-check-label"
                                                                for="fasilitas-{{ $fasilitas->id }}">
                                                                {{ $fasilitas->nama_fasilitas }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <p class="card-text">Penanggung Jawab: {{ $room->petugas }}</p>
                            <p class="card-text">Fasilitas:
                            <ul class="text-start">
                                @foreach ($room->fasilitasItem as $item)
                                    <li>{{ $item->fasilitas->nama_fasilitas }} ({{ $item->jumlah }})</li>
                                @endforeach
                            </ul>
                            </p>
                            <a href="{{ route('edit', $room->id) }}" class="btn btn-md float-end" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $room['id'] }}"><i style="color:red"
                                    class="fas fa-trash fa-lg  "></i></a>
                            <div class="modal fade" id="deleteModal{{ $room['id'] }}" tabindex="-1"
                                aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 10px">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel"></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('destroy', $room->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                <h4>Apakah anda yakin menghapus ruangan {{ $room->nama_ruangan }}?</h4>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection()
