@extends('layouts.admin')

@section('content')
  <ol class="breadcrumb no-bg">
    <li><a href="#" class="active-breadcrumb">Posts</a></li>
  </ol>
  <a href="/admin/posts/my_post" class="pull-right btn-primary btn ths-btn">My Post</a>
  <a href="/admin/posts/create" class="pull-right btn-primary btn ths-btn">Create Post</a>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Title</th>
          <th>Body</th>
          <th>Intro</th>
          <th>Category</th>
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
            <td>{{ $post->category }}</td>
            <td>
              @php
                for ($i = 0; $i < count(json_decode($post->tags)); $i++)
                  {
                  echo json_decode($post->tags)[$i].', ';
                  }
              @endphp
            </td>
            <td>{{ $post->author->name }}</td>
            <td>
              <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button">Action <span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="/admin/posts/{{$post->id}}/show">View</a></li>
                  <li><a href="/admin/posts/{{$post->id}}/edit">Edit</a></li>
                  <li class="divider"></li>
                  <li><a href="#" @click="showDeleteModal('/admin/posts/{{$post->id}}/delete/')">Delete Post</a></li>
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
  <!-- Delete Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <p class="modal-title" id="myModalLabel">Are you sure?</p>
        </div>
        <div class="modal-body text-center">
          <form action="" method="POST" class="delete-modal">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection