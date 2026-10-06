<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'totalBooks' => Book::count(),
            'totalCategories' => Category::count(),
            'totalStock' => Book::sum('stock'),
            'latestBooks' => Book::with('category')->latest()->take(5)->get(),
        ]);
    }
}
