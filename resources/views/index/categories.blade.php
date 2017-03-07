<div class="fixed">
  <div class="panel panel-default category">
    <div class="panel-heading">
      <span class="fui-search"></span>&nbsp;&nbsp;Search Blog
      <hr>
      <div style="margin-top: 20px;">
        @include('index.search_form')
      </div>
    </div>
    <div class="panel-heading">
      <span class="fui-folder"></span>&nbsp;&nbsp;Category
      <hr>
    </div>
    <div class="panel-body">
      <ul class="list-group">
        <li class="list-group-item">
          @if ($cat == 'All')
            <a href="/blog/" class="active-category">
              All
            </a>
          @else
            <a href="/blog/">
              All
            </a>
          @endif
        </li>
        <li class="list-group-item">
        @foreach ($category as $category)
          @if ($cat == $category->category)
            <a href="/blog/category/{{ $category->category }}" class="active-category">
              {{ $category->category }}
            </a>
          @else
            <a href="/blog/category/{{ $category->category }}">
              {{ $category->category }}
            </a>
          @endif
        @endforeach
        </li>
      </ul>
      <hr>
      <a href="/submit-your-blog" class="btn btn-default">
        Submit your blog here
      </a>
    </div>
  </div>
</div>