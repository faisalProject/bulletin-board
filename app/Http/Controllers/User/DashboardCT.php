<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardCT extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = DB::table('posts as p')
            ->select('p.id', 'p.title', 'p.content', 'p.image', 'p.updated_at', 'u.id as user_id', 'u.username', 'c.id as category_id', 'c.category_name')
            ->leftJoin('users as u', 'p.user_id', '=', 'u.id')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->orderBy('p.updated_at', 'DESC')
            ->get();

        $postCount = DB::table('posts')->count();
        $categoryCount = DB::table('categories')->count();
        $commentCount = DB::table('comments')->count();
        $userCount = DB::table('users')->where('role', 'user')->count();

        return view('user.dashboard.index', compact('posts', 'postCount', 'categoryCount', 'commentCount', 'userCount'));
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
    public function show($id)
    {
        $post = DB::table('posts as p')
            ->select('p.id', 'p.title', 'p.content', 'p.image', 'p.updated_at', 'u.id as user_id', 'u.username', 'c.id as category_id', 'c.category_name')
            ->leftJoin('users as u', 'p.user_id', '=', 'u.id')
            ->leftJoin('categories as c', 'p.category_id', '=', 'c.id')
            ->where('p.id', $id)
            ->first();

        $categories = Category::orderBy('updated_at', 'DESC')->get();
        $comments = DB::table('comments as c')
            ->leftJoin('users as u', 'c.user_id', '=', 'u.id')
            ->leftJoin('posts as p', 'c.post_id', '=', 'p.id')
            ->select('c.id', 'c.content', 'u.id as user_id', 'u.username', 'p.id as post_id', 'p.title')
            ->where('p.id', $id)
            ->get();


        return view('user.dashboard.detail', compact('post', 'categories', 'comments'));
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
