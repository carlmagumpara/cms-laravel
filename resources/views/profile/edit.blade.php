@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <img src="/uploads/avatars/{{ $user->avatar }}" class="img-responsive round-avatar">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="setting">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#update" aria-controls="update" role="tab" data-toggle="tab">Update Profile</a></li>
                <li role="presentation"><a href="#change" aria-controls="change" role="tab" data-toggle="tab">Change Password</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="update">
                  <form role="form" @submit.prevent="updateProfile" method="POST" action="/profile/{{$user->id}}/update" class="update_profile_form">
                      {{ csrf_field() }}
                      {{ method_field('PUT') }}
                      <div class="form-group">
                          <label for="firstname" class="control-label">Firstname</label>
                          <input type="text" class="form-control" name="firstname" value="{{ $user->firstname }}">
                      </div>
                      <div class="form-group">
                          <label for="lastname" class="control-label">Lastame</label>
                          <input type="text" class="form-control" name="lastname" value="{{ $user->lastname }}">
                      </div>
                      <div class="form-group">
                          <label for="bio" class="control-label">Bio</label>
                          <textarea class="form-control" name="bio" value="" required autofocus>{{ $user->bio }}</textarea>
                      </div>
                      <div class="form-group">
                          <label for="email" class="control-label">E-Mail Address</label>
                          <input type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Update Profile
                        </button>
                        <a href="/profile/{{ $user->id }}" class="btn btn-default">Cancel</a>
                      </div>
                  </form>
                </div>
                <div role="tabpanel" class="tab-pane" id="change">
                  <form role="form" @submit.prevent="changePassword" class="change_password_form" method="POST" action="/profile/{{$user->id}}/change_password" novalidate>
                    <div class="alert alert-success alert-padding"></div>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                      <label for="current-password" class="control-label">Current Password</label>
                        <input type="password" class="form-control" id="current-password" name="current-password" placeholder="Password">
                    </div>
                    
                    <div class="form-group">
                      <label for="password" class="control-label">New Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="password_confirmation" class="control-label">Re-enter Password</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password">
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-danger">Change Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection