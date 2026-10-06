@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')
<h3 class="mb-3">Edit Buku</h3>
<div class="card shadow-sm"><div class="card-body">
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        @include('books._form')
        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div></div>
@endsection
