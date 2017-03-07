@extends('layouts.admin')

@section('content')
  <ol class="breadcrumb no-bg">
    <li><a href="#" class="active-breadcrumb">Overview</a></li>
  </ol>
  <div class="row">
  	<a href="/admin/users">
	  	<div class="col-md-4">
			 <div class="panel panel-default overview-item">
			  <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-12">
			  			<h3><span class="fui-user"></span></h3>
			  		</div>
			  		<div class="col-md-12">
			  			<p><span>{{ $users->count() }}</span> Users</p>
			  		</div>
			  	</div>
			  </div>
			</div>
	  	</div>
  	</a>
  	<a href="/admin/comments">
	  	<div class="col-md-4">
			 <div class="panel panel-default overview-item">
			  <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-12">
			  			<h3><span class="fui-chat"></span></h3>
			  		</div>
			  		<div class="col-md-12">
			  			<p><span>{{ $comments->count() }}</span> Comments</p>
			  		</div>
			  	</div>
			  </div>
			</div>
	  	</div>
  	</a>
  	<a href="/admin/posts">
	   	<div class="col-md-4">
			 <div class="panel panel-default overview-item">
			  <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-12">
			  			<h3><span class="fui-list-columned"></span></h3>
			  		</div>
			  		<div class="col-md-12">
			  			<p><span>{{ $posts->count() }}</span> Posts</p>
			  		</div>
			  	</div>
			  </div>
			</div>
	  	</div>
  	</a>
  </div>
  <div class="row">
  	<a href="/admin/posts/create">
	  	<div class="col-md-8">
			 <div class="panel panel-default overview-item">
			  <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-12">
			  			<h3><span class="fui-new"></span></h3>
			  		</div>
			  		<div class="col-md-12">
			  			<p>Create Post</p>
			  		</div>
			  	</div>
			  </div>
			</div>
	  	</div>
  	</a>
   	<a href="#">
	  	<div class="col-md-4">
			 <div class="panel panel-default overview-item">
			  <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-12">
			  			<h3><span class="fui-gear"></span></h3>
			  		</div>
			  		<div class="col-md-12">
			  			<p>Setting</p>
			  		</div>
			  	</div>
			  </div>
			</div>
	  	</div>
  	</a>
  </div>
  <div class="row">
  	<a href="#">
	  	<div class="col-md-8">
			 <div class="panel panel-default overview-item">
			  <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-12">
			  			<h3><span class="fui-chat"></span></h3>
			  		</div>
			  		<div class="col-md-12">
			  			<p><span>{{ $comments->count() }}</span> Messages</p>
			  		</div>
			  	</div>
			  </div>
			</div>
	  	</div>
  	</a>
  	<a href="#">
	  	<div class="col-md-4">
			 <div class="panel panel-default overview-item">
			  <div class="panel-body">
			  	<div class="row">
			  		<div class="col-md-12">
			  			<h3><span class="fui-user"></span></h3>
			  		</div>
			  		<div class="col-md-12">
			  			<p><span>{{ $users->count() }}</span> Users Logs</p>
			  		</div>
			  	</div>
			  </div>
			</div>
	  	</div>
  	</a>
  </div>
@endsection