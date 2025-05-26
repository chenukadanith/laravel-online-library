<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
  public function index()
    {
        return Book::where('is_available', true)->get();
    }

public function search(Request $request)
{
    $query = Book::query();

    if ($search = $request->input('search')) {
        $query->where('title', 'like', "%{$search}%")
              ->orWhere('description', 'like', "%{$search}%")
              ->orWhere('genre', 'like', "%{$search}%");
    }

    return $query->get();
}

    public function borrow(Book $book)
    {
        if (!$book->is_available) {
            return response()->json(['message' => 'Book is not available'], 400);
        }

        $book->update(['is_available' => false]);
        return response()->json(['message' => 'Book borrowed successfully']);
    }

    public function return(Book $book)
    {
        if ($book->is_available) {
            return response()->json(['message' => 'Book is already available'], 400);
        }

        $book->update(['is_available' => true]);
        return response()->json(['message' => 'Book returned successfully']);
    }
}