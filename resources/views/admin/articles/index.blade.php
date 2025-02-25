@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Manajemen Artikel</h1>

    <!-- Tombol Buat Artikel Baru -->
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary mb-3">📝 Buat Artikel Baru</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm">✏️ Edit</a>

                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin mau hapus?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑️ Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $articles->links() }}
    </div>
</div>
@endsection

