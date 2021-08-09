@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">

                    <a class="btn btn-primary" href="{{route('employee.index')}}">Back</a>
                </div>
            </div>

        </div>

        <form action="{{route('employee.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>FirstName:</strong>
                        <input type="text" name="firstname" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" placeholder="firstname">

                        @if($errors->has('firstname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('firstname') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>LastName</strong>
                        <input type="text" name="lastname" class="form-control {{ $errors->has('firstname') ? 'is-invalid' : '' }}" placeholder="lastname">

                        @if($errors->has('firstname'))
                            <div class="invalid-feedback">
                                {{ $errors->first('firstname') }}
                            </div>
                        @endif
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email</strong>
                        <input type="text" name="email" class="form-control" placeholder="email">
                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Phone</strong>
                        <input type="text" name="phone" class="form-control {{$errors-> has('phone') ? 'is-invalid' : ''}}" placeholder="phone">

                        @if($errors->has ('phone'))
                            <div class="invalid-feedback">
                                {{$errors->first('phone')}}
                            </div>
                        @endif
                    </div>
                </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CompanyId</strong>
                    <input type="text" name="company_id" class="form-control {{$errors-> has('company_id') ? 'is-invalid' : ''}}" placeholder="company_id">

                    @if($errors->has ('company_id'))
                        <div class="invalid-feedback">
                            {{$errors->first('company_id')}}
                        </div>
                    @endif
                </div>
            </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
@endsection
