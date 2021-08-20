@extends('layouts.app')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <hr>
            <div class="pull-left">
                <h2><b>Detail</b></h2>
            </div>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Company Name</u></strong>
                {{ $employee->company->name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>First Name</u></strong>
                {{ $employee->firstname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Last Name</u></strong>
                {{ $employee->lastname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Email</u></strong>
                {{ $employee->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Phone</u></strong>
                {{ $employee->phone }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong><u>Date Created</u></strong>
                {{ date_format($employee->created_at, 'jS M Y') }}
            </div>
        </div>
    </div>
@endsection
