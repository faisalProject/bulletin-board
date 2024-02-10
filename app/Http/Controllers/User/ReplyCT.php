<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReplyCT extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $replies = DB::table('replies as r')
            ->select('r.id', 'r.reply', 'r.username', 'r.updated_at', 'm.id as message_id', 'm.user_id', 'm.email', 'm.subject', 'm.message')
            ->leftJoin('messages as m', 'r.message_id', '=', 'm.id')
            ->where('m.user_id', Auth::user()->id)
            ->get();

        return view('user.replies.index', compact('replies'));
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
    public function show()
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
