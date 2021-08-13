@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><b>Create Company</b></h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('company.index') }}" class="btn btn-secondary float-right" title="Back">Back</a>
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
{{--                        <li>{{ $error }}</li>--}}
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
                    <input type="text" value="{{old('email')}}" name="email" class="form-control" placeholder="email">
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
                <button type="submit" class="btn btn-dark">Add</button>
            </div>
            </div>
        </form>
@endsection
