<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\User;
use App\Book;
use App\History;
use Illuminate\Http\Request;
use Auth;
use DataTables;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if(Auth::user()->level == 'admin'){
            if ($request->ajax()) {
                $data = Transaction::with('user','book')->get();

                return Datatables::of($data)->addIndexColumn()->addColumn('option', function($row){
                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem">PINJAM</a>';
                    return $btn;
                })->rawColumns(['option'])->make(true);
            }

            $user = User::get();
            $book = Book::where('status','1')->get();

            return view('admin.transaction', compact('user','book'));
        }elseif(Auth::user()->level == 'member'){
            if ($request->ajax()) {
                $data = Transaction::with('user','book')->get();

                return Datatables::of($data)->make(true);
            }

            $transaction = Transaction::where('user_id',Auth::user()->id)->get();
            
            return view('member.transaction', compact('transaction'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        Transaction::updateOrCreate(
            ['id' => $request->item_id],
            [
                'user_id' => $request->user_id,
                'book_id' => $request->book_id,
                'borrow_date' => $request->borrow_date,
                'return_date' => $request->return_date
            ]
        );

        Book::where('id',$request->book_id)->update([
            'status' => '0'
        ]);

        return response()->json(['success'=>'Item saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Transaction::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $item = Transaction::find($id);

        Book::where('id',$item->book_id)->update([
            'status' => '1'
        ]);

        $getRow = History::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $transactionId = "TR00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $transactionId = "TR0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $transactionId = "TR000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $transactionId = "TR00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $transactionId = "TR0".''.($lastId->id + 1);
            } else {
                    $transactionId = "TR".''.($lastId->id + 1);
            }
        }

        History::create([
            'transaction_id' => $transactionId,
            'user_id' => $item->user_id,
            'book_id' => $item->book_id,
            'borrow_date' => $item->borrow_date,
            'return_date' => $item->return_date,
            'submit_date' => Carbon::now(),
            'fine' => $item->fine
            ]
        );

        $item->delete();    

        return response()->json(['success'=>'Item deleted successfully.']);
    }
}
