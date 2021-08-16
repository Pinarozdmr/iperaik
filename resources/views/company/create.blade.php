@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><b>Create Company</b></h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('company.index') }}" class="btn btn-secondary float-right" title="Back"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
                        <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
                        <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
                    </svg></a>
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
                <strong>Image:</strong>
                <div class="custom-file">
                    <div class="form-group">
                        <input type="file" name="image" placeholder="image" class="custom-file-input" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
            </div>
           <br>
            {{--            <div class="col-xs-12 col-sm-12 col-md-12">--}}
            {{--                <div class="form-group">--}}
            {{--                    <strong>Image</strong>--}}
            {{--                    <input type="file" name="image" class="form-control" placeholder="image" required accept="image/*">--}}

            {{--                </div>--}}
            {{--            </div>--}}

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CompanyName:</strong>
                    <input type="text" value="{{old('name')}}" name="name"  class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                           placeholder="company name">

                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>


            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" value="{{old('email')}}" name="email" class="form-control {{$errors-> has('email') ? 'is-invalid' : ''}}" placeholder="email">

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
                    <strong>Web:</strong>
                    <input type="text" value="{{old('website')}}" name="website" class="form-control" placeholder="website">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" value="{{old('phone')}}" name="phone" class="form-control {{$errors-> has('phone') ? 'is-invalid' : ''}}" placeholder="phone">

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
                    <strong>Address:</strong>
                    <input type="text" value="{{old('address')}}" name="address" class="form-control" placeholder="address">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg> Add</button>
            </div>
            </div>
        </form>
@endsection
