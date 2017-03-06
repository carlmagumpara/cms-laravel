@extends('layouts.admin')

@section('content')
  <ol class="breadcrumb no-bg">
    <li><a href="/admin/users" class="">Users</a></li>
    <li><a href="#" class="active-breadcrumb">Show</a></li>
  </ol>
  <div class="container">
    <div class="row profile">
      <div class="col-md-10 col-md-offset-1">
        <div class="col-md-4">
          <img src="/uploads/avatars/{{ $user->avatar }}" class="img-responsive round-avatar">
        </div>
        <div class="col-md-8">
          <div class="form-padding">
            <h4>{{$user->firstname}} {{$user->lastname}}'s Profile
              <div class="pull-right">
                <a href="/admin/users/{{$user->id}}/edit" class="btn btn-primary btn-xs action-btn">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
              </div>
            </h4>
            <p><b>Member since:</b> {{ date('F d, Y', strtotime($user->created_at)) }}</p>
            <p><b>Bio:</b> {{$user->bio}}</p>
            <p><b>Email:</b> {{$user->email}}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection