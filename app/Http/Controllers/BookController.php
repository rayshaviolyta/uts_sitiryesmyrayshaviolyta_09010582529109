<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    // Read (daftar) + bonus: pencarian judul/penulis dan filter kategori
    public function index(Request $request): View
    {
        $books = Book::with('category')
            ->when($request->filled('search'), function ($query) use ($request) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('author', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('category_id'), function ($query) use ($request) {
                $query->where('category_id', $request->category_id);
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('books.index', [
            'books' => $books,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    // Create (form)
    public function create(): View
    {
        return view('books.create', [
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    // Create (simpan)
    public function store(Request $request): RedirectResponse
    {
        Book::create($this->validated($request));

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    // Read (detail)
    public function show(Book $book): View
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }

    // Update (form)
    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    // Update (simpan)
    public function update(Request $request, Book $book): RedirectResponse
    {
        $book->update($this->validated($request));

        return redirect()->route('books.index')->with('success', 'Buku berhasil diperbarui.');
    }

    // Delete
    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'publisher' => ['required', 'string', 'max:255'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'stock' => ['required', 'integer', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);
    }
}
