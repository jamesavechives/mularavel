@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Agency</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/admin/addagency') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Agency Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('site_name') ? ' has-error' : '' }}">
                            <label for="site_name" class="col-md-4 control-label">Site Name</label>

                            <div class="col-md-6">
                                <input id="display_name" type="text" class="form-control" name="site_name" required>

                                @if ($errors->has('display_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('site_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" ></textarea>

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('menus') ? ' has-error' : '' }}">
                            <label for="menus" class="col-md-4 control-label">Available Menus</label>
                            <div class="col-md-6">
                                <table><tr>
                            @for($i=0;$i<@count($menus);$i++)
                            <td><input type="checkbox" name="menus[]" value="{{$menus[$i]->id}}"/>{{$menus[$i]->name}}</td>
                                 @if(($i+1)%3==0)
                               </tr><tr>
                                 @endif
                            @endfor
                               </tr></table>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('theme') ? ' has-error' : '' }}">
                            <label for="theme" class="col-md-4 control-label">Themes</label>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td>
                                            <img src="{{url('/upload/image/themes/yellow.jpg')}}"/>
                                           <input type="radio" name="theme" value="yellow" checked="yes">Yellow 
                                        </td>
                                        <td>
                                            <img src="{{url('/upload/image/themes/green.jpg')}}"/>
                                           <input type="radio" name="theme" value="green" >Green 
                                        </td>
                                    </tr>
                                </table>
                                
                                
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                            <label for="logo" class="col-md-4 control-label">Agency Logo</label>
                            <div class="col-md-6">
                                <input id="icon" type="file" class="form-control" name="logo"  autofocus required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Agency
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
