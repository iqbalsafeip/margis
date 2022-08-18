@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Daftar Pengguna</h1>
        <hr>
        <button type="button" class="btn btn-primary btn-md mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
            + Tambah Pengguna
        </button>
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Pengguna</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    id="username" name="username" placeholder="username">
                                @if ($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username') }}</span>
                                @endif
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="name@example.com">
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                                <label for="email">Email</label>
                            </div>
                            <div class="radio">Pilih role <br>
                                <input class="form-check-input" type="radio" name="role" id="admin" value="admin"
                                    checked>
                                <label class="form-check-label" for="admin">
                                    admin
                                </label>
                                <input class="form-check-input" type="radio" name="role" id="dosen" value="dosen"
                                    checked>
                                <label class="form-check-label" for="dosen">
                                    dosen
                                </label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-bordered w-50 shadow text-center">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($users as $user)
                    @if ($user->role != 'admin')
                        <tr>
                            <th scope="row">{{ $no++ }}</th>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="/admin/user/{{ $user->id }}/edit" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $user['id'] }}"
                                    class="btn edit"style="color: rgb(128, 87, 223)">
                                    <i class="bi bi-pencil-fill"></i></a>|
                                <!-- Start Edit user Modal -->
                                <div class="modal fade" style="left: 0px" id="editModal{{ $user['id'] }}" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel"><b>Edit Jabatan</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/user/{{ $user->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-floating pb-3">
                                                        <input type="text" class="form-control"
                                                            style="border-radius: 10px" name="username" id="username"
                                                            placeholder="username"
                                                            value="{{ old('username', $user->username) }}">
                                                        <label for="username">Username</label>
                                                    </div>
                                                    <div class="form-floating pb-3">
                                                        <input type="email" class="form-control"
                                                            style="border-radius: 10px" name="email" id="email"
                                                            placeholder="email" value="{{ old('email', $user->email) }}">
                                                        <label for="email">Email</label>
                                                    </div>
                                                    <div class="text-start">
                                                        <div class="mb-3">
                                                            <div class="radio">Pilih role <br>
                                                                <input class="form-check-input" type="radio"
                                                                    name="role" id="admin" value="admin" checked>
                                                                <label class="form-check-label" for="admin">
                                                                    admin
                                                                </label>
                                                                <input class="form-check-input" type="radio"
                                                                    name="role" id="dosen" value="dosen" checked>
                                                                <label class="form-check-label" for="dosen">
                                                                    dosen
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-floating pb-3">
                                                        <input type="password" class="form-control"
                                                            style="border-radius: 10px" name="password" id="password"
                                                            placeholder="password">
                                                        <label for="password">Password</label>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Edit user Modal -->
                                <a class="btn" style="color: red">
                                    <i class="bi bi-trash-fill" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $user['id'] }}"></i></a>
                                <!-- Start Delete User Modal -->
                                <div class="modal fade" style="left: 0px" id="deleteModal{{ $user['id'] }}"
                                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="/admin/user/{{ $user->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body mt-3">
                                                    <div class="mb-3">
                                                        <h5>Apakah anda yakin menghapus pengguna
                                                            {{ $user->username }} ?
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection()
