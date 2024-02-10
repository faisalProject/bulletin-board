<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReplyRequest;
use App\Models\Message;
use App\Models\Reply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ReplyCT extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        if ( request()->ajax() ) {
            $data = DB::table('messages')
                ->select('messages.id', 'users.id as user_id', 'users.username', 'messages.subject', 'messages.message', 'messages.status', 'messages.updated_at')
                ->leftJoin('users', 'messages.user_id', '=', 'users.id')
                ->where('messages.status', '0')
                ->orderBy('messages.updated_at', 'DESC')
                ->get();

            return DataTables::of($data)
            ->addColumn('message', function($row) {
                $message = strlen($row->message) > 50 ? substr($row->message, 0, 50) .'...' : $row->message;
                return $message;
            })
            ->addColumn('updated_at', function($row) {
                return Carbon::parse($row->updated_at)->format('Y-m-d H:i:s');
            })
            ->addColumn('action', function($row) {
                $buttons = '<div style="display: flex; justify-content: center; align-items: center; gap: 10px">
                <button style="display: flex; justify-content: center; align-items: center; gap: 10px" type="button" class="btn btn-success reply-btn" data-bs-toggle="modal" data-bs-target="#reply'. $row->id .'"><i class="bi bi-send-fill"></i> Balas</button>';
                return $buttons;
            })
            ->addColumn('modal', function($row) {
                $modal = '<div class="modal fade" id="reply'. $row->id .'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form action="'. route('contact_admin_store', $row->id) .'" method="POST" class="modal-content">
                                   '. csrf_field() .'
                                    <div class="modal-header">
                                        <h5 id="exampleModalLabel" style="margin-bottom: 0 !important; font-weight: 600">Balas Pesan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body" style="display: flex; flex-direction: column; gap: 15px">
                                        <div style="display: flex; flex-direction: column; gap: 10px">
                                            <p>Dari : '. $row->username .'</p>
                                        </div>
                                        <div style="display: flex; flex-direction: column; gap: 10px">
                                            <p>Subjek : '. $row->subject .'</p>
                                        </div>
                                        <div style="display: flex; flex-direction: column; gap: 10px">
                                            <p>Pesan : '. $row->message .'</p>
                                        </div>
                                        <div style="display: flex; flex-direction: column; gap: 10px">
                                            <label for="reply">Balas</label>
                                            <textarea type="text" class="form-control" rows="8" name="reply" id="reply" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger btn-responsive" data-bs-dismiss="modal"><i class="bi bi-x-circle-fill"></i>Tutup</button>
                                        <button type="submit" class="btn btn-success btn-responsive"><i class="bi bi-send-fill"></i>Balas</button>
                                    </div>
                                </form>
                            </div>
                        </div>';
                return $modal;
            })
            ->rawColumns(['message', 'updated_at', 'action', 'modal'])
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
    public function store(ReplyRequest $request, $id)
    {
        $reply = $request->validated();
        $message = Message::find($id);

        Reply::create($reply + ['user_id' => Auth::user()->id, 'username' => Auth::user()->username, 'message_id' => $message->id]);
        Alert::success('Berhasil', 'Pesan berhasil dikirm!');
        Message::where('id', $id)->update(['status' => '1']);
        return redirect()->route('contact_admin_index');
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
