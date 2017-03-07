@extends('layouts.admin')

@section('content')
  <ol class="breadcrumb no-bg">
    <li><a href="#" class="active-breadcrumb">Comments</a></li>
  </ol>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Post Title</th>
          <th>Comment</th>
          <th>User</th>
        </tr>
      </thead>
      <tbody>
        @foreach($comments as $comment)
          <tr>
            <td>{{ $comment->title }}</td>
            <td>{{ $comment->comment }}</td>
            <td>{{ $comment->firstname }} {{ $comment->lastname }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="pull-right">
    {{ $comments->links() }}
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