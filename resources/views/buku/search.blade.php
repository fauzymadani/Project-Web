@extends('layouts.index.fetch')

@section('content')
<div class="search-container">
  <h2 class="search-header">
    Hasil pencarian untuk: <span class="query-text">"{{ $query }}"</span>
  </h2>

  {{-- Info hits dan paging --}}
  @php
    $totalHits = $buku->count() + $results->total();
    $showingFrom = $results->firstItem() ?? 0;
    $showingTo = $results->lastItem() ?? 0;
    $timeTaken = 0.0012; // Contoh, bisa kirim waktu dari backend kalau perlu
  @endphp
  <p class="search-info">{{ $showingFrom }}-{{ $showingTo }} dari total <strong>{{ $totalHits }}</strong> hasil ditemukan dalam {{ number_format($timeTaken, 6) }} detik</p>

  {{-- Daftar Buku --}}
  @if($buku->count())
    <section class="search-section">
      <h3>📚 Buku</h3>
      <ul class="search-list">
        @foreach ($buku as $book)
          <li class="search-item">
            <a href="{{ asset('uploads/pdf/' . $book->file_pdf) }}" target="_blank" rel="noopener noreferrer" class="search-link" title="Buka {{ $book->nama_buku }} (PDF)">
              {{ $book->nama_buku }}
              <span class="external-icon" aria-hidden="true" title="Link eksternal">
                <!-- Icon panah external link mirip Wikipedia -->
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-external-link" viewBox="0 0 24 24">
                  <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
                  <polyline points="15 3 21 3 21 9"/>
                  <line x1="10" y1="14" x2="21" y2="3"/>
                </svg>
              </span>
            </a>
          </li>
        @endforeach
      </ul>
    </section>
  @else
    <p class="empty-message">Tidak ada buku yang cocok dengan pencarian Anda.</p>
  @endif

  {{-- Daftar Artikel --}}
  @if($results->count())
    <section class="search-section">
      <h3>Artikel terkait</h3>
      <ul class="search-list">
        @foreach($results as $item)
   <li class="search-item" style="list-style: none;">
    <a href="{{ route('artikel.show', $item->slug) }}" class="search-link" title="Baca artikel {{ $item->title }}">
      <h4>
      {{ $item->title }}
      <span class="external-icon" aria-hidden="true" title="Link eksternal">
        <!-- icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-external-link" viewBox="0 0 24 24">
          <path d="M18 13v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
          <polyline points="15 3 21 3 21 9"/>
          <line x1="10" y1="14" x2="21" y2="3"/>
        </svg>
        <!-- svg di sini -->
      </span>
      </h4>
    </a>

    @php
      $content = $item->content;
      $content = preg_replace('/!\[.*?\]\(.*?\)/', '', $content); // hapus gambar
      $content = preg_replace('/^#{1,6}\s*(.*)/m', '$1', $content); // hapus heading
      $parsed = Illuminate\Support\Str::markdown(\Illuminate\Support\Str::words($content, 50, '...'));
    @endphp

    <div class="markdown-preview">
      {!! $parsed !!}
    </div>
    </li>
    @endforeach
      </ul>

      {{-- Pagination --}}
      <div class="pagination-wrapper">
        {{ $results->withQueryString()->links() }}
      </div>
    </section>
  @else
    <p class="empty-message">Tidak ditemukan artikel terkait untuk pencarian Anda.</p>
  @endif
</div>
@endsection

@push('styles')
<style>
  .search-container {
    max-width: 720px;
    margin: 2rem auto;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
      Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
    color: #1a1a1a;
  }

  .search-header {
    font-size: 1.8rem;
$artikel = \App\Models\Article::where('title', 'like', "%{$query}%")
    ->orWhere('content', 'like', "%{$query}%")
    ->paginate(10);  // jangan pakai ->get() setelah paginate
    font-weight: 700;
    margin-bottom: 0.25rem;
  }

  .query-text {
    color: #0066cc;
  }

  .search-info {
    font-size: 0.875rem;
    color: #666;
    margin-bottom: 1.5rem;
    font-style: italic;
  }

  .search-section {
    margin-bottom: 2rem;
  }

  .search-section h3 {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 0.8rem;
    border-bottom: 2px solid #0066cc;
    padding-bottom: 0.2rem;
  }

  .search-list {
    list-style: none;
    padding-left: 0;
    margin: 0;
  }

  .markdown-preview ul,
  .markdown-preview ol {
    list-style: none;
    padding-left: 0;
    margin-left: 0;
    }

  .markdown-preview li {
      margin-left: 0;
    }


  .search-item {
    margin-bottom: 0.75rem;
  }

  .search-link {
    text-decoration: none;
    color: #0645ad;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    transition: color 0.2s ease;
  }

  .search-link:hover,
  .search-link:focus {
    color: #0b47a1;
    text-decoration: underline;
  }

  .external-icon {
    display: inline-flex;
    vertical-align: middle;
  }

  .icon-external-link {
    stroke: #0645ad;
  }

  .empty-message {
    font-style: italic;
    color: #777;
    margin-top: 0.5rem;
  }

  .pagination-wrapper {
    margin-top: 1.5rem;
    text-align: center;
  }

  /* Responsive */
  @media (max-width: 480px) {
    .search-container {
      padding: 0 1rem;
    }

    .search-header {
      font-size: 1.4rem;
    }

    .search-section h3 {
      font-size: 1.1rem;
    }
  }
</style>
@endpush

