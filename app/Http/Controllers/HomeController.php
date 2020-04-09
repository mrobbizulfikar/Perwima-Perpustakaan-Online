<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Category;
use App\Book;
use App\News;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaction = '';
        if(Auth::user()){
            $transaction = Transaction::where('user_id',Auth::user()->id)->get();
        }

        $category = Category::get();
        $book = Book::orderBy('created_at', 'desc')->paginate(8);
        $novel = Book::where('category_id',1)->get();
        $science = Book::where('category_id',2)->get();
        $magazine = Book::where('category_id',3)->get();
        $tutorial = Book::where('category_id',4)->get();
        
        $news = News::orderBy('created_at', 'desc')->paginate(6);

        return view('index', compact('transaction','category','book','novel','magazine','science','tutorial','news'));
    }
}
