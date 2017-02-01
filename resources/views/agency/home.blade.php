@extends('agency.themes.'.$theme.'.app')
@section('pageTitle', $title)

@section('content')
    @if (count($menus) > 0)
            <div id="home-page" class="hotspot-home-menu">
                <ul>
                        @foreach ($menus as $menu)
                        <li><a href="{{$id}}/{{$menu->uri}}" >{{$menu->display_name}}</a></li>           
                        @endforeach
                </ul>
                <div style="float:left;width:100%;" id="load-menu"></div>
            </div>
    @endif
@endsection
