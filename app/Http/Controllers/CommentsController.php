<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;

use Auth;

use App\User;

use App\Post;

use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
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
        $user = Auth::user();

        $this->validate($request, [
            'comment' => 'required'
            ]);

        $comment_data = $user->comments()->create($request->all());

        $comment = array('id' => $comment_data->id, 
                'comment' => $comment_data->comment, 
                'post_id' => $comment_data->post_id,
                'user_id' => $user->id,
                'firstname' => $user->firstname,
                'lastname' => $user->lastname,
                'avatar' => $user->avatar,
                'created_at' => $comment_data->created_at,
                'updated_at' => $comment_data->updated_at
            );

        return  $comment;
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

        $comment = $user->comments()->find($id);
    
        $replies = $comment->replies()->where('comment_id',$id);

        $replies->delete();

        $comment->delete();

        return back();
    }

    public function lists($id){

        $comments = DB::table('comments')->select('comments.id','comments.comment','comments.post_id','comments.user_id','users.firstname','users.lastname','users.avatar','comments.created_at','comments.updated_at')->join('users','users.id','=','comments.user_id')->where('post_id',$id)->orderBy('created_at','DESC')->get();

        return $comments;

    }

}
