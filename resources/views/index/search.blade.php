@extends('layouts.app')

@section('content')
<div class="container main">
  <div class="row">
    <div class="col-md-8 post-content">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Blog</li>
        <li class="breadcrumb-item active">Search</li>
      </ol>
<!--       @include('index.search_form') -->
      <blockquote>
          <p><small><span class="fui-search"></span>&nbsp;&nbsp;{{ $posts->count() }} result(s) found for "{{ $search }}".</p>
          </small>
      </blockquote>
      <div class="row">
          @foreach ($posts as $post)
              <a href="/blog/{{ strtolower(str_replace(' ','-',$post->title)) }}">
                  <div class="col-md-12 post-item">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="post-header-home" style="background-image: url('/uploads/post-header/{{$post->post_image}}');">
                              </div>  
                          </div>
                          <div class="col-md-6">
                              <h4>{{ $post->title }}</h4>
                              <blockquote>
                                  <p><small>{{ str_limit($post->intro, $limit = 100, $end = '...') }}</small></p>
                              </blockquote>
                              <div class="row">
                                  <div class="col-md-12">
                                      <span class="fui-new"></span>
                                      <small>Posted by: {{ $post->author->name }}</small>
                                  </div>
                                  <div class="col-md-12">
                                      <span class="fui-calendar"></span>
                                      <small>Posted on: {{ date('F d, Y', strtotime($post->created_at)) }}</small>
                                  </div>
                                  <div class="col-md-12">
                                      <span class="fui-bubble"></span>
                                      <small>Comments: {{ $post->comments->count() }}</small>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </a>
          @endforeach
      </div>
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
