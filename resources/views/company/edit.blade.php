@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg> Edit</b></h2>
                <hr>
                <a class="btn btn-secondary float-left" title="Clear"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z"/>
                    </svg> Clear Content</a>
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

    <form action="{{route('company.update',$company->id)}}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="image" placeholder="image" class="custom-file-input" id="customFile" >
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                </div>
            </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>CompanyName:</strong>
                <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : '' }}" placeholder="name" value="{{$company->name}}">
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
                    <input type="text" name="email" class="form-control {{$errors-> has('email') ? 'is-invalid' : ''}}" placeholder="email" value="{{$company->email}}">

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
                    <strong>Web Site:</strong>
                    <input type="text" name="website" class="form-control {{$errors-> has('website') ? 'is-invalid' : ''}}" placeholder="web" value="{{$company->website}}">

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
                    <strong>Phone:</strong>
                    <input type="text" name="phone" class="form-control {{$errors-> has('phone') ? 'is-invalid' : ''}}" placeholder="phone" value="{{$company->phone}}">

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
                    <input type="text" name="address" class="form-control" placeholder="address" value="{{$company->address}}">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-dark">Update Company</button>
            </div>
        </div>
    </form>
@endsection
