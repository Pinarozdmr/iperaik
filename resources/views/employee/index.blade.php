@extends('layouts.app')

@section('content')
    <div class="pull-left">
        <h2>EMPLOYEES</h2>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="{{route('employee.create')}}"> + Create New Employee</a>
            </div>
        </div>
    </div>

    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}

        <div class="input-group">
            <input type="text" class="form-control" name="q"
                   placeholder="Search Employee"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="Search"></span>
            </button>
        </span>
        </div>
    </form>


    @if($message=Session::get('Success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>

    @endif
    <table class="table table-bordered">
        <tr>
            <th>CompanyId</th>
            <th>FirstName</th>
            <th>LastName</th>
            <th>Email</th>
            <th>Phone</th>

            <th width="280px">Action</th>
        </tr>
        @foreach($employees as $employee)
            <tr>
                <td>{{$employee->company_id}}</td>
                <td>{{$employee->firstname}}</td>
                <td>{{$employee->lastname}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->phone}}</td>

                <td>
                    <form action="{{route('employee.destroy',$employee->id)}}" method="POST">
                        <a class="btn btn-info" href="{{route('employee.show',$employee->id)}}">Show</a>

                        <a class="btn btn-primary" href="{{route('employee.edit',$employee->id)}}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

{{--    <a class="btn btn-primary" href="{{$employees->previousPageUrl()}}">Back</a>--}}

{{--    <a class="btn btn-primary" href="{{$employees->nextPageUrl()}}">Forward</a>--}}

    {{$employees->links('vendor.pagination.bootstrap-4')}}

@endsection
