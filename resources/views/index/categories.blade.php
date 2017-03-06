<div class="panel panel-default category">
  <div class="panel-heading">
    &nbsp;&nbsp;&nbsp;&nbsp;
  <span class="fui-list-large-thumbnails"></span>&nbsp;&nbsp;Category</div>
  <div class="panel-body">
    <ul class="list-group">
      <li class="list-group-item">
      @foreach ($category as $category)
        @if ($cat == $category->category)
          <a href="/blog/category/{{ $category->category }}" class="active-category">
            <span class="fui-arrow-left hidden-xs hidden-sm"></span>
            {{ $category->category }}
          </a>
        @else
          <a href="/blog/category/{{ $category->category }}">
            <span class="fui-arrow-left none-visible"></span>
            {{ $category->category }}
          </a>
        @endif
      @endforeach
      </li>
    </ul>
  </div>
</div>