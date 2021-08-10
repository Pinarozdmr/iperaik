@extends('layouts.app')

 @section('content')
    <div class="pull-left">
        <h2 style="text-align:center">COMPANIES</h2>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success float-right" href="{{route('company.create')}}"> + Create New Companies </a>
            </div>
        </div>
    </div>
<hr>

{{--SEARCH--}}
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
             <p>{{$message}}</p>"
         </div>
     @endif

    <table class="table table-bordered" id="companies">
        <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Web</th>
            <th>Phone</th>
            <th>Address</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($companies as $company)
            <tr>
                <td>{{$company->id}}</td>
                <td><img src="{{$company->logo_image}}" alt="" style="width: 65px; height: 65px"></td>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>{{$company->web}}</td>
                <td>{{$company->phone}}</td>
                <td>{{$company->address}}</td>
                <td>

                    <form action="{{route('company.destroy',$company->id)}}" method="POST">
                        <a class="btn btn-info" href="{{route('company.show',$company->id)}}">Show</a>
                        <a class="btn btn-primary" href="{{route('company.edit',$company->id)}}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
             </tr>
        @endforeach
        </tbody>

    </table>
        <script>
            $(document).ready( function () {
                $('#companies').DataTable();
            } );
        </script>

{{--    {{$companies->links('vendor.pagination.bootstrap-4')}}--}}

 @endsection
