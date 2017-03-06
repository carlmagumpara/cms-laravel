@extends('layouts.admin')

@section('content')
<div class="container">
  <h3>Choose Color Theme</h3>
  <div class="row demo-swatches-row">
    <div class="swatches-col">
      <div class="pallete-item" onclick="event.preventDefault(); document.getElementById('palette-turquoise').submit();">
          <dl class="palette palette-turquoise">
            <dt>#1abc9c</dt>
            <dd>Turquoise</dd>
          </dl>
          <dl class="palette palette-green-sea">
            <dt>#16a085</dt>
            <dd>Green sea</dd>
          </dl>
      </div>
      <form action="/admin/change-theme/update" method="POST" id="palette-turquoise" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="header_color" value="#1abc9c">
        <input type="hidden" name="side_menu_color" value="#16a085">
      </form>
      <div class="pallete-item" onclick="event.preventDefault(); document.getElementById('palette-emerald').submit();">
        <dl class="palette palette-emerald">
          <dt>#2ecc71</dt>
          <dd>Emerald</dd>
        </dl>
        <dl class="palette palette-nephritis">
          <dt>#27ae60</dt>
          <dd>Nephritis</dd>
        </dl>
      </div>
      <form action="/admin/change-theme/update" method="POST" id="palette-emerald" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="header_color" value="#2ecc71">
        <input type="hidden" name="side_menu_color" value="#27ae60">
      </form>
      <div class="pallete-item" onclick="event.preventDefault(); document.getElementById('palette-peter-river').submit();">
        <dl class="palette palette-peter-river">
          <dt>#3498db</dt>
          <dd>Peter river</dd>
        </dl>
        <dl class="palette palette-belize-hole">
          <dt>#2980b9</dt>
          <dd>Belize hole</dd>
        </dl>
      </div>
      <form action="/admin/change-theme/update" method="POST" id="palette-peter-river" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="header_color" value="#3498db">
        <input type="hidden" name="side_menu_color" value="#2980b9">
      </form>
      <div class="pallete-item" onclick="event.preventDefault(); document.getElementById('palette-amethyst').submit();">
        <dl class="palette palette-amethyst">
          <dt>#9b59b6</dt>
          <dd>Amethyst</dd>
        </dl>
        <dl class="palette palette-wisteria">
          <dt>#8e44ad</dt>
          <dd>Wisteria</dd>
        </dl>
      </div>
      <form action="/admin/change-theme/update" method="POST" id="palette-amethyst" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="header_color" value="#9b59b6">
        <input type="hidden" name="side_menu_color" value="#8e44ad">
      </form>
      <div class="pallete-item" onclick="event.preventDefault(); document.getElementById('palette-wet-asphalt').submit();">
        <dl class="palette palette-wet-asphalt">
          <dt>#34495e</dt>
          <dd>Wet asphalt</dd>
        </dl>
        <dl class="palette palette-midnight-blue">
          <dt>#2c3e50</dt>
          <dd>Midnight blue</dd>
        </dl>
      </div>
      <form action="/admin/change-theme/update" method="POST" id="palette-wet-asphalt" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="header_color" value="#34495e">
        <input type="hidden" name="side_menu_color" value="#2c3e50">
      </form>
      <div class="pallete-item" onclick="event.preventDefault(); document.getElementById('palette-sun-flower').submit();">
        <dl class="palette palette-sun-flower">
          <dt>#f1c40f</dt>
          <dd>Sun flower</dd>
        </dl>
        <dl class="palette palette-orange">
          <dt>#f39c12</dt>
          <dd>Orange</dd>
        </dl>
      </div>
      <form action="/admin/change-theme/update" method="POST" id="palette-sun-flower" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="header_color" value="#f1c40f">
        <input type="hidden" name="side_menu_color" value="#f39c12">
      </form>
      <div class="pallete-item" onclick="event.preventDefault(); document.getElementById('palette-carrot').submit();">
        <dl class="palette palette-carrot">
          <dt>#e67e22</dt>
          <dd>Carrot</dd>
        </dl>
        <dl class="palette palette-pumpkin">
          <dt>#d35400</dt>
          <dd>Pumpkin</dd>
        </dl>
      </div>
      <form action="/admin/change-theme/update" method="POST" id="palette-carrot" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="header_color" value="#e67e22">
        <input type="hidden" name="side_menu_color" value="#d35400">
      </form>
      <div class="pallete-item" onclick="event.preventDefault(); document.getElementById('palette-alizarin').submit();">
        <dl class="palette palette-alizarin">
          <dt>#e74c3c</dt>
          <dd>Alizarin</dd>
        </dl>
        <dl class="palette palette-pomegranate">
          <dt>#c0392b</dt>
          <dd>Pomegranate</dd>
        </dl>
      </div>
      <form action="/admin/change-theme/update" method="POST" id="palette-alizarin" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="header_color" value="#e74c3c">
        <input type="hidden" name="side_menu_color" value="#c0392b">
      </form>
      <div class="pallete-item" onclick="event.preventDefault(); document.getElementById('palette-clouds').submit();">
        <dl class="palette palette-clouds">
          <dt>#ecf0f1</dt>
          <dd>Clouds</dd>
        </dl>
        <dl class="palette palette-silver">
          <dt>#bdc3c7</dt>
          <dd>Silver</dd>
        </dl>
      </div>
      <form action="/admin/change-theme/update" method="POST" id="palette-clouds" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="header_color" value="#ecf0f1">
        <input type="hidden" name="side_menu_color" value="#bdc3c7">
      </form>
      <div class="pallete-item" onclick="event.preventDefault(); document.getElementById('palette-concrete').submit();">
        <dl class="palette palette-concrete">
          <dt>#95a5a6</dt>
          <dd>Concrete</dd>
        </dl>
        <dl class="palette palette-asbestos">
          <dt>#7f8c8d</dt>
          <dd>Asbestos</dd>
        </dl>
      </div>
      <form action="/admin/change-theme/update" method="POST" id="palette-concrete" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <input type="hidden" name="header_color" value="#95a5a6">
        <input type="hidden" name="side_menu_color" value="#7f8c8d">
      </form>
    </div>
  </div>
</div>
@endsection