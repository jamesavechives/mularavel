@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('home.Dashboard')}}</div>

                <div class="panel-body">
                    {{__('home.logged')}}
                    @if (count($agencylist) > 0)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <ul>
                                    @foreach ($agencylist as $agency)
                                    <li>  <a href="{{url('/agency/')}}/{{$agency->id}}" target="_blank">{{ $agency->site_name }}</a>
                                    </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
