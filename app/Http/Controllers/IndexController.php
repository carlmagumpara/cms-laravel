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

use App\Category;

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

        $category = Category::all();

        return view('index.index',compact('posts','comments','category'));
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
        return $request->all();
       
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
        $category = Category::all();

        $title = str_replace('-',' ',$id);
        $post = DB::table('posts')
            ->select('posts.id','posts.post_image','posts.title','posts.body','posts.tags','posts.category','admins.name','posts.created_at','posts.updated_at')
            ->join('admins','admins.id','=','posts.admin_id')
            ->where('title', $title)
            ->get();

        if (empty($post[0]->title)) {
            return view('index.404');
        } else {
            return view('index.show',compact('post','category'));
        }
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

        $category = Category::all();

        $posts = Post::with('author')->where('title', 'like', '%'.$search.'%')->orderBy('created_at','DESC')->paginate(5);

        return view('index.search',compact('posts','search','category'));

    }

    public function searchBlogByTags(Request $request){

        $tag = $request->tag;

        $category = Category::all();

        $posts = Post::with('author')->where('tags', 'like', '%'.$tag.'%')->orderBy('created_at','DESC')->paginate(5);

        return view('index.tag',compact('posts','tag','category'));

    }

    public function searchBlogByCategory($id){

        $cat = $id;

        $category = Category::all();

        $posts = Post::with('author')->where('category', $id)->orderBy('created_at','DESC')->paginate(5);

        return view('index.category',compact('posts','category','cat'));

    }

    public function submit_your_blog_form(){

        $category = Category::all();

        return view('submit_your_blog.form',compact('category'));

    }

}
