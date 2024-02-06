<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CommentCT extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ( request()->ajax() ) {
            $data = DB::table('comments as c')
                ->leftJoin('users as u', 'c.user_id', '=', 'u.id')
                ->leftJoin('posts as p', 'c.post_id', '=', 'p.id')
                ->select('c.id', 'c.content as comment', 'c.updated_at', 'u.id as user_id', 'u.username', 'p.id as post_id', 'p.title', 'p.content')
                ->orderBy('c.updated_at', 'DESC')
                ->get();

            return DataTables::of($data)
                ->addColumn('updated_at', function($row) {
                    return Carbon::parse($row->updated_at)->format('Y-m-d H:i:s');
                })
                ->rawColumns(['updated_at'])
                ->make();
        }
        return view('admin.comments.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
