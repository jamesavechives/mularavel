@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Show Agencies</div>
                        <div class="bootstrap-iso">

  @if (count($agencylist) > 0)
        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Agency Name</th>
                        <th>Site Name</th>
                        <th>Theme</th>
                        <th>Description</th>
                        <th>View Site</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($agencylist as $agency)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text">
                                    <div>{{ $agency->name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $agency->site_name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $agency->theme }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $agency->description }}</div>
                                </td>
                                <td>
                                    <a href="{{url('/agency/')}}/{{$agency->id}}" target="_blank">view site</a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
  {{$agencylist->links()}}
    @endif

 </div>

            </div>
        </div>
    </div>
</div>
@endsection
