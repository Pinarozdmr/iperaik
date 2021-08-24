@extends('layouts.app')

@section('content')

<div class="content-wrapper p-sm-4 bg-white">
    <div class="container-fluid bg-light">

        <div class="row align-center">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <div class="pull-left">
                    <hr class="bg-secondary">
                    <h2><b>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd"
                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            Edit</b></h2>
                </div>
            </div>
        </div>
        <hr class="bg-secondary">

        {{--    @if($errors->any())--}}
        {{--        <div class="alert alert-danger">--}}
        {{--            <strong>Whoops!</strong>There were some problems with your input.<br><br>--}}
        {{--            <ul>--}}
        {{--                @foreach($errors->all() as $error)--}}
        {{--                    <li>{{$error}}</li>--}}
        {{--                @endforeach--}}
        {{--            </ul>--}}
        {{--        </div>--}}

        {{--    @endif--}}

        <form action="{{route('employee.update',$employee->id)}}" method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Company Name</strong>

                        <select class="custom-select"
                                name="company_id" {{ $errors->has('company_id') ? 'error' : '' }}>
                            @foreach($companies as $company)
                                <option @if($employee->company->name===$company->name) selected
                                        @endif value="{{ $company->id }}">{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First Name</strong>
                        <input type="text" name="firstname"
                               class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}"
                               placeholder="firstname" value="{{$employee->firstname}}">
                        @if($errors->has('firstname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('firstname') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Last Name</strong>
                        <input type="text" name="lastname"
                               class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }} "
                               placeholder="lastname" value="{{$employee->lastname}}">
                        @if($errors->has('lastname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('lastname') }}
                            </div>
                        @endif

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email</strong>
                        <input type="text" name="email"
                               class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                               placeholder="email" value="{{$employee->email}}">

                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone</strong>
                        <input type="text" name="phone"
                               class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                               placeholder="phone" value="{{$employee->phone}}">
                        @if($errors->has('phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif

                    </div>
                    <br>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button href="{{ route('employee.index') }}" class="btn btn-dark" title="Cancel">Cancel</button>
                    <input type="reset" class="btn btn-dark m-1" title="Reset" value="Default"/>
                    <button type="submit" class="btn btn-dark" title="Update">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>
@endsection
