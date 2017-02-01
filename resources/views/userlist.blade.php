@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Show Users</div>

                        <div class="bootstrap-iso">

  @if (count($userlist) > 0)
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
                        @foreach ($userlist as $user)
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
                                    <a href="#">Operate</a>
                                </td>
                            </tr>


                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
  {{$userlist->links()}}
    @endif

 </div>

            </div>
        </div>
    </div>
</div>
@endsection
