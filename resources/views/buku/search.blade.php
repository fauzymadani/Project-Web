@extends('layouts.app')

@section('content')
  <h2>Hasil pencarian untuk: "{{ $query }}"</h2>
  @if($results->count())
    <ul class="list-group">
      @foreach($results as $buku)
        <li class="list-group-item">
          <strong>{{ $buku->judul }}</strong> - {{ $buku->pengarang }}
        </li>
      @endforeach
    </ul>
  @else
    <p>Tidak ditemukan hasil untuk pencarian Anda.</p>
  @endif
@endsection
