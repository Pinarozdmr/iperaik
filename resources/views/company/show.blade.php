@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><b>Detail</b></h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('company.index') }}" class="btn btn-secondary float-right" title="Back">Back</a>
            </div>
        </div>
    </div>
    <hr>
            <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="pull-left">
                <h2> <b>{{ $company->name }}</b></h2>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Name:</u></strong>
                {{ $company->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Address:</u></strong>
                {{ $company->address }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Phone:</u></strong>
                {{ $company->phone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>E-mail:</u></strong>
                {{ $company->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Image:</u></strong>
                <img src="{{ $company->logo_image }}" width="60px" height="60px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Website:</u></strong>
                {{ $company->website }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Date Created:</u></strong>
                {{ date_format($company->created_at, 'jS M Y') }}
            </div>
        </div>
    </div>
@endsection
