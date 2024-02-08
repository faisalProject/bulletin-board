<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryCT extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $category_name)
    {
        $categories = DB::table('categories as c')
        ->select('c.id', 'c.category_name', 'c.updated_at', 'p.id as post_id', 'p.image', 'p.title', 'p.content', 'u.id as user_id', 'u.username')
        ->leftJoin('posts as p', 'c.id', '=', 'p.category_id')
        ->leftJoin('users as u', 'p.user_id', '=', 'u.id')
        ->where('c.category_name', $category_name)
        ->get();

        $category_title = Category::where('category_name', $category_name)->first();
        $category_list = Category::orderBy('updated_at', 'DESC')->get();
    
        return view('user.category.index', compact('categories', 'category_title', 'category_list'));
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
