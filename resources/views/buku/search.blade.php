@extends('layouts.index.fetch')

@section('content')
  <h2>Hasil pencarian untuk: "{{ $query }}"</h2>
  @if($results->count())
    <ul class="list-group">
      @foreach($results as $buku)
        <li class="list-group-item">
          <strong>{{ $buku->nama_buku }}</strong>
          @if(isset($buku->pengarang))
            - {{ $buku->pengarang }}
          @endif
        </li>
      @endforeach
    </ul>
  @else
    <p>Tidak ditemukan hasil untuk pencarian Anda.</p>
  @endif
@endsection
