@extends('layouts.app')

@section('content')
    <div class="content-wrapper p-sm-4 bg-white">
        <div class="container-fluid bg-light">

            <div class="row align-center">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <hr class="bg-secondary">
                    <h2><b>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                 class="bi bi-bag-plus" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z"/>
                                <path
                                    d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                            </svg>
                            Create Company</b></h2>
                </div>
            </div>


            <hr class="bg-secondary">
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

                <div action="{{ route('image.upload.post') }}" value="{{old('image')}}" method="POST"
                     enctype="multipart/form-data">
                    @csrf

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Company Name</strong>
                            <input type="text" value="{{old('name')}}" name="name" title="Company Name"
                                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                   placeholder="Company Name">

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
                            <input type="text" value="{{old('email')}}" title="Email" name="email"
                                   class="form-control {{$errors-> has('email') ? 'is-invalid' : ''}}"
                                   placeholder="Email">

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
                            <input type="text" value="{{old('website')}}" title="Web Site" name="website"
                                   class="form-control {{$errors-> has('website') ? 'is-invalid' : ''}}"
                                   placeholder="Web Site">
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
                            <input type="text" value="{{old('phone')}}" title="Phone" name="phone"
                                   class="form-control {{$errors-> has('phone') ? 'is-invalid' : ''}}"
                                   placeholder="Phone">

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
                            <input type="text" value="{{old('address')}}" title="Address" name="address"
                                   class="form-control" placeholder="Address">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <strong>Image</strong>
                        <div class="custom-file">
                            <div class="form-group">
                                <input type="file" name="image" onchange="image" placeholder="image" class="custom-file-input {{$errors-> has('image') ? 'is-invalid' : ''}}">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <!-- Error -->
                                @if($errors->has ('phone'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('phone')}}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <a href="{{ route('company.index') }}" class="btn btn-dark" title="Cancel">Cancel</a>
                        <input type="reset" class="btn btn-dark" title="Reset" value="Reset"/>
                        <button type="submit" class="btn btn-dark" title="Add">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-plus" viewBox="0 0 16 16">
                                <path
                                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>Add
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
