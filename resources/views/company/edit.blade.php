@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <hr>
            <div class="pull-left">
                <h2><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg> Edit</b></h2>
            </div>
        </div>
    </div>
   <hr>

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

    <form id="company-form" action="{{route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row">



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company Name</strong>
                <input type="text" title="Company Name" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" placeholder="name" value="{{$company->name}}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="text" title="Email" name="email" class="form-control {{$errors-> has('email') ? 'is-invalid' : ''}}" placeholder="email" value="{{$company->email}}">

                    <!-- Error -->
                    @if($errors->has ('email'))
                        <div class="invalid-feedback">
                            {{$errors->first('email')}}
                        </div>
                    @endif

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Web Site</strong>
                    <input type="text" title="Web Site" name="website" class="form-control {{$errors-> has('website') ? 'is-invalid' : ''}}" placeholder="web" value="{{$company->website}}">

                    <!-- Error -->
                    @if($errors->has ('website'))
                        <div class="invalid-feedback">
                            {{$errors->first('website')}}
                        </div>
                    @endif
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone</strong>
                    <input type="text" title="Phone" name="phone" class="form-control {{$errors-> has('phone') ? 'is-invalid' : ''}}" placeholder="phone" value="{{$company->phone}}">

                    <!-- Error -->
                    @if($errors->has ('phone'))
                        <div class="invalid-feedback">
                            {{$errors->first('phone')}}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address</strong>
                    <input type="text" title="Address" name="address" class="form-control" placeholder="address" value="{{$company->address}}">
                </div>
            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image</strong>
                    <div class="custom-file">
                        <input type="file" name="image" placeholder="image" class="custom-file-input" id="customFile" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button href="{{ route('company.index') }}" class="btn btn-dark" title="Cancel">Cancel</button>
                <button type="submit" class="btn btn-dark" title="Update">Update Company</button>
                <input type="reset" class="btn btn-dark" title="Reset" value="Reset"/>
                </div>
            </div>
        </div>
    </form>
@endsection
