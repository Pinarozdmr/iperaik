@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <a href="{{route('employee.create')}}" title="Create" class="btn btn-secondary float-right">Create Employee</a>

                <h2><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                        </svg> EMPLOYEES</b></h2>
            </div>
        </div>
    </div>
    <hr class="bg-secondary">


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
            <th class="text-center">Company Name</th>
            <th class="text-center">First Name</th>
            <th class="text-center">Last Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center" width="95px">Action</th>
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
                        <a class="btn btn-info btn-sm" title="Detail" href="{{route('employee.show',$employee->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg></a>
                        <a class="btn btn-success btn-sm" title="Edit" href="{{route('employee.edit',$employee->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg></a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="myFunction(event)" class="btn btn-danger btn-sm" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x" viewBox="0 0 16 16">
                                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                                <path fill-rule="evenodd" d="M12.146 5.146a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                            </svg></button>

                        <script>

                            function myFunction(event) {

                                if (! confirm("Are you sure you want to delete the selected company?")) {
                                    event.stopPropagation();
                                    event.preventDefault();
                                }
                            }
                        </script>
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
