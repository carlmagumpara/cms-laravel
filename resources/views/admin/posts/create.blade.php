@extends('layouts.admin')

@section('content')
  <ol class="breadcrumb no-bg">
    <li><a href="/admin/posts">Posts</a></li>
    <li><a href="#" class="active-breadcrumb">Create</a></li>
  </ol>
  <div class="row">
  	<div class="col-md-10 col-md-offset-1">
  		<form action="/admin/posts/store" method="POST" enctype="multipart/form-data">
  			{{ csrf_field() }}
	  		<div class="form-group">
	  			<label for="title" class="control-label">Title:</label>
	  			<input type="text" class="form-control" name="title" placeholder="Title">
	  		</div>
	  		<div class="form-group">
	  			<label for="body" class="control-label">Body:</label>
	  			<textarea name="body" id="summernote" class="form-control" placeholder="Body"></textarea>
	  		</div>
	  		<div class="form-group">
	  			<label for="intro" class="control-label">Intro:</label>
	  			<input type="text" class="form-control" name="intro" placeholder="Intro">
	  		</div>
	  		<div class="form-group">
	  			<label for="tags" class="control-label">Tags:</label>
	          <div class="tagsinput-default">
	            <input class="tagsinput" data-role="tagsinput" value="">
              <input type="hidden" name="tags" class="tags-hidden">
	          </div>
	  		</div>
	  		<div class="form-group">
          <img src="" class="post_image_view img-responsive">
          <label for="post_image" class="control-label">Post Image Header:</label>
          <label class="btn btn-default btn-file btn-block">
              Browse Photo 
              <input type="file" name="post_image" class="post_image" hidden>
          </label>
	  		</div>
	  		<div class="form-group">
	  			<button type="submit" class="btn btn-primary">Publish Post</button>
	  		</div>
  		</form>
  	</div>
  </div>
@endsection