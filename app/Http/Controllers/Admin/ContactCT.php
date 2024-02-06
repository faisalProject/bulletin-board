<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ContactCT extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DB::table('contacts')
            ->select('contacts.id', 'contacts.email', 'contacts.subject', 'contacts.message', 'contacts.updated_at', 'users.id as user_id', 'users.username')
            ->leftJoin('users', 'contacts.user_id', '=', 'users.id')
            ->orderBy('contacts.updated_at', 'DESC')
            ->get();

        if ( request()->ajax() ) {
            return DataTables::of($data)
                ->addColumn('updated_at', function($row) {
                    return Carbon::parse($row->updated_at)->format('Y-m-d H:i:s');
                })
                ->addColumn('action', function($row) {
                    $button = '<div style="display: flex; justify-content: center; align-items: center; gap: 10px">
                                <button class="btn btn-success" style="display: flex; align-items: center; justify-content: center; border-radius: 4px; gap: 10px"><i class="bi bi-send-check-fill"></i> Balas</button>
                            </div>';
                    
                    return $button;
                })
                ->rawColumns(['updated_at', 'action'])
                ->make();

        }

        return view('admin.contact.index');
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
