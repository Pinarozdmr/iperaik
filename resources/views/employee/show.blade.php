@extends('layouts.app')


@section('content')
    <div class="content-wrapper p-sm-4 bg-white">
        <div class="container-fluid bg-light">

            <div class="row align-center">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <hr class="bg-secondary">
                    <h2><b>Detail</b></h2>
                </div>
            </div>
            <hr class="bg-secondary">


            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <table cellpadding="10" class="table table-bordered col">
                        <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Company Name</th>
                            <th class="text-center">First Name</th>
                            <th class="text-center">Last Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Date Created</th>
                        </tr>
                        </thead>
                        <tr>
                            <td>{{$employee->company->name}}</td>
                            <td>{{$employee->firstname}}</td>
                            <td>{{$employee->lastname}}</td>
                            <td>{{$employee->email}}</td>
                            <td>{{$employee->phone}}</td>
                            <td>{{ date_format($employee->created_at, 'jS M Y') }}</td>

                        </tr>

                    </table>
                </div>
            </div>

            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <a href="{{ route('employee.index') }}" class="btn btn-dark" title="Back">Back</a>
            </div>
            <br>
        </div>
    </div>
@endsection
