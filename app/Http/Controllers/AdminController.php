<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookCategory;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        $transactions = Transaction::latest()->get();
        $transactionList = [];
        foreach($transactions as $transaction) {
            $transactionList[$transaction->id] = [
                'id' => $transaction->id,
                'username' => User::where('id', $transaction->user_id)->value('name'),
                'book_title' => Book::where('id', $transaction->book_id)->value('title'),
                'status' => $transaction->status,
                'created' => $transaction->created_at,
                'return_date' => $transaction->updated_at
            ];
        }
        return view('admin.transaction', compact('transactionList'));
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
        return redirect()->route('admin.catalog')->with('status', 'Book created successfully.');
    }

    public function show(Book $book) {
        $bookCategory = BookCategory::all()->find($book->book_category_id);
        return view('admin.show', compact('book', 'bookCategory'));
    }

    public function edit(Book $book) {
        $bookCategory = BookCategory::orderBy('name', 'ASC')->get();
        $currentBookCategory = BookCategory::all()->find($book->book_category_id);
        return view('admin.editBook', compact('book', 'bookCategory', 'currentBookCategory'));
    }

    public function update(Request $request, Book $book) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'location' => 'required',
            'publisher' => 'required',
            'print_year' => 'required|integer',
            'book_category_id' => 'required|exists:book_categories,id',
        ]);
        if($request->hasFile('image')) {
            File::delete(storage_path('app/public/img/books/' . $book->cover));
            $file = $request->file('image');
            $filename = rand() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/img/books', $filename);
            $book->update([
                'title' => $request->title,
                'cover' => $filename,
                'author' => $request->author,
                'location' => $request->location,
                'publisher' => $request->publisher,
                'print_year' => $request->print_year,
                'book_category_id' => $request->book_category_id,
            ]);
        } else
            $book->update($request->all());
        return redirect()->route('admin.show', $book->id)->with('status', 'Book updated successfully.');
    }

    public function destroy(Book $book) {
        File::delete(storage_path('app/public/img/books/' . $book->cover));
        $book->delete();
        return redirect()->route('admin.catalog')->with('status', 'Book deleted successfully.');
    }

    public function createTransaction() {
        $users = User::where('is_admin', 0)->orderBy('name', 'ASC')->get();
        $books = Book::orderBy('title', 'ASC')->get();
        return view('admin.createTransaction', compact('users', 'books'));
    }

    public function storeTransaction(Request $request) {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
        ]);
        Transaction::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'status' => 'Not returned'
        ]);
        return redirect()->route('admin.transaction')->with('status', 'Transaction created successfully.');
    }

    public function updateTransaction($id) {
        $transaction = Transaction::find($id);
        $transaction->update([
            'status' => 'Returned'
        ]);
        return redirect()->route('admin.transaction')->with('status', 'Transaction updated successfully.');
    }

}
