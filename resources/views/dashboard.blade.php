@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h3 class="mb-4">Dashboard</h3>

<div class="row g-3 mb-4">
    <div class="col-md-4">
        <div class="card text-bg-primary"><div class="card-body">
            <div class="small">Total Buku</div>
            <div class="fs-2 fw-bold">{{ $totalBooks }}</div>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-success"><div class="card-body">
            <div class="small">Total Kategori</div>
            <div class="fs-2 fw-bold">{{ $totalCategories }}</div>
        </div></div>
    </div>
    <div class="col-md-4">
        <div class="card text-bg-warning"><div class="card-body">
            <div class="small">Total Stok</div>
            <div class="fs-2 fw-bold">{{ $totalStock }}</div>
        </div></div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Buku Terbaru</span>
        <a href="{{ route('books.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
    </div>
    <div class="table-responsive">
        <table class="table mb-0">
            <thead><tr><th>Judul</th><th>Penulis</th><th>Kategori</th><th>Stok</th></tr></thead>
            <tbody>
            @forelse ($latestBooks as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->stock }}</td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center text-muted">Belum ada data.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
