@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a href="{{route('employee.create')}}" class="btn btn-secondary float-right"><u> + Create New Employee</u></a>
                <h2><b>EMPLOYEES</b></h2>
            </div>
        </div>
    </div>
    <hr>


{{--    <form action="/search" method="POST" role="search">--}}
{{--        {{ csrf_field() }}--}}
{{--        <div class="card my-4">--}}
{{--            <h5 class="card-header">Search</h5>--}}
{{--            <form class="card-body" action="/search" method="GET" role="search">--}}
{{--                {{ csrf_field() }}--}}
{{--                <div class="input-group">--}}
{{--                    <input type="text" class="form-control" placeholder="Search for..." name="q">--}}
{{--                    <span class="input-group-btn">--}}
{{--            <button class="btn btn-secondary" type="submit">Go!</button>--}}
{{--          </span>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}


    @if($message=Session::get('Success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif

    <table class="table table-bordered" id="employees">
        <thead>
        <tr>
            <th><u>CompanyName</u></th>
            <th><u>FirstName</u></th>
            <th><u>LastName</u></th>
            <th><u>Email</u></th>
            <th><u>Phone</u></th>

            <th width="280px"><u>Action</u></th>
        </tr>
        </thead>
        <tbody>

        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->company->name}}</td>
                <td>{{$employee->firstname}}</td>
                <td>{{$employee->lastname}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>
                <td>

                    <form action="{{route('employee.destroy',$employee->id)}}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{route('employee.show',$employee->id)}}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{route('employee.edit',$employee->id)}}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

        <script>
            $(document).ready( function () {
                $('#employees').DataTable();
            } );
        </script>

    {{--     {{$employees->links('vendor.pagination.bootstrap-4')}}--}}
    {{--    <a class="btn btn-primary" href="{{$employees->previousPageUrl()}}">Back</a>--}}
    {{--    <a class="btn btn-primary" href="{{$employees->nextPageUrl()}}">Forward</a>--}}
@endsection
