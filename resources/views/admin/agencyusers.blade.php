@extends('admin.layouts.app')

@section('content')

<div class="container">
 <script type="text/javascript">
    function add(agency_id,user_id)
    {
        $.ajax({
           type:"GET",
           data:{agency_id:agency_id,user_id:user_id},
           url:"/admin/addagencyuser",
           success:function(data){
               location.reload();
           }
        });
    }
    function del(agency_id,user_id)
    {
        $.ajax({
           type:"GET",
           data:{agency_id:agency_id,user_id:user_id},
           url:"/admin/deleteagencyuser",
           success:function(data){
               location.reload();
           }
        });
    }
</script>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 bootstrap-iso">
            <ul>
                <li class="table-text">
                    <div>Agency Name: {{ $agency->name }}</div>
                </li>
                <li class="table-text">
                    <div>Site Name: {{ $agency->site_name }}</div>
                </li>
                <li class="table-text">
                    <div>Theme: {{ $agency->theme }}</div>
                </li>
                <li class="table-text">
                    <div>Description: {{ $agency->description }}</div>
                </li>
                <li>
                    <a href="{{url('/agency/')}}/{{$agency->id}}" target="_blank">view site</a>
                </li>
            </ul>
            <div class="panel panel-default ">
                <div class="panel-heading">Agency Users</div>
                      @if (count($users) > 0)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Operation</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $user->id }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $user->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $user->email }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $user->role_name }}</div>
                                        </td>
                                        <td>
                                            <a href="#" onclick="del({{$agency->id}},{{$user->id}})">delete</a>
                                        </td>
                                    </tr>


                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$users->links()}}
                    @endif


            </div>
            <div class="panel panel-default ">
                <div class="panel-heading">Other Users</div>

                    @if (count($others) > 0)
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <table class="table table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Operation</th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($others as $user)
                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $user->id }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $user->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $user->email }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $user->role_name }}</div>
                                        </td>
                                        <td>
                                            <a href="#" onclick="add({{$agency->id}},{{$user->id}})">add</a>
                                        </td>
                                    </tr>


                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$others->links()}}
                    @endif

            </div>
        </div>
    </div>
</div>

@endsection
