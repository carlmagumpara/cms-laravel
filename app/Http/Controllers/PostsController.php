<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;

use App\Post;

use App\Category;

use Auth;

use Like;

use Image;

use Illuminate\Support\Facades\DB;


class PostsController extends Controller
{

    public function __construct() {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::with('author')->orderBy('created_at','DESC')->paginate(5);

        return view('admin.posts.posts',compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $category = Category::all();

        return view('admin.posts.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user = Auth::guard('admins')->user();

        if ($request->hasFile('post_image')){
            $post_image = $request->file('post_image');
            $filename = time() . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->save( public_path('uploads/post-header/' . $filename));
        }
        else {
            $filename = 'default.jpg';
        }

        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'intro' => $request->intro,
            'category' => $request->category,
            'tags' => $request->tags,
            'admin_id' => $user->id,
            'post_image' => $filename
        ];

        Post::create($data);

        return  redirect('admin/posts');
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
        $post = Post::with('author')->findOrFail($id);

        return view('admin.posts.show',compact('post'));

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
        $user = Auth::guard('admins')->user();

        $category = Category::all();

        $post = $user->posts()->find($id);

        return view('admin.posts.edit',compact('post','category'));
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

        $user = Auth::guard('admins')->user();

        $post = $user->posts()->find($id);

        if ($request->hasFile('post_image')){
            $post_image = $request->file('post_image');
            $filename = time() . '.' . $post_image->getClientOriginalExtension();
            Image::make($post_image)->save( public_path('uploads/post-header/' . $filename));
        }
        else {
            $filename = $post->post_image;
        }

        $data = [
            'title' => $request->title,
            'body' => $request->body,
            'intro' => $request->intro,
            'category' => $request->category,
            'tags' => $request->tags,
            'admin_id' => $user->id,
            'post_image' => $filename
        ];

        $post->update($data);

        return redirect('/admin/posts/'.$id.'/show');

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
        $user = Auth::guard('admins')->user();

        $post = $user->posts()->find($id);

        $post->delete();

        return back();
    }

    public function my_post()
    {
        //
        $user = Auth::guard('admins')->user();

        $posts = $user->posts()->orderBy('created_at','DESC')->paginate(5);

        return view('admin.posts.my_post',compact('posts'));

    }

}
