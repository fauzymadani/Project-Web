@extends('layouts/app')
@section('content')

@if(session('success'))
<p class="alert alert-success">{{session('success')}}</p>
@endif

<style>
.delete-btn {
    background-color: #bf616a !important;
}
</style>
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
                    <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Sisfo Peminjaman</h6>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary mb-3" href="{{route('peminjaman.create')}}">Tambah Data</a>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nisn</th>
                                            <th>Nama_Peminjam</th>
                                            <th>Tanggal_Pinjam</th>
                                            <th>Buku_Yang_Dipinjam</th>
                                            <th>Tanggal_Dikembalikan</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                       @foreach($peminjaman as $item)
<tr>
  
    <td>{{$item->nisn}}</td>
    <td>{{$item->nama_peminjam}}</td>
    <td>{{$item->tanggal_pinjam}}</td>
    <td>{{$item->buku->buku ?? 'Tidak ada '}}</td>
    <td>{{$item->tanggal_dikembalikan}}</td>
    <td>
        <a class="btn btn-sm btn-primary" href="{{ url('peminjaman/'.$item->nisn.'/edit') }}">Edit</a>
        <button class="del-btn btn btn-sm text-white" data-id="{{ $item->nisn }}">Delete</button>
        <form id="delete-form-{{$item->nisn}}" action="{{ url('peminjaman/'.$item->nisn) }}" method="POST" style="display: none;">
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
                    const nisn = this.getAttribute('data-id');
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
                            document.getElementById(`delete-form-${nisn}`).submit();
                        }
                    });
                });
            });
        });
    </script>

</body>

</html>
