@extends('layouts.app')

 @section('content')
    <div class="pull-left">
        <h2>COMPANIES</h2>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <a class="btn btn-success" href="{{route('company.create')}}"> + Create New Companies </a>
            </div>
        </div>
    </div>

    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}

        <div class="input-group">
            <input type="text" class="form-control" name="q"
                   placeholder="Search Company"> <span class="input-group-btn">
            <button type="submit" class="btn btn-primary">
                <span class="Search">search</span>
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
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Web</th>
            <th>Phone</th>
            <th>Address</th>
            <th width="280px">Action</th>
        </tr>
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
    </table>

{{--     <a class="btn btn-primary" href="{{$companies->previousPageUrl()}}" >Back</a>--}}

{{--     <a class="btn btn-primary" href="{{$companies->nextPageUrl()}}" >Forward</a>--}}

    {{$companies->links('vendor.pagination.bootstrap-4')}}

 @endsection
