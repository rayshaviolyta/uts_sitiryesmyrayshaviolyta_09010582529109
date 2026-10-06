@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')
<h3 class="mb-3">Detail Buku</h3>
<div class="card shadow-sm"><div class="card-body">
    <dl class="row mb-0">
        <dt class="col-sm-3">Judul</dt><dd class="col-sm-9">{{ $book->title }}</dd>
        <dt class="col-sm-3">Penulis</dt><dd class="col-sm-9">{{ $book->author }}</dd>
        <dt class="col-sm-3">Penerbit</dt><dd class="col-sm-9">{{ $book->publisher }}</dd>
        <dt class="col-sm-3">Tahun Terbit</dt><dd class="col-sm-9">{{ $book->year }}</dd>
        <dt class="col-sm-3">Stok</dt><dd class="col-sm-9">{{ $book->stock }}</dd>
        <dt class="col-sm-3">Kategori</dt><dd class="col-sm-9">{{ $book->category->name }}</dd>
        <dt class="col-sm-3">Deskripsi Kategori</dt><dd class="col-sm-9">{{ $book->category->description }}</dd>
        <dt class="col-sm-3">Dibuat</dt><dd class="col-sm-9">{{ $book->created_at->format('d M Y H:i') }}</dd>
        <dt class="col-sm-3">Diperbarui</dt><dd class="col-sm-9">{{ $book->updated_at->format('d M Y H:i') }}</dd>
    </dl>
</div></div>
<div class="mt-3">
    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
