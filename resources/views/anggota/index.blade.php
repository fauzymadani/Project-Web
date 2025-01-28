@extends('layouts/app')
@section('content')

@if(session('success'))
<p class="alert alert-success">{{session('success')}}</p>
@endif

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->

                <!-- End of Topbar -->

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
                            <a class="btn btn-primary mb-3" href="{{route('anggota.create')}}">Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Nia</th>
                                            <th>Nama Anggota</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Buku yang Dipinjam</th>
                                            <th>Buku Yang Dibaca</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                       @foreach($anggota as $item)
<tr>
    <td>{{$no++}}</td>
    <td>
        @if ($item->foto)
        <img style="max-width: 100px; max-height: 100px;" src="{{ url('foto/'.$item->foto) }}">
        @endif
    </td>
    <td>{{$item->nia}}</td>
    <td>{{$item->nama_anggota}}</td>
    <td>{{$item->jenis_kelamin}}</td>
    <td>{{ $item->buku ? $item->buku->nama_buku : 'Tidak ada data' }}</td>
    <td>{{$item->buku_yang_dibaca ?? 'Tidak ada data'}}</td> <!-- Tambahkan pengecekan jika null -->
    <td>{{$item->alamat}}</td>
    <td>
        <a class="btn btn-sm btn-primary" href="{{ url('anggota/'.$item->nia.'/edit') }}">Edit</a>
        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->nia }}">Delete</button>
        <form id="delete-form-{{$item->nia}}" action="{{ url('anggota/'.$item->nia) }}" method="POST" style="display: none;">
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
            @endsection
            <!-- End of Main Content -->

            <!-- Footer -->

            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- Tambahkan SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const nia = this.getAttribute('data-id');
                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data yang dihapus seperti masa lalu",
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

</body>

</html>
