<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Comment;

use Auth;

use App\User;

use Illuminate\Support\Facades\DB;

use Session;

use App\Reply;

use App\Like;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::with('author')->orderBy('created_at','DESC')->paginate(5);

        $comments = Comment::all();

        return view('index.index',compact('posts','comments'));
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
        $users = User::all();

        $user = Auth::user();

        $post = Post::with('author')->findOrFail($id);

        $comments = Comment::with('comment_author')->where('post_id',$id)->orderBy('created_at','DESC')->paginate(10);
        
        $replies = Reply::with('reply_author')->orderBy('created_at','DESC');

        return view('index.show',compact('users','post','comments','replies','likes'));
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
    }

    public function searchBlog(Request $request){

        $search = $request->search;

        $results = Post::with('author')->where('title', 'like', '%'.$search.'%')->orderBy('created_at','DESC')->paginate(5);

        return view('index.search',compact('results','search'));

    }

    public function searchBlogByTags(Request $request){

        $search = $request->tag;

        $results = Post::with('author')->where('tags', 'like', '%'.$search.'%')->orderBy('created_at','DESC')->paginate(5);

        return view('index.search',compact('results','search'));

    }

}
