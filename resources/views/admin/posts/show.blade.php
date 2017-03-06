@extends('layouts.admin')

@section('content')
<ol class="breadcrumb no-bg">
  <li><a href="/admin/posts">Posts</a></li>
  <li><a href="#" class="active-breadcrumb">View</a></li>
</ol>
<div class="pull-right">
    <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-default btn-sm action-btn inline" {{ Auth::guard('admins')->user()->id == $post->admin_id ? '' : 'disabled' }}>
      <i class="fa fa-pencil" aria-hidden="true"></i>
    </a>
</div>
<div class="post-header" style="background-image: url('/uploads/post-header/{{$post->post_image}}');">
</div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h3>{{$post->title}}</h3>
      <h5>{{$post->intro}}</h5>
      <p>By: {{$post->author->name}} Posted on: {{$post->created_at->format('M-d-Y')}}</p>
      {!!$post->body!!}
    </div>
  </div>
@endsection