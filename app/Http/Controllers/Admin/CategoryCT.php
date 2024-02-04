<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CategoryCT extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::orderBy('updated_at', 'DESC')->get();

        if ( request()->ajax() ) {

            return DataTables::of($data)
                ->addColumn('updated_at', function($row) {
                    return Carbon::parse($row->updated_at)->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function($row) {
                    $buttons = '<div style="display: flex; justify-content: center; align-items: center; gap: 10px">
                    <button type="button" class="btn btn-warning edit-btn" data-bs-toggle="modal" data-bs-target="#edit-category'. $row->id .'"><i class="bi bi-pencil-square"></i></button>
                    <form id="'. $row->id .'" action="'. route('category_admin_destroy', $row->id) .'" method="POST">
                        '. csrf_field() .'
                        '. method_field('DELETE') .'
                        <button type="button" class="btn btn-danger" id="category-admin-destroy" data-form-id="'. $row->id .'"><i class="bi bi-trash3-fill"></i></button>
                    </form>';    
                    return $buttons;
                })
                ->addColumn('modal', function($row) {
                    $modal = '<div class="modal fade" id="edit-category'. $row->id .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form action="'. route('category_admin_update', $row->id) .'" method="POST" class="modal-content">
                                        '. csrf_field() .'
                                        '. method_field('PUT').'
                                        <div class="modal-header">
                                            <h5 id="exampleModalLabel" style="margin-bottom: 0 !important; font-weight: 600">Ubah Kategori</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="display: flex; flex-direction: column; gap: 15px">
                                            <div style="display: flex; flex-direction: column; gap: 10px">
                                                <label for="category_name">Nama Kategori</label>
                                                <input type="text" class="form-control" name="category_name" id="category_name" value="'. $row->category_name .'">
                                                
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger btn-responsive" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i>Tutup</button>
                                            <button type="submit" class="btn btn-warning btn-responsive"><i class="bi bi-pencil-square"></i></i>Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>';
                    
                    return $modal;
                })
                ->rawColumns(['updated_at', 'action', 'modal'])
                ->make();
        }

        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        if ( strlen($request->input('category_name')) > 255 ) {
            Alert::error('Gagal', 'Nama kategori lebih 255 kata!');
            return redirect()->back();
        }

        $category = $request->validated();
        Category::create($category + ['user_id' => Auth::user()->id]);

        Alert::success('Berhasil', 'Kategori berhasil ditambahkan!');
        return redirect()->route('category_admin');
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = $request->validated();
        Category::where('id', $id)->update($category);
        Alert::success('Berhasil', 'Kategori berhasil disunting!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::where('category_id', $id)->delete();
        Category::where('id', $id)->delete();
        Alert::success('Berhasil', 'Kategori berhasil dihapus!');
        return redirect()->back();
    }
}
