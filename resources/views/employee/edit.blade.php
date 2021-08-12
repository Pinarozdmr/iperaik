@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2><b>Edit</b></h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('employee.index') }}" class="btn btn-secondary float-right" title="Back">Back</a>
            </div>
        </div>
    </div>
   <hr>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>

    @endif

    <form action="{{route('employee.update',$employee->id)}}" method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">

                    <strong>FirstName:</strong>
                    <input type="text" name="firstname" class="form-control" placeholder="firstname" value="{{$employee->firstname}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>LastName</strong>
                    <input type="text" name="lastname" class="form-control" placeholder="name" value="{{$employee->lastname}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="text" name="email" class="form-control" placeholder="email" value="{{$employee->email}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone</strong>
                    <input type="text" name="phone" class="form-control" placeholder="phone" value="{{$employee->phone}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CompanyName</strong>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{$employee->company_id}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-dark">Update Employee</button>
            </div>
        </div>
    </form>
@endsection
