@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
<h3 class="mb-3">Tambah Buku</h3>
<div class="card shadow-sm"><div class="card-body">
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        @include('books._form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
