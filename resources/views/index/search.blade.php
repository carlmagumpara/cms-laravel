@extends('layouts.app')

@section('content')
<div class="container">
    <div class="search">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
               <form action="/posts/" method="GET" role="search">
                <div class="form-group">
                  <div class="input-group">
                    <input class="form-control no-border" id="search" name="search" type="search" placeholder="Search blog..." value="">
                    <span class="input-group-btn">
                      <button type="submit" class="btn no-border"><span class="fui-search"></span></button>
                    </span>
                  </div>
                </div>
              </form>
                <blockquote>
                    <p><small><span class="fui-search"></span>&nbsp;&nbsp;{{ $results->count() }} result(s) found for "{{ $search }}".</p>
                    </small>
                </blockquote>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($results as $post)
            <a href="/post/{{ $post->id }}">
                <div class="col-md-10 col-md-offset-1 post-item">
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
            </p>
        @endforeach
    </div>
</div>
@endsection
