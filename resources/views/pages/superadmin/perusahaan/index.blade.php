@extends('layouts.app-admin')
@section('title', 'Kelola Perusahaan')

@push('css')
    <link rel="stylesheet" href="{{ asset('vendor/DataTables/datatables.min.css') }}">
@endpush

@section('content')

    <div class="card p-3">
        <div class="d-flex justify-content-between">
            <h3 class="text-primary">Kelola Perusahaan</h3>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAddPerusahaan">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
        <hr>
        <table class="table table-striped" id="example">
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Perusahaan</td>
                    <td>Alamat</td>
                    <td>Nomor Telepon</td>
                    <td>Email</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($perusahaan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->nomor_telp }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#modalAddOwner{{ $item->id }}"
                                class="btn btn-success"><i class="fa-solid fa-user-tie"></i></button>
                            <button type="button" data-toggle="modal" data-target="#modalEditPerusahaan{{ $item->id }}"
                                class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                                <a href="{{ route('delete.perusahaan', $item->id) }}" 
                                    class="btn btn-danger btn-delete" 
                                    data-id="{{ $item->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Add Owner -->
    @foreach ($perusahaan as $item)
        <div class="modal fade" id="modalAddOwner{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalAddOwner" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalAddOwnerLabel">Assign Owner</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('store.perusahaan', $item->id) }}" enctype="multipart/form-data" id="formTambahOwner{{ $item->id }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" required name="id" class="form-control" value="{{ $item->id }}">
                            </div>
                            <div class="form-group">
                                <label for="user_id">Owner</label>
                                <select class="form-control" name="user_id" required>
                                    <option value="" disabled selected>Pilih owner</option>
                                    @foreach ($owner as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-transparent text-primary"
                            data-dismiss="modal">Tutup</button>
                        <button type="submit" form="formTambahOwner{{ $item->id }}" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Modal Add Perusahaan -->
    <div class="modal fade" id="modalAddPerusahaan" tabindex="-1" role="dialog" aria-labelledby="modalAddPerusahaanLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalAddPerusahaanLabel">Tambah Perusahaan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('store.perusahaan') }}" enctype="multipart/form-data"
                        id="formStorePerusahaan">
                        @csrf
                        <div class="form-group">
                            <label for="namaPerusahaan">Nama Perusahaan</label>
                            <input type="text" name="nama" required class="form-control" id="namaPerusahaan"
                                placeholder="Masukkan nama perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="namaPerusahaan">Alamat</label>
                            <input type="text" required name="alamat" class="form-control" id="namaPerusahaan"
                                placeholder="Masukkan alamat perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="namaPerusahaan">Nomor Telepon</label>
                            <input type="text" required name="nomor_telp" class="form-control" id="namaPerusahaan"
                                placeholder="Masukkan nomor telepon perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="namaPerusahaan">Email</label>
                            <input type="text" required name="email" class="form-control" id="namaPerusahaan"
                                placeholder="Masukkan email perusahaan">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-transparent text-primary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success" form="formStorePerusahaan">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Perusahaan -->
    @foreach ($perusahaan as $item)
        <div class="modal fade" id="modalEditPerusahaan{{ $item->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modalEditPerusahaan" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="modalAddPerusahaanLabel">Edit Perusahaan</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('store.perusahaan', $item->id) }}" enctype="multipart/form-data" id="formEditPerusahaan{{ $item->id }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" required name="id" class="form-control" value="{{ $item->id }}"
                                    placeholder="Masukkan nama perusahaan" hidden>
                            </div>
                            <div class="form-group">
                                <label for="namaPerusahaan">Nama Perusahaan</label>
                                <input type="text" required name="nama" class="form-control" value="{{ $item->nama }}"
                                    placeholder="Masukkan nama perusahaan">
                            </div>
                            <div class="form-group">
                                <label for="namaPerusahaan">Alamat</label>
                                <input type="text" required name="alamat" class="form-control" value="{{ $item->alamat }}"
                                    placeholder="Masukkan alamat perusahaan">
                            </div>
                            <div class="form-group">
                                <label for="namaPerusahaan">Nomor Telepon</label>
                                <input type="text" required name="nomor_telp" class="form-control" value="{{ $item->nomor_telp }}"
                                    placeholder="Masukkan nomor telepon perusahaan">
                            </div>
                            <div class="form-group">
                                <label for="namaPerusahaan">Email</label>
                                <input type="text" required name="email" class="form-control" value="{{ $item->email }}"
                                    placeholder="Masukkan email perusahaan">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-transparent text-primary"
                            data-dismiss="modal">Tutup</button>
                        <button type="submit" form="formEditPerusahaan{{ $item->id }}" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection

@push('js')
    <script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                pageLength: 10
            });
        });
        </script>

    @if (session('success'))
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    title: "Berhasil!",
                    text: "{{ session('success') }}",
                    icon: "success",
                    confirmButtonText: "OK"
                });
            });
        </script>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll(".btn-delete").forEach(button => {
                button.addEventListener("click", function(event) {
                    event.preventDefault();
                    
                    let url = this.getAttribute("href");
                    
                    Swal.fire({
                        title: "Yakin ingin menghapus?",
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, hapus!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = url;
                        }
                    });
                });
            });
        });
    </script>    
@endpush
