<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookCategory;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $books = Book::latest()->paginate(4);
        return view('admin.catalog', compact('books'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function showDashboard() {
        return view('admin.index');
    }

    public function showTransaction() {
        return view('admin.transaction');
    }
    
    public function showMember() {
        return view('admin.member');
    }

    public function create() {
        $bookCategory = BookCategory::orderBy('name', 'ASC')->get();
        return view('admin.createBook', compact('bookCategory'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'location' => 'required',
            'publisher' => 'required',
            'print_year' => 'required|integer',
            'book_category_id' => 'required|exists:book_categories,id',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = rand() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img/books', $filename);
            $book = Book::create([
                'title' => $request->title,
                'cover' => $filename,
                'author' => $request->author,
                'location' => $request->location,
                'publisher' => $request->publisher,
                'print_year' => $request->print_year,
                'book_category_id' => $request->book_category_id,
            ]);
        }
        return redirect()->route('admin.catalog')->with('success', 'Book created successfully.');
    }

    public function show(Book $book) {
        return view('book.show', compact('book'));
    }

    public function edit(Book $book) {
        return view('book.edit', compact('book'));
    }

    public function update(Request $request, Book $book) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'location' => 'required',
            'publisher' => 'required',
            'print_year' => 'required',
            'book_category_id' => 'required',
        ]);
        $book::update($request->all());
        return redirect()->route('admin.catalog')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book) {
        $book->delete();
        return redirect()->route('admin.catalog')->with('success', 'Book deleted successfully.');
    }

}
