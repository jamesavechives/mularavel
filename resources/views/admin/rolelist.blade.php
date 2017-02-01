@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Show Roles</div>

                <div class="bootstrap-iso">

                    @if (count($rolelist) > 0)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Display Name</th>
                                <th>Description</th>
                                <th>Operation</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($rolelist as $role)
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $role->id }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $role->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $role->display_name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ substr($role->description,0,25) }}</div>
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#myModal" data-role_id="{{$role->id}}" data-role_name="{{$role->name}}">Set Permission</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$rolelist->links()}}
                    @endif
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog ">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Set Permissions <span id="role_name"></span></h4>
                                </div>
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/setpermission') }}">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div id="permission_content"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <script type="text/javascript">
                                            $('#myModal').on('show.bs.modal', function (e) {
                                                //get data-id attribute of the clicked element
                                                var roleId = $(e.relatedTarget).data('role_id');
                                                var roleName = $(e.relatedTarget).data('role_name');
                                                $('#role_name').html("For role "+roleName);
                                                $.ajax({
                                                   type:"GET",
                                                   url:"/admin/permissionlist",
                                                   data:{role_id:roleId},
                                                   success:function(data){
                                                       var rel=generate_html(data,roleId);
                                                       console.log(rel);
                                                       $('#permission_content').html(rel);
                                                   },
                                                   error:function(errorData){
                                   
                                                   }
                                                });
                                            });
                    </script>
                    <script type="text/javascript">
                        function generate_html(data1,roleId)
                        {
                           var data = jQuery.parseJSON(data1);
                           var html="<ul>";
                            for(i=0;i<data.length;i++)
                            {
                                if(data[i]['is_in']){
                                html+="<li><input type='checkbox' name='permission[]' value='"+data[i]['id']+"' checked='checked' />"+data[i]['name']+"</li>";
                            }
                            else{
                                html+="<li><input type='checkbox' name='permission[]' value='"+data[i]['id']+"'  />"+data[i]['name']+"</li>";
                            }
                           }
                           html+="</ul><input type='hidden' name='role_id' value='"+roleId+"'/>";
                           return html;
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
