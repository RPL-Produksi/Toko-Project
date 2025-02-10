@extends('layouts.app-admin')
@section('title', 'Dashboard')

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
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($perusahaan as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <button type="button" data-toggle="modal" data-target="#modalEditPerusahaan"
                                class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></button>
                            <a href="" onclick="" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


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
                    <form method="POST" action="{{ route('store.perusahaan') }}" enctype="multipart/form-data" id="formStorePerusahaan">
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
    <div class="modal fade" id="modalEditPerusahaan" tabindex="-1" role="dialog" aria-labelledby="modalEditPerusahaan"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalAddPerusahaanLabel">Edit Perusahaan</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="namaPerusahaan">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="namaPerusahaan"
                                placeholder="Masukkan nama perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="namaPerusahaan">Alamat</label>
                            <input type="text" class="form-control" id="namaPerusahaan"
                                placeholder="Masukkan alamat perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="namaPerusahaan">Nomor Telepon</label>
                            <input type="text" class="form-control" id="namaPerusahaan"
                                placeholder="Masukkan nomor telepon perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="namaPerusahaan">Email</label>
                            <input type="text" class="form-control" id="namaPerusahaan"
                                placeholder="Masukkan email perusahaan">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-transparent text-primary" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                pageLength: 5
            });
        });
    </script>
@endpush
