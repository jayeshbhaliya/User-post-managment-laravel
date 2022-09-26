@extends('Master.master')
@section('title')
<title>Home</title>
@endsection
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"> </h3>
            <h3 class="card-title"><b>Users</b>
            </h3>
        </div>

        <div class="card-body">
            <!-- /.card-header -->
            <table id="myTable" class="display table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id </th>
                        <th>Name</th>

                        <th>Email</th>

                        <th>Join Date</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>

                            <td>{{ $item->email }}</td>


                            <td>{{ $item->created_at }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
