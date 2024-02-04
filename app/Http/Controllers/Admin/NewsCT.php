<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\NewsUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class NewsCT extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = DB::table('posts as p')
        ->select('p.id', 'p.image', 'p.title', 'p.content', 'p.updated_at', 'u.id as user_id', 'u.username', 'c.id as category_id', 'c.category_name')
        ->leftJoin('users as u', 'p.user_id', '=', 'u.id')
        ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
        ->get();

        if ( request()->ajax() ) {
            return DataTables::of($news)
                ->addColumn('content', function($row) {
                    $content = strlen($row->content) > 50 ? substr($row->content, 0, 50) .'...' : $row->content;
                    return htmlspecialchars_decode($content);
                })
                ->addColumn('action', function($row) {
                    $buttons = '<div style="display: flex; justify-content: center; align-items: center; gap: 10px">
                                    <a href="/admin/news/edit/'. $row->id .'" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                    <form id="'. $row->id .'" action="'. route('news_admin_destroy', $row->id) .'" method="POST">
                                        '. csrf_field() .'
                                        '. method_field('DELETE') .'
                                        <button type="button" class="btn btn-danger" id="news-admin-destroy" data-form-id="'. $row->id .'"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </div>';
                    
                    return $buttons;
                })
                ->rawColumns(['action', 'content'])
                ->make();
        }
        
        return view('admin.news.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('updated_at', 'DESC')->get();
        return view('admin.news.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        
        if ( strlen($request->input('title')) > 255 ) {
            Alert::error('Gagal', 'Judul tidak boleh lebih dari 255 kata!');
            return redirect()->back();
        }
        
        $news = $request->validated();
        try {
            $news['image'] = $request->file('image')->store('uploads');
        } catch ( \Exception $e ) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        // Insert to database
        Post::create($news + ['user_id' => Auth::user()->id]);
        Alert::success('Berhasil', 'Berita berhasil ditambahkan!');
        return redirect()->route('news_admin');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categories = Category::orderBy('updated_at', 'DESC')->get();
        $news =  DB::table('posts as p')
        ->select('p.id', 'p.image', 'p.title', 'p.content', 'p.updated_at', 'u.id as user_id', 'u.username', 'c.id as category_id', 'c.category_name')
        ->leftJoin('users as u', 'p.user_id', '=', 'u.id')
        ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
        ->where('p.id', $id)
        ->first();
        
        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        if ( strlen($request->input('title')) > 255 ) {
            Alert::error('Gagal', 'Judul tidak boleh lebih dari 255 kata!');
            return redirect("/admin/news/edit/$id");
        }

        $newsValidate = $request->validated();

        if ( $request->hasFile('image') ) {
            $newsValidate['image'] = $request->file('image')->store('uploads');
        }

        Post::where('id', $id)->update($newsValidate);
        Alert::success('Berhasil', 'Berita berhasil disunting!');
        return redirect()->route('news_admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();
        Alert::success('Berhasil', 'Berita berhasil dihapus!');
        return redirect()->back();
    }
}
