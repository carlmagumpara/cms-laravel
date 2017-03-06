@extends('layouts.app')

@section('content')
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
              @if(Auth::user()->id == $user->id)
                <a href="/profile/{{$user->id}}/edit" class="btn btn-primary btn-xs action-btn">
                  <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
              @endif
              </div>
            </h4>
            <p><b>Member since:</b> {{ date('F d, Y', strtotime($user->created_at)) }}</p>
            <p><b>Bio:</b> {{$user->bio}}</p>
            <p><b>Email:</b> {{$user->email}}</p>
            @if (Auth::user()->id == $user->id)
              <button class="btn btn-default" data-toggle="modal" data-target="#myModal">Change Profile Photo</button>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Change Profile Photo</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <img src="/uploads/avatars/{{Auth::user()->avatar}}" class="img-responsive change-avatar round-avatar">
            </div>
          </div>
          @if (Auth::user()->id == $user->id)
            <form enctype="multipart/form-data" class="change-profile-pic-form" action="/profile/update_avatar" method="POST">
              {{ csrf_field() }}
              <div class="row profile-pic-file">
                <div class="col-md-4 col-md-offset-4">
                  <div class="form-group">
                    <label class="btn btn-default btn-file btn-block btn-change-pic">
                        Click here to browse photos <input type="file" name="avatar" class="profile-pic" hidden>
                    </label>
                  </div>
                </div>
              </div>
              <input type="submit" value="Change Profile" class="btn btn-primary hide" name="">
            </form>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary change-profile-pic">Change Profile</button>
        </div>
      </div>
    </div>
  </div>
@endsection