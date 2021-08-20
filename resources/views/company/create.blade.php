@extends('layouts.app')

@section('content')
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <div class="pull-left">
                <hr>
                <h2><b>Create Company</b></h2>
            </div>
        </div>
    </div>

    <hr>
    <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">

        @csrf
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>

            <img src="images/{{ Session::get('image') }}">
        @endif

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

        <form action="{{ route('image.upload.post') }}" value="{{old('image')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Company Name</strong>
                    <input type="text" value="{{old('name')}}" name="name" title="Company Name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="company name">

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
                    <input type="text" value="{{old('email')}}" title="Email" name="email" class="form-control {{$errors-> has('email') ? 'is-invalid' : ''}}" placeholder="email">

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
                    <input type="text" value="{{old('website')}}" title="Web Site" name="website" class="form-control {{$errors-> has('website') ? 'is-invalid' : ''}}" placeholder="website">
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
                    <input type="text" value="{{old('phone')}}" title="Phone" name="phone" class="form-control {{$errors-> has('phone') ? 'is-invalid' : ''}}" placeholder="phone">

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
                    <input type="text" value="{{old('address')}}" title="Address" name="address" class="form-control" placeholder="address">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Image</strong>
                <div class="custom-file">
                    <div class="form-group">
                        <input type="file" name="image" placeholder="image" class="custom-file-input" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
         <br>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <a href="{{ route('company.index') }}" class="btn btn-dark" title="Cancel">Cancel</a>
                <button type="submit" class="btn btn-dark" title="Add"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>Add</button>
                <input type="reset" class="btn btn-dark" title="Reset" value="Reset"/>

            </div>
            </div>
        </form>
@endsection
