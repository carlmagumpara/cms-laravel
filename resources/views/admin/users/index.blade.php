@extends('layouts.admin')

@section('content')
  <ol class="breadcrumb no-bg">
    <li><a href="#" class="active-breadcrumb">Users</a></li>
  </ol>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Bio</th>
          <th>Email</th>
          <th>Status</th>
          <th style="width: 150px;">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ str_limit($user->bio, $limit = 150, $end = '...') }}</td>
            <td>{{ $user->email }}</td>
            <td>Active</td>
            <td>
              <div class="btn-group">
                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle btn-sm" type="button">Action <span class="caret"></span></button>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="/admin/users/{{$user->id}}/show">View</a></li>
                  <li><a href="#">Inactive</a></li>
                  <li class="divider"></li>
                  <li><a href="#" @click="showDeleteModal('/admin/users/{{$user->id}}/delete/')">Delete User</a>
                </ul>
              </div><!-- /btn-group -->
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="pull-right">
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