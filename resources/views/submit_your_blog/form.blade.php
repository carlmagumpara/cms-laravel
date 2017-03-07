@extends('layouts.app')

@section('content')
  <div class="container ">
    <div class="row">
      <div class="col-md-8 post-content">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Blog</li>
          <li class="breadcrumb-item active">Submit your blog</li>
        </ol>
        <h5>Submit your blog</h5>
        <hr>
        @if (Auth::user())
          <form action="submit-your-blog/store" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
            </div>
            <div class="form-group">
              <label for="title" class="control-label">Title:</label>
              <input type="text" class="form-control" name="title" placeholder="Title">
            </div>
            <div class="form-group">
              <label for="body" class="control-label">Body:</label>
              <textarea rows="7" name="body" id="summernote" class="form-control" placeholder="Body"></textarea>
            </div>
            <div class="form-group pull-right">
              <button type="submit" class="btn btn-inverse">
                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                Submit Post
              </button>
            </div>
          </form>
        @else
          Please login first!
        @endif
      </div>
      <div class="col-md-4">
        @php
          $cat = '';
        @endphp
        @include('index.categories')
      </div> 
    </div>
  </div>
@endsection