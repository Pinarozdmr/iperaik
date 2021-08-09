@extends('company.layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{route('company.index')}}">Back</a>
            </div>
        </div>

    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong>There were some problems with your input.<br><br>
            <ul>
                @foreach($errors->all()as $error)
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

                    <strong>Image</strong>
                    <input type="text" name="image" class="form-control" placeholder="image">
                    <img src="/image/{{ $company->image }}" width="300px">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>CompanyName:</strong>
                    <input type="text" name="companyname" class="form-control" placeholder="name">
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
                    <strong>Web</strong>
                    <input type="text" name="web" class="form-control" placeholder="web">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone</strong>
                    <input type="text" name="phone" class="form-control" placeholder="phone">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Address</strong>
                    <input type="text" name="address" class="form-control" placeholder="address">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
