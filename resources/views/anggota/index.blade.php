@extends('layouts.app')

@section('content')

@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif

<style>
    .delete-btn {
        background-color: #bf616a !important;
    }
</style>

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Data Anggota</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Sisfo Anggota</h6>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary mb-3" href="{{ route('anggota.create') }}">Tambah Data</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Nia</th>
                                        <th>Nama Anggota</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tugas</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    @foreach($anggota as $item)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                @if ($item->foto)
                                                    <img style="max-width: 100px; max-height: 100px;" src="{{ url('foto/'.$item->foto) }}">
                                                @endif
                                            </td>
                                            <td>{{ $item->nia }}</td>
                                            <td>{{ $item->nama_anggota }}</td>
                                            <td>{{ $item->jenis_kelamin }}</td>
                                            <td>{{ $item->role->roles ?? 'Tidak ada tugas' }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ url('anggota/'.$item->nia.'/edit') }}">Edit</a>
                                                <button class="delete-btn btn btn-sm text-white" data-id="{{ $item->nia }}">Delete</button>
                                                <form id="delete-form-{{ $item->nia }}" action="{{ url('anggota/'.$item->nia) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Tambahkan SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function () {
                const nia = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak dapat dikembalikan",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${nia}`).submit();
                    }
                });
            });
        });
    });
</script>

@endsection
