@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2><b>Detail</b></h2>
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
                <strong><u>Name: </u></strong>
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Image:</u></strong>
                <img src="{{ $company->logo_image }}" width="60px" height="60px">
            </div>
        </div>
    </div>
@endsection
