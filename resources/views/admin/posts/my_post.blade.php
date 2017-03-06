@extends('layouts.admin')

@section('content')
  <ol class="breadcrumb no-bg">
    <li><a href="/admin/posts">Posts</a></li>
    <li><a href="#" class="active-breadcrumb">My Post</a></li>
  </ol>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Body</th>
          <th>Intro</th>
          <th>Tags</th>
          <th>Author</th>
          <th style="width: 150px;">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
          <tr>
            <td>{{ $post->title }}</td>
            <td>{{ str_limit($post->body, $limit = 150, $end = '...') }}</td>
            <td>{{ $post->intro }}</td>
            <td>{{ $post->tags }}</td>
            <td>{{ $post->author->name }}</td>
            <td>
              <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button">Action <span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="/admin/posts/{{$post->id}}/show">View</a></li>
                  <li><a href="/admin/posts/{{$post->id}}/edit">Edit</a></li>
                  <li class="divider"></li>
                  <li><a href="#" @click="showPostDeleteModal('/admin/posts/{{$post->id}}/delete/')">Delete Post</a></li>
                </ul>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="pull-right">
    {{ $posts->links() }}
  </div>
@endsection