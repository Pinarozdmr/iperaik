@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="pull-left">
                <hr>
                <h2><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                            <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>Create Employee</b></h2>
            </div>
            <div class="pull-right">
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
                    <strong>Company Name</strong>
                    <select class="custom-select" title="Company Name" name="company_id" {{ $errors->has('company_id') ? 'error' : '' }}>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>First Name</strong>
                        <input type="text" title="First Name" value="{{old('firstname')}}" name="firstname" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" placeholder="firstname">

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
                        <input type="text" title="Last Name" value="{{old('lastname')}}" name="lastname" class="form-control {{ $errors->has('lastname') ? 'is-invalid' : '' }}" placeholder="lastname">

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
                        <input type="text" title="Email" value="{{old('email')}}" name="email" class="form-control" placeholder="email">
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone</strong>
                        <input type="text" title="Phone" value="{{old('phone')}}" name="phone" class="form-control {{$errors-> has('phone') ? 'is-invalid' : ''}}" placeholder="phone">

                        @if($errors->has ('phone'))
                            <div class="invalid-feedback">
                                {{$errors->first('phone')}}
                            </div>
                        @endif
                    </div>
                </div>


            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{ route('employee.index') }}" class="btn btn-dark" title="Cancel">Cancel</a>
                <button type="submit" class="btn btn-dark" title="Add"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>Add</button>
                <input type="reset" class="btn btn-dark" title="Reset" value="Reset"/>

                </div>
            </div>
        </form>

@endsection
