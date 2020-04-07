<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use DataTables;

class NewsController extends Controller
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
        if ($request->ajax()) {
            $data = News::latest()->get();

            return Datatables::of($data)->addIndexColumn()->addColumn('option', function($row){
                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editItem"><i class="fa fa-edit"></i></a>';
                $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteItem"><i class="fa fa-trash"></i></a>';

                return $btn;
            })->rawColumns(['option'])->make(true);
        }

        return view('admin.news');
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
        $item = News::where('id',$request->item_id)->first();
        
        if($item){
            if($image){
                $imageName = uniqid() . '' . time() . '' . $image->getClientOriginalName();
                $image->move(public_path('media/images/news/'), $imageName);
                File::delete(public_path('media/images/news/') . $item->image);
    
                News::updateOrCreate(
                    ['id' => $request->item_id],
                    [
                        'title' => $request->title,
                        'description' => $request->description,
                        'image' => $imageName,
                        'event_date' => $request->event_date
                    ]
                );
            }else{
                News::updateOrCreate(
                    ['id' => $request->item_id],
                    [
                        'title' => $request->title,
                        'description' => $request->description,
                        'image' => $imageName,
                        'event_date' => $request->event_date
                    ]
                );
            }
        }elseif(!$item){
            $imageName = uniqid() . '' . time() . '' . $image->getClientOriginalName();
            $image->move(public_path('media/images/news/'), $imageName);
           
            News::updateOrCreate(
                ['id' => $request->item_id],
                [
                    'title' => $request->title,
                    'description' => $request->description,
                    'image' => $imageName,
                    'event_date' => $request->event_date
                ]
            );
        }

        return response()->json(['success'=>'Item saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = News::find($id);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = News::find($id);
        File::delete(public_path('media/images/news/') . $item->image);
        $item->delete();

        return response()->json(['success'=>'Item deleted successfully.']);
    }
}