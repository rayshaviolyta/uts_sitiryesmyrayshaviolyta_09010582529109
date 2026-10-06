@php
    $fields = [
        'title' => ['Judul', 'text'],
        'author' => ['Penulis', 'text'],
        'publisher' => ['Penerbit', 'text'],
        'year' => ['Tahun Terbit', 'number'],
        'stock' => ['Stok', 'number'],
    ];
@endphp

@foreach ($fields as $name => [$label, $type])
    <div class="mb-3">
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
               value="{{ old($name, $book->$name ?? '') }}"
               class="form-control @error($name) is-invalid @enderror" required>
        @error($name)
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endforeach

<div class="mb-3">
    <label for="category_id" class="form-label">Kategori</label>
    <select id="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id', $book->category_id ?? '') == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
