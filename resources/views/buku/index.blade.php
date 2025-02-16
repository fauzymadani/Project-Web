@extends('layouts/app')
@section('content')
    @if (session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <body id="page-top">
        <div id="wrapper">
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    <div class="container-fluid">
                        <h1 class="h3 mb-2 text-gray-800"> Buku</h1>

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Vega books data entry</h6>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-primary mb-3" href="{{ route('buku.create') }}">Tambah Data</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Buku</th>
                                                <th>Deskripsi</th>
                                                <th>Kategori</th>
                                                <th>Nama File PDF</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            @foreach ($buku as $dept)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $dept->nama_buku }}</td>
                                                    <td>{{ $dept->deskripsi ?? 'Tidak ada deskripsi' }}</td>
                                                    <td>{{ $dept->kategori->kategori_buku ?? 'Tidak ada kategori' }}</td>
                                                    <td>
                                                        @if ($dept->file_pdf)
                                                            <a href="{{ url('uploads/pdf/' . $dept->file_pdf) }}" target="_blank">
                                                                {{ $dept->file_pdf }}
                                                            </a>
                                                        @else
                                                            Tidak ada file
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary" href="{{ url('buku/' . $dept->id . '/edit') }}">Edit</a>
                                                        <form action="{{ url('buku/' . $dept->id) }}" method="POST" style="display: inline-block">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" onclick="return confirm('Apakah Anda ingin menghapus data?')">Delete</button>
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
                </div>
            @endsection
