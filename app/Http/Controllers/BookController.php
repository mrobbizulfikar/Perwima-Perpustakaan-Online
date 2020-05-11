<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DataTables;
use Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            // $data = Book::latest()->get();
            $data = Book::with('Category')->get();

            return Datatables::of($data)->addIndexColumn()->addColumn('option', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="btn btn-primary btn-sm editItem"><i class="fa fa-edit"></i></a>
                <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fa fa-trash"></i></a>';

                return $btn;
            })->rawColumns(['option'])->make(true);
        }

        $category = Category::get();

        return view('admin.book', compact('category'));
    }

    public function search(Request $request)
    {
        $transaction = '';
        if(Auth::user()){
            $transaction = Transaction::where('user_id',Auth::user()->id)->get();
        }

        $category = Category::get();

        $r_keyword = $request->keyword;
        $r_category = $request->category;

        if(!empty($r_keyword) && empty($r_category)){
            $book = Book::where('title', 'like', "%{$r_keyword}%")->paginate(15);
        }elseif(empty($r_keyword) && !empty($r_category)){
            $book = Book::where('category_id',$r_category)->paginate(15);
        }elseif(!empty($r_keyword) && !empty($r_category)){
            $book = Book::where('title', 'like', "%{$r_keyword}%")
                    ->where('category_id',$r_category)->paginate(10);
        }else{
            $book = Book::paginate(15);
        }

        $r_category = Category::find($r_category);

        return view('pages.book.search', compact('transaction','category','r_keyword','r_category','book'));
    }

    public function detail($isbn)
    {
        $transaction = '';
        if(Auth::user()){
            $transaction = Transaction::where('user_id',Auth::user()->id)->get();
        }
        
        $category = Category::get();

        $book = Book::where('isbn',$isbn)->first();

        return view('pages.book.detail', compact('transaction','category','book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image_file');
        $item = Book::where('id',$request->item_id)->first();
        
        if($item){
            if($image){
                $imageName = uniqid() . '_' . time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('media/images/book/'), $imageName);
                File::delete(public_path('media/images/book/') . $item->image);
    
                Book::updateOrCreate(
                    ['id' => $request->item_id],
                    [
                        'category_id' => $request->category_id,
                        'isbn' => $request->isbn,
                        'title' => $request->title,
                        'description' => $request->description,
                        'image' => $imageName,
                        'author' => $request->author,
                        'publisher' => $request->publisher,
                        'year' => $request->year,
                        'page' => $request->page
                    ]
                );
            }else{
                Book::updateOrCreate(
                    ['id' => $request->item_id],
                    [
                        'category_id' => $request->category_id,
                        'isbn' => $request->isbn,
                        'title' => $request->title,
                        'description' => $request->description,
                        'author' => $request->author,
                        'publisher' => $request->publisher,
                        'year' => $request->year,
                        'page' => $request->page
                    ]
                );
            }
        }elseif(!$item){
            $imageName = uniqid() . '_' . time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('media/images/book/'), $imageName);
           
            Book::updateOrCreate(
                ['id' => $request->item_id],
                [
                    'category_id' => $request->category_id,
                    'isbn' => $request->isbn,
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $imageName,
                    'author' => $request->author,
                    'publisher' => $request->publisher,
                    'year' => $request->year,
                    'page' => $request->page
                ]
            );
        }

        return response()->json(['success'=>'Item saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Book::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Book::find($id);
        File::delete(public_path('media/images/book/') . $item->image);
        $item->delete();

        return response()->json(['success'=>'Item deleted successfully.']);
    }
}
