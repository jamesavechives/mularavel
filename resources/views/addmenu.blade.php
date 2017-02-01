@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Menu</div>
                <div class="panel-body">
                    <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ url('/addmenu') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('permission_id') ? ' has-error' : '' }}">
                            <label for="permission_id" class="col-md-4 control-label">Menu Permission</label>

                            <div class="col-md-6">
                                <select id="permission_id" class="form-control" name="permission_id" value="{{ old('permission_id') }}" required autofocus>
                                    @foreach($permissions as $permission)
                                     {
                                     <option value="{{$permission->id}}">{{$permission->display_name}}</option> 
                                     }
                                     @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('uri') ? ' has-error' : '' }}">
                            <label for="uri" class="col-md-4 control-label">URI</label>

                            <div class="col-md-6">
                                <input id="uri" type="text" class="form-control" name="uri" value="{{ old('uri') }}" required>

                                @if ($errors->has('uri'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('uri') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('display_name') ? ' has-error' : '' }}">
                            <label for="display_name" class="col-md-4 control-label">Display Name</label>

                            <div class="col-md-6">
                                <input id="display_name" type="text" class="form-control" name="display_name" required>

                                @if ($errors->has('display_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('display_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" >

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('cat') ? ' has-error' : '' }}">
                            <label for="cat" class="col-md-4 control-label">Menu Category</label>

                            <div class="col-md-6">
                                <select id="cat" class="form-control" name="cat" value="{{ old('cat') }}" required autofocus>
                                     <option value="front_text">Front Text Menu</option> 
                                     <option value="back_text">Back Text Menu</option> 
                                     <option value="front_icon">Front Icon Menu</option> 
                                     <option value="back_icon">Back Icon Menu</option> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('is_able') ? ' has-error' : '' }}">
                            <label for="is_able" class="col-md-4 control-label">Is Able</label>

                            <div class="col-md-6">
                                <input type="radio" name="is_able" value="1" checked="yes">Able
                                <input type="radio" name="is_able" value="0" >Unable
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                            <label for="icon" class="col-md-4 control-label">Menu Icon</label>

                            <div class="col-md-6">
                                <input id="icon" type="file" class="form-control" name="icon"  autofocus>

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Menu
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
