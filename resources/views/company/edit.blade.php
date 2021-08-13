@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><b>Edit</b></h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('company.index') }}" class="btn btn-secondary float-right" title="Back">Back</a>
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

    <form action="{{route('company.update',$company->id)}}" method="POST">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="image" placeholder="image" class="custom-file-input" id="customFile" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
{{--                    <strong>Image</strong>--}}
{{--                    <input type="text" name="image" class="form-control" placeholder="image">--}}
{{--                    <img src="/image/{{ $company->image }}" width="65px" height="65px">--}}

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CompanyName:</strong>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{$company->name}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" class="form-control" placeholder="email" value="{{$company->email}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Web Site:</strong>
                    <input type="text" name="website" class="form-control" placeholder="web" value="{{$company->website}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" class="form-control" placeholder="phone" value="{{$company->phone}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" class="form-control" placeholder="address" value="{{$company->address}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-dark">Update Company</button>
            </div>
        </div>
    </form>
@endsection
