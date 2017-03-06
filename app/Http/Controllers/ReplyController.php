<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use Auth;

use App\User;

use App\Reply;

use Illuminate\Support\Facades\DB;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $user = Auth::user();

        $this->validate($request, [
            'reply' => 'required'
            ]);

        $reply_data = $user->replies()->create($request->all());

        $reply = array('id' => $reply_data->id, 
                'reply' => $reply_data->reply,
                'post_id' => $reply_data->post_id,
                'comment_id' => $reply_data->comment_id,
                'user_id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'avatar' => $user->avatar,
                'created_at' => $reply_data->created_at,
                'updated_at' => $reply_data->updated_at
            );

        return $reply;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = Auth::user();

        $reply = $user->replies()->find($id);

        $reply->delete();

        return back();

    }

    public function lists($id){

        $replies = DB::table('replies')->select('replies.id','replies.reply','replies.post_id','replies.comment_id','replies.user_id','users.firstname','users.lastname','users.avatar','replies.created_at','replies.updated_at')->join('users','users.id','=','replies.user_id')->orderBy('created_at','DESC')->where('post_id',$id)->get();

        return $replies;

    }

}
