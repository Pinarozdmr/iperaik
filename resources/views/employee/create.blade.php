@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><b>Create Employee</b></h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('employee.index') }}" class="btn btn-secondary float-right" title="Back">Back</a>
            </div>
        </div>
    </div>
    <hr>

    @if (count($errors) > 0)

        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul>
                @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First Name:</strong>
                        <input type="text" value="{{old('firstname')}}" name="firstname" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" placeholder="firstname">

                        @if($errors->has('firstname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('firstname') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last Name:</strong>
                        <input type="text" value="{{old('lastname')}}" name="lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" placeholder="lastname">

                        @if($errors->has('lastname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email:</strong>
                        <input type="text" value="{{old('email')}}" name="email" class="form-control" placeholder="email">
                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone:</strong>
                        <input type="text" value="{{old('phone')}}" name="phone" class="form-control {{$errors-> has('phone') ? 'is-invalid' : ''}}" placeholder="phone">

                        @if($errors->has ('phone'))
                            <div class="invalid-feedback">
                                {{$errors->first('phone')}}
                            </div>
                        @endif
                    </div>
                </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name:</strong>
{{--                    <input type="text" name="company_id" class="form-control" placeholder="companyname">--}}
                    <select class="custom-select" name="company_id" {{ $errors->has('company_id') ? 'error' : '' }}>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-dark">Add</button>
                </div>
            </div>
        </form>

@endsection
