<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\BookCategory;
use App\Transaction;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $books = Book::all()->shuffle()->take(4);
        return view('user.index', compact('books'));
    }

    public function showCatalog() {
        $books = Book::latest()->paginate(4);
        return view('user.catalog', compact('books'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function showBook(Book $book) {
        $bookCategory = BookCategory::all()->find($book->book_category_id);
        return view('user.showBook', compact('book', 'bookCategory'));
    }

    public function showTransaction() {
        $id = Auth::id();
        $transactions = Transaction::where('user_id', $id)->get();
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
        return view('user.transaction', compact('transactionList'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
